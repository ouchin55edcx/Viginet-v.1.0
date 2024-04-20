<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Ask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AskController extends Controller
{

    public function index()
    {
        $asks = Ask::with(['user', 'askanswer' => function($query) {
            $query->latest()->take(1);
        }])->get();
//        dd($asks);
        return view('community.ask',compact('asks'));
    }
    public function store(Request $request)
    {
        //validation

        $validateData = $request->validate([
            'content' => 'required|string',
        ]);

//        dd($validateData);

        $post = new Ask();
        $post->content = $validateData['content'];
        $post->user_id = Auth::user()->id;
        $post->save();

        // Handle file uploads

        return redirect()->back()->with('success', 'Complaint submitted successfully!');

    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        $question = Ask::findOrFail($id);

        // Check if the authenticated user is the owner of the question
        if ($question->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'You are not authorized to edit this question.');
        }

        $question->content = $validatedData['content'];
        $question->save();

        return redirect()->back()->with('success', 'Question updated successfully.');
    }

    public function destroy($id)
    {
        $question = Ask::findOrFail($id);

        // Check if the authenticated user is the owner of the question
        if ($question->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this question.');
        }

        $question->delete();

        return redirect()->back()->with('success', 'Question deleted successfully.');
    }

}
