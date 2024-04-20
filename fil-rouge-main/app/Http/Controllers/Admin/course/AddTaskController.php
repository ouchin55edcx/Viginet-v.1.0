<?php

namespace App\Http\Controllers\Admin\course;

use App\Http\Controllers\Controller;
use App\Models\Choice;
use App\Models\Image;
use App\Models\Lesson;
use App\Models\Task;
use Illuminate\Http\Request;

class AddTaskController extends Controller
{
    public function index()
    {
        $lessons = Lesson::all();
        return view('admin.course.addTask', compact('lessons'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'category' => 'required|exists:lessons,id',
            'task-title' => 'required|string',
            'task-content' => 'required|string',
            'task-question' => 'required|string',
            'options' => 'required|array|min:2', // Assuming at least two options are required
            'options.*' => 'required|string',
            'correct-choice' => 'required|string',
            'image' => 'required|file|mimes:jpeg,png,jpg|max:2048',

        ]);

//        dd($validatedData);

        $imagePath = $this->storeImage($request->file('image'));


        // Create a new task
        $task = Task::create([
            'title' => $validatedData['task-title'],
            'content' => $validatedData['task-content'],
            'question' => $validatedData['task-question'],
            'lesson_id' => $validatedData['category'],
        ]);

        // Create choices (options) for the task
        $options = $request->input('options');
        $correctChoice = $validatedData['correct-choice'];

        foreach ($options as $option) {
            Choice::create([
                'choice_text' => $option,
                'is_correct' => $option === $correctChoice,
                'task_id' => $task->id, // Update the foreign key name
            ]);
        }
        Image::create([
            'path' => $imagePath,
            'imageable_id' => $task->id,
            'imageable_type' => Task::class,
        ]);




        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'Task created successfully.');
    }

    private function storeImage($image)
    {
        $directory = 'images';
        return $image->store($directory, 'public');
    }

}
