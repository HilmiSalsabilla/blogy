<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post\PostModel;
use App\Models\Post\Category;
use App\Models\User;

class PostsController extends Controller
{
    public function index() {
        //first section
        $posts = PostModel::orderBy('id', 'asc')->take(2)->get();
        $postOne = PostModel::orderBy('id', 'desc')->take(1)->get();
        $postTwo = PostModel::orderBy('id', 'desc')->skip(1)->take(2)->get();

        //second section
        $postBus = PostModel::where('category', 'Business')
                    ->orderBy('id', 'desc')->take(2)->get();
        $postBusTwo = PostModel::where('category', 'Business')
                    ->orderBy('id', 'desc')->skip(2)->take(3)->get();

        //random posts
        // $randomPosts = PostModel::inRandomOrder()->take(4)->get();
        $randomPosts = PostModel::take(4)->orderBy('category', 'desc')->get();

        //third section
        $postCul = PostModel::where('category', 'Culture')
                    ->orderBy('id', 'desc')->take(2)->get();
        $postCulTwo = PostModel::where('category', 'Culture')
                    ->orderBy('id', 'desc')->skip(2)->take(3)->get();

        //fourth section
        $postPol = PostModel::where('category', 'Politics')
                    ->orderBy('id', 'desc')->take(4)->get();

        //fifth section
        $postTra = PostModel::where('category', 'Travel')
                    ->orderBy('id', 'desc')->take(1)->get();
        $postTraOne = PostModel::where('category', 'Travel')
                    ->orderBy('id', 'desc')->skip(1)->take(1)->get();
        $postTraTwo = PostModel::where('category', 'Travel')
                    ->orderBy('id', 'desc')->skip(2)->take(2)->get();

        return view('posts.index', 
            compact(
                'posts', 
                'postOne', 
                'postTwo', 
                'postBus', 
                'postBusTwo',
                'randomPosts', 
                'postCul', 
                'postCulTwo', 
                'postPol', 
                'postTra', 
                'postTraOne', 
                'postTraTwo'
            ));
    }

    public function single($id) {
        $single = PostModel::findorFail($id);
        $user = User::findorFail($single->user_id);

        $anotherPosts = PostModel::inRandomOrder()->take(3)->get();

        $categories = DB::table('categories')
                    ->join('posts', 'posts.category', '=', 'categories.name')
                    ->select('categories.name AS name', 'categories.id AS id', DB::raw('COUNT(posts.category) AS total'))
                    ->groupBy('posts.category')
                    ->get();
        // $categories = Category::withCount('posts')->get();

        $morePosts = PostModel::inRandomOrder()->take(4)->get();

        return view('posts.single', compact('single', 'user', 'anotherPosts', 'categories', 'morePosts'));
    }
}
