<?php

namespace App\Http\Controllers;

use App\Models\Ask;
use App\Models\Client;
use App\Models\Complaint;
use App\Models\Post;
use App\Models\score;
use App\Models\User;
use Google\Service\ShoppingContent\Resource\Pos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {

        $userId = Auth::id();
        $user = Auth::user();
        $savedPosts = $user->savedPosts;

        $savedPosts = Post::whereHas('savedByUsers', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();


        $userInfo = Client::with('user')
            ->where('user_id', $userId)
            ->first();

        $posts = Post::where('user_id', $userId)
            ->withCount('comments')
            ->withCount('likedByClients')
            ->get();

        $questions = Ask::where('user_id', $userId)
            ->withCount('askanswer')
            ->get();
//        dd($posts);


        $complaints = Complaint::where('user_id', $userId)
            ->select('id', 'description', 'status')
            ->get();


//        scrore

        // Find the score record for the authenticated user
        $score = Score::where('user_id', $user->id)->latest()->first();
        // Prepare data to pass to the profile view
        $userScore = $score ? [
            'score' => $score->score,
            'progress' => $score->progress,
        ] : null;

//        dd($userScore);
        return view('client.index', compact('userInfo', 'posts', 'questions','savedPosts','userScore','complaints'));
    }

    public function update(Request $request, $id)
    {
        // Find the client record by ID
        $client = Client::findOrFail($id);

        // Validate the incoming request data
        $validatedData = $request->validate([
            'username' => 'required|string',
            'email' => ['required', 'email', 'unique:users,email,' . $client->user->id],
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        if ($validatedData['email'] != $client->user->email) {
            // Check if the email already exists in the users table
            $emailExists = User::where('email', $validatedData['email'])->where('id', '!=', $client->user->id)->exists();

            if ($emailExists) {
                // Display an alert and redirect back
                return redirect()->back()->with('error', 'The email address is already in use.');
            }
        }

        // Update user's information
        $client->user->update([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
        ]);

        // Update client's information
        $client->update([
            'phone_number' => $validatedData['phone'],
            'address' => $validatedData['address'],
        ]);

        // Redirect back with success message
        return redirect()->route('client.index')->with('success', 'Client information updated successfully!');
    }

    // app/Http/Controllers/ClientController.php
    public function updateImage(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        // Validate the image upload
        $request->validate([
            'image' => 'nullable|image|max:2048', // Max 2MB image file size
        ]);

        // If a new image is uploaded, store it and update the image record
        if ($request->hasFile('image')) {
            // Handle image upload
            $imagePath = $this->storeImage($request->file('image'));

            // Check if the client already has an associated image
            if ($client->image) {
                // Update the existing image record
                $client->image->update([
                    'path' => $imagePath,
                ]);
            } else {
                // Create a new image record for the client
                $client->image()->create([
                    'path' => $imagePath,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Client image updated successfully!');
    }

    /**
     * Store the uploaded image and return the storage path.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @return string
     */
    private function storeImage($file)
    {
        // Generate a unique filename for the uploaded image
        $imageName = time() . '_' . $file->getClientOriginalName();

        // Store the image in the public storage directory (storage/app/public/images)
        $imagePath = $file->storeAs('public/images', $imageName);

        // Return the storage path for the stored image
        return  str_replace('public/', '', $imagePath);
    }
}
