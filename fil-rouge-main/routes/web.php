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



// Routes for AdminController
Route::middleware('role:SuperAdmin')->group(function () {
    Route::resource('/admin', AdminController::class)->only('index');
    Route::resource('/admin/category/categoriesManager', CategoryManagerController::class)->only('index','store','edit','update','destroy');

    Route::resource('/admin/course/coursesManager', CorseManagerController::class)->only('index','store','edit','update','destroy');

    Route::resource('/admin/course/addTask', \App\Http\Controllers\Admin\course\AddTaskController::class)->only('index', 'store', 'edit', 'update', 'destroy');
    Route::resource('/admin/course/addCourse', \App\Http\Controllers\Admin\course\AddCourseController::class)->only('index', 'store', 'edit', 'update', 'destroy');

    Route::post('/admin/course/addTask', [\App\Http\Controllers\Admin\course\AddTaskController::class, 'store'])->name('admin.course.addTask.store');
    Route::post('/admin/course/addCourse', [\App\Http\Controllers\Admin\course\AddCourseController::class, 'store'])->name('admin.course.addCourse.store');

    Route::patch('/clients/{id}', [AdminController::class, 'updateStatus'])->name('clients.updateStatus');

    Route::delete('/lessons/{lesson}', [CorseManagerController::class, 'destroy'])->name('lessons.destroy');

    Route::get('/lessons/{lessonId}', [CorseManagerController::class, 'show'])->name('lessons.show');

    Route::delete('/tasks/{taskId}', [\App\Http\Controllers\Admin\course\AddTaskController::class, 'deleteTask'])->middleware('auth')->name('tasks.delete');

});

// Routes for ExpertController
Route::middleware('role:Expert')->group(function () {
    Route::resource('/expert', ExpertController::class)->only('index');
    Route::post('/expert/approve', [ExpertController::class, 'approve'])->name('expert.approve');
    Route::get('/expert/approveComplaint/{id}', [\App\Http\Controllers\Expert\ApproveComplaintController::class, 'index'])->name('aproveComplainte');
    Route::resource('reports', \App\Http\Controllers\Expert\ReportController::class)->only(['store']);


});


// Routes for ClientController
Route::middleware('role:Client')->group(function () {
    Route::resource('/client', ClientController::class)->only(['index', 'show', 'update']);

    Route::put('/client/{client}/update-image', [ClientController::class, 'updateImage'])->name('client.updateImage');


    Route::resource('search', \App\Http\Controllers\search\SearchController::class)->only(['index', 'show']);

    // category routes
    Route::resource('/courses/category', CorseController::class)->only('index');

    // courses list  routes
    Route::resource('/courses/course/course_list', CoursesListController::class)->only('index');

    //Route::resource('/courses/course/course_details', CourseDetailsController::class)->only('index');
    Route::get('/courses/course/{lessonId}/course_details', [CourseDetailsController::class, 'index'])->name('course_details.index');

    Route::post('/submit-answer', [CourseDetailsController::class,'submitAnswer'])->name('submit.answer');

});

Route::resource('/complaint', ComplaintController::class)->only('index','store');

//community
Route::resource('/community', CommunityController::class)->only('index','store');
Route::resource('/posts', \App\Http\Controllers\Community\PostController::class)->only(['store', 'update','destroy']);
Route::resource('/asks', \App\Http\Controllers\Community\AskController::class)->only('index','store','update','destroy');
Route::resource('/askanswers', \App\Http\Controllers\Community\AskAnswerController::class)->only('index','store');

Route::resource('comments', \App\Http\Controllers\Community\CommentController::class)->only([
    'store'
])->parameters([
    'comments' => 'postId'
]);

Route::get('/askanswers/{ask_id}', [\App\Http\Controllers\Community\AskAnswerController::class,'index'])->name('askanswers.index');

Route::put('/posts/{id}', [\App\Http\Controllers\Community\PostController::class, 'update'])->name('posts.update');


Route::post('/posts/{post}/like', [\App\Http\Controllers\Community\PostController::class, 'like'])->name('posts.like');
Route::post('/posts/{post}/save', [\App\Http\Controllers\Community\PostController::class, 'save'])->name('posts.like');
Route::get('/postSearch', [\App\Http\Controllers\Community\PostController::class, 'postSearch'])->name('posts.search');


// attent page

Route::get('/acceptance', [\App\Http\Controllers\Auth\AcceptanceController::class, 'index'])->name('acceptance');


// routes/web.php

Route::delete('/complaints/{id}', 'ComplaintController@destroy')->name('complaints.destroy');


Route::get('/ban', function () {
    return view('auth.ban');
})->name('ban.page');
