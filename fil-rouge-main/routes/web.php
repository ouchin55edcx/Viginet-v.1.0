<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\category\CategoryManagerController;
use App\Http\Controllers\Admin\course\AddCourseController;
use App\Http\Controllers\Admin\course\CorseManagerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Community\CommunityController;
use App\Http\Controllers\Expert\ExpertController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Complaint\ComplaintController;
use App\Http\Controllers\Courses\CategoryController;
use App\Http\Controllers\Courses\CorseController;
use App\Http\Controllers\Courses\CourseDetailsController;
use App\Http\Controllers\Courses\CoursesListController;

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

Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::resource('/register' , RegisterController::class);
Route::resource('login', LoginController::class)->only(['index', 'store']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::resource('/forget-password', ForgotPasswordController::class)->only('index');
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('google.callback');


// category routes
Route::resource('/courses/category', CorseController::class)->only('index');



// courses list  routes
Route::resource('/courses/course/course_list', CoursesListController::class)->only('index');
//Route::resource('/courses/course/course_details', CourseDetailsController::class)->only('index');
Route::get('/courses/course/{lessonId}/course_details', [CourseDetailsController::class, 'index'])->name('course_details.index');
// dashborad admin routes
Route::resource('/admin', AdminController::class)->only('index');

Route::resource('/admin/category/categoriesManager', CategoryManagerController::class)->only('index','store','edit','update','destroy');

Route::resource('/admin/course/coursesManager', CorseManagerController::class)->only('index','store','edit','update','destroy');

Route::resource('/admin/course/addTask', \App\Http\Controllers\Admin\course\AddTaskController::class)->only('index', 'store', 'edit', 'update', 'destroy');
Route::resource('/admin/course/addCourse', \App\Http\Controllers\Admin\course\AddCourseController::class)->only('index', 'store', 'edit', 'update', 'destroy');

//dashboard expert
Route::resource('/expert', ExpertController::class)->only('index');
Route::post('/expert/approve', [ExpertController::class, 'approve'])->name('expert.approve');




Route::post('/admin/course/addTask', [\App\Http\Controllers\Admin\course\AddTaskController::class, 'store'])->name('admin.course.addTask.store');
Route::post('/admin/course/addCourse', [\App\Http\Controllers\Admin\course\AddCourseController::class, 'store'])->name('admin.course.addCourse.store');
// complaint
Route::resource('/complaint', ComplaintController::class)->only('index','store');

//community
Route::resource('/community', CommunityController::class)->only('index','store');
Route::resource('/posts', \App\Http\Controllers\Community\PostController::class)->only(['store', 'update','destroy']);
Route::resource('/asks', \App\Http\Controllers\Community\AskController::class)->only('index','store','update','destroy');
Route::resource('/askanswers', \App\Http\Controllers\Community\AskAnswerController::class)->only('index','store');
Route::resource('search', \App\Http\Controllers\search\SearchController::class)->only(['index', 'show']);

Route::resource('comments', \App\Http\Controllers\Community\CommentController::class)->only([
    'store'
])->parameters([
    'comments' => 'postId'
]);
Route::get('/askanswers/{ask_id}', [\App\Http\Controllers\Community\AskAnswerController::class,'index'])->name('askanswers.index');

Route::put('/posts/{id}', [\App\Http\Controllers\Community\PostController::class, 'update'])->name('posts.update');

// routes/web.php
Route::get('/postSearch', [\App\Http\Controllers\Community\PostController::class, 'postSearch'])->name('posts.search');

Route::post('/posts/{post}/like', [\App\Http\Controllers\Community\PostController::class, 'like'])->name('posts.like');
Route::post('/posts/{post}/save', [\App\Http\Controllers\Community\PostController::class, 'save'])->name('posts.like');
Route::resource('/client', ClientController::class)->only(['index', 'show', 'update']);
Route::put('/client/{client}/update-image', [ClientController::class, 'updateImage'])->name('client.updateImage');




//score
Route::post('/submit/answer', [\App\Http\Controllers\ScoreController::class, 'submitAnswer'])->name('submit.answer');
