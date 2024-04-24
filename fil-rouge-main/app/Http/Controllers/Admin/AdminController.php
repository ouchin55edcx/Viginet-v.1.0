<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Complaint;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $categories = Category::with('image')->get();

        $ClientsCount = Client::count();

        $LessonsCount = Lesson::count();

        $CategoriesCount = Category::count();

        $ComplaintsCount = Complaint::count();


        return view('admin.index', compact('categories', 'ClientsCount', 'LessonsCount', 'CategoriesCount', 'ComplaintsCount'));
    }
}
