<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Lesson;
use Illuminate\Http\Request;

class CoursesListController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->query('id');
        $category = Category::findOrFail($categoryId);
        $lessons = Lesson::where('category_id', $category->id)->with('image')->get();
        // dd($lessons);    
        return view('courses.course.course_list', compact('lessons'));
    }
}
