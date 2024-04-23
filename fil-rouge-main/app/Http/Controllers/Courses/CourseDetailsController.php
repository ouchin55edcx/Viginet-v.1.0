<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Answer;
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
        $lesson = Lesson::findOrFail($lessonId);
        $thisLesson = Lesson::where('id', $lessonId)->with('image')->first();
        $tasks = Task::where('lesson_id', $lessonId)
            ->with('image','answer')
            ->get();

        //dd($tasks);
        return view('courses.course.course_details', [
            'lesson' => $lesson,
            'tasks' => $tasks,
            'thisLesson' => $thisLesson
        ]);
    }
//if answer correcxt insert it if not display alert to try again
    public function submitAnswer(Request $request)
    {
        try {
            // Retrieve inputs from the request
            $answerId = $request->input('choiceId');
            $taskId = $request->input('taskId');
            $userId = Auth::user()->id;

            dd($answerId, $taskId , $userId);
            // Find the answer or throw a ModelNotFoundException
            $answer = Answer::findOrFail($answerId);

            // Check if the answer is correct
            if ($answer->isCorrect) {
                // Update the answer record
                $answer->create([
                    'client_id' => $userId,
                    'isCompleted' => true,
                ]);

                return redirect()->back()->with('success', 'Correct answer!');
            } else {
                return redirect()->back()->with('error', 'This answer is incorrect!');
            }
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Answer not found!');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }
}
