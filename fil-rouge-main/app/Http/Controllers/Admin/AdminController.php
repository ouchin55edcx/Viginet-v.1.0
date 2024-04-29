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


        $clients = User::where('role','client')->with('client')->paginate(5);
        //dd($clients);

        return view('admin.index', compact('categories', 'ClientsCount', 'LessonsCount', 'CategoriesCount', 'ComplaintsCount','clients'));
    }

    public function updateStatus(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        // Toggle the status
        $newStatus = ($client->status === 'active') ? 'inactive' : 'active';
        $client->update(['status' => $newStatus]);

        // Return the updated status in the response
        return response()->json(['status' => $newStatus]);
    }

}
