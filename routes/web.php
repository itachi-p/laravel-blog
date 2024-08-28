<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

# Middleware ~~ will not any users that are not authenticated/logged in.
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [PostController::class, 'index'])->name('index');

    // Route::get('/post/create', [PostController::class, 'create'])->name('post.create');

    // POST - This Route Group will organize or group all routes related to POST
    Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
        Route::get('/create', [PostController::class, 'create'])->name('create'); // post.create
        Route::post('/store', [PostController::class, 'store'])->name('store'); // post.store
        Route::get('/{id}/show', [PostController::class, 'show'])->name('show'); // post.show
        Route::get('/{id}/edit', [PostController::class, 'edit'])->name('edit'); // post.edit
        Route::patch('/{id}/update', [PostController::class, 'update'])->name('update'); // post.update
        Route::delete('/{id}/destroy', [PostController::class, 'destroy'])->name('destroy'); // post.destroy
    });

    // COMMENT
    Route::group(['prefix' => 'comment', 'as' => 'comment.'], function () {
        Route::post('/{post_id}/store', [CommentController::class, 'store'])->name('store'); // comment.store
    });
});
