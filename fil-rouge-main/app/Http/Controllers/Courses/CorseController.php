<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CorseController extends Controller
{
    public function index()
    {
        $categories = Category::with('image')->get();
        return view('courses.category.index', compact('categories'));
    }
}
