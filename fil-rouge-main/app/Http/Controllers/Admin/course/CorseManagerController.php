<?php

namespace App\Http\Controllers\Admin\course;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Lesson;
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
}
