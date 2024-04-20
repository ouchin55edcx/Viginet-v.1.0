<?php

namespace App\Http\Controllers;

use App\Models\score;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    public function submitAnswer(Request $request)
    {
        $validatedData = $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'answer' => 'required|boolean',
        ]);

        // Logic to process the answer and determine correctness
        $taskId = $validatedData['task_id'];
        $isCorrect = $validatedData['answer'];

        // Update task completion status if the answer is correct
        if ($isCorrect) {
            $task = Task::find($taskId);
            if ($task) {
                $task->is_complete = true;
                $task->save();
            }
        }

        // Return a response indicating success or failure
        return response()->json(['message' => 'Answer processed successfully']);
    }

}
