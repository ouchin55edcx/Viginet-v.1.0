<?php

namespace App\Http\Controllers\search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;

class SearchController extends Controller
{
    public function index()
    {
        $lessons = Lesson::with('image', 'category')->paginate(5);
        return view('searsh.index', compact('lessons'));
    }

    public function show($search)
    {
        $lessons = Lesson::with('image', 'category');

        if (!empty($search)) {
            $lessons = $lessons->where('title', 'LIKE', '%' . $search . '%');
        }

        $lessons = $lessons->get();

        return response()->json([
            'lessons' => $lessons
        ]);
    }
}
