<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\PostAdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\CommentAdminController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::post('/posts/{id}/comments', [CommentController::class, 'store']);


Route::middleware(['auth.check'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::resource('/admin/posts', PostAdminController::class);
});


Route::middleware(['auth.check'])->group(function () {
    Route::resource('/admin/comments', CommentAdminController::class)->only(['index','destroy']);
});

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
    ->name('comments.destroy')
    ->middleware('auth.check');
