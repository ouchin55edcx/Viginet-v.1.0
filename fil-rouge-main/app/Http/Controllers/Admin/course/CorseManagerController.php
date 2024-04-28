<?php

namespace App\Http\Controllers\Admin\course;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Lesson;
use App\Models\Task;
use Illuminate\Http\Request;

class CorseManagerController extends Controller
{
    public function index()
    {
        $lessons = Lesson::with('image')->get();
        $count = Lesson::count();
        $categories = Category::all();

//         dd($lessons);
        return view('admin.course.coursesManager', compact('lessons','count','categories'));
    }

    public function show($lessonId)
    {
        // Retrieve lesson details by lessonId
        $lesson = Lesson::with('image', 'tasks')->findOrFail($lessonId);

        // Return lesson details as JSON response
        return response()->json($lesson);
    }

    public function destroy($id)
    {
        try {
            $lesson = Lesson::findOrFail($id);

            $lesson->delete();
            if ($lesson->image) {
                $lesson->image->delete();
            }

            return redirect()->back()->with('success', 'Lesson deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete lesson.');
        }
    }

}
