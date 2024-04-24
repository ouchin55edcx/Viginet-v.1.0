<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Client;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Task;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Nette\Schema\ValidationException;

class CourseDetailsController extends Controller
{
    public function index($lessonId)
    {

        $clientId = Client::where('user_id', Auth::id())->value('id');

        $lesson = Lesson::findOrFail($lessonId);
        $thisLesson = Lesson::where('id', $lessonId)->with('image')->first();
        $tasks = Task::where('lesson_id', $lessonId)
            ->with('image','answer')
            ->get();


        $completedTaskIds = Task::whereHas('clients', function ($query) use ($clientId) {
            $query->where('client_id', $clientId)
                ->where('isComplete', 1);
        })->pluck('id');

        return view('courses.course.course_details', [
            'lesson' => $lesson,
            'tasks' => $tasks,
            'thisLesson' => $thisLesson,
            'completedTaskIds' => $completedTaskIds
        ]);
    }

    public function submitAnswer(Request $request)
    {
        try {
            $taskId = $request->input('taskId');

            $clientId = Auth::user()->client->id;

            $task = Task::findOrFail($taskId);

            $task->clients()->attach($clientId, ['isComplete' => true]);

            return redirect()->back()->with('success', 'Task completed successfully!');

        } catch (ModelNotFoundException $e) {
            dd($e->getMessage());
        } catch (\Exception $e) {
            dd($e->getMessage());

        }
    }

}
