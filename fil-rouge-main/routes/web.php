<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Category\CategoryManagerController;
use App\Http\Controllers\Admin\Course\AddCourseController;
use App\Http\Controllers\Admin\Course\AddTaskController;
use App\Http\Controllers\Admin\Course\CorseManagerController;
use App\Http\Controllers\Auth\AcceptanceController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Complaint\ComplaintController;
use App\Http\Controllers\Community\AskAnswerController;
use App\Http\Controllers\Community\AskController;
use App\Http\Controllers\Community\CommentController;
use App\Http\Controllers\Community\CommunityController;
use App\Http\Controllers\Community\PostController;
use App\Http\Controllers\Courses\CategoryController;
use App\Http\Controllers\Courses\CorseController;
use App\Http\Controllers\Courses\CourseDetailsController;
use App\Http\Controllers\Courses\CoursesListController;
use App\Http\Controllers\Expert\ApproveComplaintController;
use App\Http\Controllers\Expert\ExpertController;
use App\Http\Controllers\Expert\ReportController;
use App\Http\Controllers\Search\SearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Common routes
Route::get('/', function () {
    return view('welcome');
});

Route::resource('/register', RegisterController::class);
Route::resource('login', LoginController::class)->only(['index', 'store']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::resource('/forget-password', ForgotPasswordController::class)->only('index');
Route::get('/acceptance', [AcceptanceController::class, 'index'])->name('acceptance');

// SuperAdmin routes
Route::middleware('role:SuperAdmin')->group(function () {
    Route::resource('/admin', AdminController::class)->only('index');
    Route::resource('/admin/category/categoriesManager', CategoryManagerController::class)->only('index', 'store', 'edit', 'update', 'destroy');
    Route::resource('/admin/course/coursesManager', CorseManagerController::class)->only('index', 'store', 'edit', 'update', 'destroy');
    Route::resource('/admin/course/addTask', AddTaskController::class)->only('index', 'store', 'edit', 'update', 'destroy');
    Route::resource('/admin/course/addCourse', AddCourseController::class)->only('index', 'store', 'edit', 'update', 'destroy');
    Route::post('/admin/course/addTask', [AddTaskController::class, 'store'])->name('admin.course.addTask.store');
    Route::post('/admin/course/addCourse', [AddCourseController::class, 'store'])->name('admin.course.addCourse.store');
    Route::patch('/clients/{id}', [AdminController::class, 'updateStatus'])->name('clients.updateStatus');
    Route::delete('/lessons/{lesson}', [CorseManagerController::class, 'destroy'])->name('lessons.destroy');
    Route::get('/lessons/{lessonId}', [CorseManagerController::class, 'show'])->name('lessons.show');
    Route::delete('/tasks/{taskId}', [AddTaskController::class, 'deleteTask'])->middleware('auth')->name('tasks.delete');
});

// Expert routes
Route::middleware('role:Expert')->group(function () {
    Route::resource('/expert', ExpertController::class)->only('index');
    Route::post('/expert/approve', [ExpertController::class, 'approve'])->name('expert.approve');
    Route::get('/expert/approveComplaint/{id}', [ApproveComplaintController::class, 'index'])->name('aproveComplainte');
    Route::resource('reports', ReportController::class)->only(['store']);
});

// Client routes
Route::middleware('role:Client')->group(function () {
    Route::resource('/client', ClientController::class)->only(['index', 'show', 'update']);
    Route::put('/client/{client}/update-image', [ClientController::class, 'updateImage'])->name('client.updateImage');
    Route::resource('search', SearchController::class)->only(['index', 'show']);
    Route::resource('/courses/category', CorseController::class)->only('index');
    Route::resource('/courses/course/course_list', CoursesListController::class)->only('index');
    Route::get('/courses/course/{lessonId}/course_details', [CourseDetailsController::class, 'index'])->name('course_details.index');
    Route::post('/submit-answer', [CourseDetailsController::class, 'submitAnswer'])->name('submit.answer');
    Route::delete('/complaints/{complaint}', [ComplaintController::class, 'destroy'])->name('complaints.destroy')->middleware('auth');
});

// Complaint routes
Route::resource('/complaint', ComplaintController::class)->only('index', 'store');

// Community routes
Route::resource('/community', CommunityController::class)->only('index', 'store');
Route::resource('/posts', PostController::class)->only(['store', 'update', 'destroy']);
Route::resource('/asks', AskController::class)->only('index', 'store', 'update', 'destroy');
Route::resource('/askanswers', AskAnswerController::class)->only('index', 'store');
Route::resource('comments', CommentController::class)->only(['store'])->parameters(['comments' => 'postId']);
Route::get('/askanswers/{ask_id}', [AskAnswerController::class, 'index'])->name('askanswers.index');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
Route::post('/posts/{post}/save', [PostController::class, 'save'])->name('posts.like');
Route::get('/postSearch', [PostController::class, 'postSearch'])->name('posts.search');
