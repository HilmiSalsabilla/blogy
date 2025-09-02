<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function editProfile($id) {
        $user = User::findorFail($id);

        if (auth()->id() !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('users.update-profile', compact('user'));
    }

    public function saveProfile(Request $request, $id) {
        $user = User::findOrFail($id);

        if (auth()->id() !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        // Validasi input
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'bio'   => 'nullable|string|max:500',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Kalau password tidak diisi, hapus dari array validasi
        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        // dd($validated); debug
        // Update data user
        $user->update($validated);

        return redirect()
            ->route('users.profile', $id)
            ->with('success', 'Profile updated successfully!');
    }

    public function profile($id) {
        $user = User::findorFail($id);

        $posts = DB::table('posts')
            ->where('posts.user_id', $user->id)
            ->leftJoin('categories', 'posts.category', '=', 'categories.id')
            ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
            ->select(
                'posts.id',
                'posts.title',
                'posts.image',
                'posts.updated_at',
                'categories.name as category_name',
                DB::raw('COUNT(comments.id) as comments_count')
            )
            ->groupBy(
                'posts.id',
                'posts.title',
                'posts.image',
                'posts.updated_at',
                'categories.name'
            )
            ->orderBy('posts.updated_at', 'desc')
            ->get();

        return view('users.profile', compact('user', 'posts'));
    }
}