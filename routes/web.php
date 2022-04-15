<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Panel\ActivityLogController;
use App\Http\Controllers\Panel\AnswerController;
use App\Http\Controllers\Panel\PaymentController;
use App\Http\Controllers\Panel\QuestionController;
use App\Http\Controllers\Panel\TicketController;
use App\Http\Controllers\ShowCategoryCourseController;
use App\Http\Controllers\ShowCourseController;
use App\Http\Controllers\ShowCourseTagController;
use App\Http\Controllers\ShowEpisodeController;
use App\Http\Controllers\ShowPostController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\Panel\CommentController;
use App\Http\Controllers\CommentController as StoreCommentController;
use App\Http\Controllers\Panel\CourseController;
use App\Http\Controllers\Panel\EditorUploadController;
use App\Http\Controllers\Panel\EditProfileController;
use App\Http\Controllers\Panel\EpisodeController;
use App\Http\Controllers\Panel\PermissionController;
use App\Http\Controllers\Panel\RoleController;
use App\Http\Controllers\Panel\SetPermissionController;
use App\Http\Controllers\Panel\TagController;
use App\Http\Controllers\Panel\UserController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\Panel\PostController;
use App\Http\Controllers\ShowCategoryPostController;
use App\Http\Controllers\ShowPostTagController;
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

Route::get('/',[LandingController::class,'index'])->name('landing');
Route::get('/post/{post:slug}',[ShowPostController::class,'show'])->name('posts.show');
Route::get('/course/{course:slug}',[ShowCourseController::class,'show'])->name('courses.show');
Route::get('/course/{course:slug}/episode/{episode:slug}',[ShowEpisodeController::class,'show'])->name('episodes.show');
Route::get('/category/post/{category:slug}',[ShowCategoryPostController::class,'show'])->name('category.post.show');
Route::get('/category/course/{category:slug}',[ShowCategoryCourseController::class,'show'])->name('category.course.show');
Route::get('/post/tag/{tag:slug}',[ShowPostTagController::class,'show'])->name('post.tag.show');
Route::get('/course/tag/{tag:slug}',[ShowCourseTagController::class,'show'])->name('course.tag.show');

Route::middleware(['auth', 'verified'])->prefix('/panel')->group(function (){
    Route::get('/',[PanelController::class,'index'])->name('panel');
    Route::resource('/users',UserController::class)->except('show');
    Route::resource('/roles',RoleController::class)->except(['create','show']);
    Route::resource('/permissions',PermissionController::class)->except(['create','show']);
    Route::resource('/setpermissions',SetPermissionController::class)->only(['index','store']);
    Route::resource('/categories',CategoryController::class)->except(['create','show']);
    Route::resource('/tags',TagController::class)->except(['create','show']);
    Route::resource('/posts',PostController::class)->except('show');
    Route::resource('/comments',CommentController::class)->except(['create','show']);
    Route::get('/comments/{comment}/reply',[CommentController::class,'reply'])->name('comments.reply');
    Route::post('/comments/{comment}/save',[CommentController::class,'save'])->name('comments.save');
    Route::put('/comments/{comment}/display',[CommentController::class,'display'])->name('comments.display');
    Route::post('/editor/upload',[EditorUploadController::class,'upload'])->name('editor.upload');
    Route::resource('/profiles',EditProfileController::class)->only(['index','update']);
    Route::resource('/courses',CourseController::class)->except('show');
    Route::resource('/episodes',EpisodeController::class)->except('show');
    Route::resource('/tickets',TicketController::class)->except(['edit','update','destroy']);
    Route::post('/tickets/{ticket}/reply',[TicketController::class,'reply'])->name('tickets.reply');
    Route::resource('/activities',ActivityLogController::class)->only(['index','destroy']);
    Route::resource('/questions',QuestionController::class)->except(['edit','update','destroy']);
    Route::post('/answers/{question}',[AnswerController::class,'store'])->name('answers.store');
});

Route::middleware(['auth', 'verified'])->prefix('/comment')->group(function (){
    Route::post('/course/{course}/store',[StoreCommentController::class,'CourseStore'])->name('comment.course.store');
    Route::post('/post/{post}/store',[StoreCommentController::class,'PostStore'])->name('comment.post.store');
    Route::post('/episode/{episode}/store',[StoreCommentController::class,'EpisodeStore'])->name('comment.episode.store');
    Route::post('/course/{course}/comment/{comment}/store',[StoreCommentController::class,'ReplyCourseStore'])->name('reply.comment.course.store');
    Route::post('/post/{post}/comment/{comment}/store',[StoreCommentController::class,'ReplyPostStore'])->name('reply.comment.post.store');
    Route::post('/episode/{episode}/comment/{comment}/store',[StoreCommentController::class,'ReplyEpisodeStore'])->name('reply.comment.episode.store');
});

//payment
Route::middleware(['auth', 'verified'])->prefix('/payment')->group(function (){
Route::post('/course/{course}',[PaymentController::class,'payment'])->name('payment');
Route::get('/course/checker',[PaymentController::class,'checker'])->name('checker');
});

//Login Google
Route::prefix('/auth')->group(function (){
    Route::get('/google/redirect', [AuthenticatedSessionController::class,'redirectToGoogle'])->name('auth.google');
    Route::get('/google/callback',[AuthenticatedSessionController::class,'callbackFromGoogle']);
});

require __DIR__.'/auth.php';
