<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\Posts\PostsController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('posts')->group(function () {
    Route::get('/index', [PostsController::class, 'index'])->name('posts.index');
    Route::get('/single/{id}', [PostsController::class, 'single'])->name('posts.single');

    Route::middleware(['auth'])->group(function () {
        Route::post('/comment-store', [PostsController::class, 'storeComment'])->name('posts.comment.store');
        Route::get('/create-post', [PostsController::class, 'createPost'])->name('posts.create');
        Route::post('/store', [PostsController::class, 'store'])->name('posts.store');
    });
});
