<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Post\PostModel;
use App\Models\Post\Category;
use App\Models\Admin\Admin;

class AdminsController extends Controller
{
    public function viewLogin() {
        return view('admins.login');
    }

    public function checkLogin(Request $request) {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt([
            'email' => $request->input("email"), 
            'password' => $request->input("password")
        ], 
            $remember_me)) {
                return redirect()->route('admins.dashboard');
            }
        return redirect()->back()->with(['error' => 'error logging in']);
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('view.login');
    }

    public function index(Request $request) {
        $year = $request->input('year', now()->year); // default tahun ini

        // ambil data posts per bulan
        $postsPerMonth = DB::table('posts')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total'))
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->pluck('total', 'month');

        // bikin array 12 bulan, kalau tidak ada datanya isi 0
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $data[] = $postsPerMonth[$i] ?? 0;
        }

        //count
        $postCount = PostModel::count();
        $categoryCount = Category::count();
        $adminCount = Admin::count();

        return view('admins.index', compact('postCount', 'categoryCount', 'adminCount', 'year', 'data'));
    }

    public function allAdmins() {
        $admins = Admin::select()->orderBy('id')->get();
        
        return view('admins.all-admins', compact('admins'));
    }

    public function createAdmins() {
        return view('admins.create-admins');
    }

    public function storeAdmins(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required'],
        ]);

        $admins = Admin::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        if($admins) {
            return redirect()->route('admins.all')->with(['success'=>'Admin created successfully']);
        }  
    }

    public function allPosts() {
        $posts = PostModel::orderBy('id', 'desc')->get();

        return view('admins.all-posts', compact('posts'));
    }

    public function editPosts($id) {
        $posts = PostModel::findorFail($id);
        $categories = Category::all();

        return view('admins.edit-posts', compact('posts', 'categories'));
    }

    public function updatePosts(Request $request, $id) {
        $posts = PostModel::findorFail($id);
        // Validasi input
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'category'    => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Update field biasa
        $posts->title       = $request->title;
        $posts->description = $request->description;
        $posts->category    = $request->category;

        // Handle upload image baru
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images'), $imageName);

            // Hapus gambar lama kalau ada
            if ($posts->image && file_exists(public_path('assets/images/' . $posts->image))) {
                unlink(public_path('assets/images/' . $posts->image));
            }

            $posts->image = $imageName;
        }

        $posts->save();

        return redirect()->route('posts.all')->with(['success' => 'Post updated successfully']);
    }

    public function deletePosts($id) {
        $posts = PostModel::findOrFail($id);

        // Hapus gambar dari folder
        if ($posts->image && file_exists(public_path('assets/images/' . $posts->image))) {
            unlink(public_path('assets/images/' . $posts->image));
        }

        $posts->delete();

        return redirect()->route('posts.all')->with(['danger' => 'Post deleted successfully']);
    }

    public function allCategories() {
        $categories = Category::orderBy('id', 'desc')->get();

        return view('admins.all-categories', compact('categories'));
    }

    public function createCategories() {
        return view('admins.create-categories');
    }

    public function storeCategories(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.all')->with('success', 'Category created successfully');
    }

    public function deleteCategories($id) {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.all')->with('danger', 'Category deleted successfully');
    }
}
