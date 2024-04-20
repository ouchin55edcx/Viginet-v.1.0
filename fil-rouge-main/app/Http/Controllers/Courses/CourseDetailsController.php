<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Task;
use Illuminate\Http\Request;

class CourseDetailsController extends Controller
{
    public function index($lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);
        $thisLesson = Lesson::where('id', $lessonId)->with('image')->first();
        $tasks = Task::where('lesson_id', $lessonId)
            ->with('image', 'choices')
            ->get();
//        dd($tasks);
        return view('courses.course.course_details', [
            'lesson' => $lesson,
            'tasks' => $tasks,
            'thisLesson' => $thisLesson
        ]);
    }
}
