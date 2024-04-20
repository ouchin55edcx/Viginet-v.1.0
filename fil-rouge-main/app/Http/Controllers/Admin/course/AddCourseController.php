<?php

namespace App\Http\Controllers\Admin\course;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Choice;
use App\Models\Image;
use App\Models\Lesson;
use App\Models\Task;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Import the Log facade


class AddCourseController extends Controller
{
        public function index()
        {
            $categories = Category::all();
            return view('admin.course.addCourse', compact('categories'));
        }

    // Controller
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|file|mimes:jpeg,png,jpg|max:2048',
            'category' => 'required|exists:categories,id', // Validate the category ID
        ]);


        $imagePath = $this->storeImage($request->file('image'));

        $lesson = Lesson::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category'], // Assuming you have a category_id field in your Lesson model
        ]);

        Image::create([
            'path' => $imagePath,
            'imageable_id' => $lesson->id,
            'imageable_type' => Lesson::class,
        ]);

        return redirect()->back()->with('success', 'Course created successfully!');
    }
    private function storeImage($image)
    {
        $directory = 'images';
        return $image->store($directory, 'public');
    }
    }

