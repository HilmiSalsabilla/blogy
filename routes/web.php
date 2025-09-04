<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\Admins\AdminsController;
use App\Http\Controllers\Users\UsersController;
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
    Route::get('/search', [PostsController::class, 'search'])->name('posts.search');

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

// Users Profile
Route::prefix('users')->group(function () {
    Route::get('/profile/{id}', [UsersController::class, 'profile'])->name('users.profile');

    Route::middleware(['auth'])->group(function () {
        Route::get('/edit/{id}', [UsersController::class, 'editProfile'])->name('users.edit');
        Route::post('/update/{id}', [UsersController::class, 'saveProfile'])->name('users.save');
    });
});

// Admin Panel
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminsController::class, 'viewLogin'])->name('view.login')->middleware('checkforauth');
    Route::post('login', [AdminsController::class, 'checkLogin'])->name('check.login');

    Route::middleware('auth:admin')->group(function() {
        Route::get('index', [AdminsController::class, 'index'])->name('admins.dashboard');
        Route::post('logout', [AdminsController::class, 'logout'])->name('admin.logout');
        //admins
        Route::get('all-admins', [AdminsController::class, 'allAdmins'])->name('admins.all');
        Route::get('create-admins', [AdminsController::class, 'createAdmins'])->name('admins.create');
        Route::post('create-admins', [AdminsController::class, 'storeAdmins'])->name('admins.store');
        //posts
        Route::get('all-posts', [AdminsController::class, 'allPosts'])->name('posts.all');
        Route::get('edit-posts/{id}', [AdminsController::class, 'editPosts'])->name('posts.edit');
        Route::post('edit-posts/{id}', [AdminsController::class, 'updatePosts'])->name('posts.update');
        Route::get('delete-posts/{id}', [AdminsController::class, 'deletePosts'])->name('posts.delete');
        //categories
        Route::get('all-categories', [AdminsController::class, 'allCategories'])->name('categories.all');
        Route::get('create-categories', [AdminsController::class, 'createCategories'])->name('categories.create');
        Route::post('create-categories', [AdminsController::class, 'storeCategories'])->name('categories.store');
        Route::get('delete-categories/{id}', [AdminsController::class, 'deleteCategories'])->name('categories.delete');
    });
});