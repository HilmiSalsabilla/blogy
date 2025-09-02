<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\Posts\PostsController;
use App\Http\Controllers\Categories\CategoriesController;
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

// Route::get('/', function () {
//     return view('posts/index');
// });

Auth::routes();

// Pages
Route::get('/', [PostsController::class, 'index'])->name('welcome');
Route::get('/home', [PostsController::class, 'index'])->name('home');
Route::get('/contact', [PostsController::class, 'contact'])->name('pages.contact');
Route::get('/about', [PostsController::class, 'about'])->name('pages.about');

// Posts
Route::prefix('posts')->group(function () {
    Route::get('/index', [PostsController::class, 'index'])->name('posts.index');
    Route::get('/single/{id}', [PostsController::class, 'single'])->name('posts.single');

    Route::middleware(['auth'])->group(function () {
        Route::post('/comment-store', [PostsController::class, 'storeComment'])->name('posts.comment.store');
        Route::get('/create-post', [PostsController::class, 'createPost'])->name('posts.create');
        Route::post('/post-store', [PostsController::class, 'storePost'])->name('posts.store');
        Route::post('/post-delete/{id}', [PostsController::class, 'deletePost'])->name('posts.delete');
        Route::get('/post-edit/{id}', [PostsController::class, 'editPost'])->name('posts.edit');
        Route::post('/post-update/{id}', [PostsController::class, 'updatePost'])->name('posts.update');
    });
});

// Categories
Route::prefix('categories')->group(function () {
    Route::get('/category/{name}', [CategoriesController::class, 'category'])->name('category.single');
});