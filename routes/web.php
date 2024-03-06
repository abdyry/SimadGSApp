<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
  
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

//Topics


// Route to list topics
Route::get('/topics', [TopicController::class, 'index'])->name('topics.index');

// Route to show the topic creation form
Route::get('/topics/create', [TopicController::class, 'create'])->name('topics.create');

// Route to store a new topic
Route::post('/topics', [TopicController::class, 'store'])->name('topics.store');

// Route to show a specific topic
Route::get('/topics/{topic}', [TopicController::class, 'show'])->name('topics.show');

// Route to show the topic editing form
Route::get('/topics/{topic}/edit', [TopicController::class, 'edit'])->name('topics.edit');

// Route to update a topic
Route::put('/topics/{topic}', [TopicController::class, 'update'])->name('topics.update');

// Route to delete a topic
Route::delete('/topics/{topic}', [TopicController::class, 'destroy'])->name('topics.destroy');


//Comments


// Route to show the comment creation form
Route::get('/comments/create', [CommentController::class, 'create'])->name('comments.create');

// Route to store a new comment
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

// Route to show the comment edit form
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');

// Route to update a comment
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');

// Route to delete a comment
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');


require __DIR__.'/auth.php';
