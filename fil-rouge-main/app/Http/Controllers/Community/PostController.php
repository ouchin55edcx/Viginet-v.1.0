<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\ImageUploadTrait;


class PostController extends Controller
{
    use ImageUploadTrait;

    public function store(Request $request)
    {
          //validation

        $validateData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|string',
            'image.*' => 'required|image|max:2048', // Max 2MB image file size for each file
        ]);

//        dd($validateData);

        $post = new Post();
        $post->title = $validateData['title'];
        $post->content = $validateData['content'];
        $post->user_id = Auth::user()->id;
        $post->save();

        // Handle file uploads
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $imagePath = $this->storeImage($file);
                $this->createImageRecord($imagePath,  $post->id, Post::class);
            }
        }

        return redirect()->back()->with('success', 'Complaint submitted successfully!');

    }

    public function update(UpdatePostRequest $request, $id)
    {
        $validatedData = $request->validated();
        $post = Post::findOrFail($id);

        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->user_id = Auth::id();

        // Handle file uploads
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $imagePath = $this->storeImage($file);
                $post->image()->update([
                    'path' => $imagePath,
                ]);
            }
        }

        $post->save();

        return redirect()->back()->with('success', 'Post updated successfully!');
    }



    public function like(Request $request, $postId)
    {
        try {
            $post = Post::findOrFail($postId);

            $client = Auth::user()->client;

            $isLiked = $client->likedPosts()->where('post_id', $postId)->exists();

            if ($isLiked) {
                $client->likedPosts()->detach($postId);
                $message = 'Post unliked successfully.';
            } else {
                $client->likedPosts()->attach($postId);
                $message = 'Post liked successfully.';
            }

            $likesCount = $post->likedByClients()->count();

            return response()->json(['message' => $message, 'likes_count' => $likesCount], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to process like action.'], 500);
        }
    }
    public function save(Request $request, $postId)
    {
        try {
            $post = Post::findOrFail($postId);
            $user = Auth::user();

            if ($user->savedPosts()->where('post_id', $postId)->exists()) {
                // Unsave the post
                $user->savedPosts()->detach($postId);
                $message = 'Post unsaved successfully.';
            } else {
                // Save the post
                $user->savedPosts()->attach($postId);
                $message = 'Post saved successfully.';
            }

            return response()->json(['message' => $message], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to process save action.'], 500);
        }
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Check if the authenticated user is the owner of the post
        if ($post->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this post.');
        }

        $post->delete();

        $post->image()->delete();

        return redirect()->back()->with('success', 'Post deleted successfully.');
    }

    public function postSearch(Request $request)
    {
        $query = $request->query('query');

        if ($query) {
            $posts = Post::where('title', 'like', "%$query%")
                ->orWhere('content', 'like', "%$query%")
                ->get();

            return response()->json($posts);
        }

        return response()->json([]);
    }


}
