<?php

// app/Http/Controllers/Complaint/ComplaintController.php

namespace App\Http\Controllers\Complaint;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Traits\ImageUploadTrait; // Import the ImageUploadTrait
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    use ImageUploadTrait; // Use the ImageUploadTrait

    public function index()
    {
        return view('Complaint.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'attack' => 'required|in:TypeA,TypeB,TypeC',
            'description' => 'required|string',
            'is_anonymous' => 'nullable|boolean',
            'callback' => 'nullable|string',
            'image.*' => 'required|image|max:2048', // Max 2MB image file size for each file
        ]);

        $complaint = new Complaint();
        $complaint->attack = $validatedData['attack'];
        $complaint->description = $validatedData['description'];
        $complaint->callback = $validatedData['callback'] ?? null;

        if (Auth::check()) {
            $complaint->user_id = Auth::user()->id;
            $complaint->is_nonymous = 0;
        } else {
            $complaint->is_nonymous = 1;
        }

        // Save the complaint to the database
        $complaint->save();

        // Handle file uploads
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $imagePath = $this->storeImage($file);
                $this->createImageRecord($imagePath, $complaint->id, Complaint::class);
            }
        }

        return redirect()->back()->with('success', 'Complaint submitted successfully!');
    }
}
