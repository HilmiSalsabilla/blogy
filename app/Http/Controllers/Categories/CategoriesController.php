<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post\PostModel;
use App\Models\Post\Category;
use App\Models\Post\Comment;

class CategoriesController extends Controller
{
    public function category($name) {
        $anotherPosts = PostModel::inRandomOrder()->take(3)->get();

        $categories = DB::table('categories')
            ->join('posts', 'posts.category', '=', 'categories.name')
            ->select(
                'categories.name AS name',
                'categories.id AS id',
                DB::raw('COUNT(posts.category) AS total')
            )
            ->groupBy('posts.category', 'categories.name', 'categories.id')
            ->get();

        $posts = PostModel::where('category', $name)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('categories.category', compact('posts', 'anotherPosts', 'categories', 'name'));
    }
}
