<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

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
    });
});
