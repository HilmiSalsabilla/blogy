@extends('layouts.app')

@section('content')
<div class="section">
    <div class="container">
        <div class="row">

            <div class="container-fluid">
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="flash-message">
                        {{ Session::get('success') }}
                    </div>
                @endif
            </div>

            {{-- Sidebar Profil User --}}
            <div class="col-lg-12 mb-6">
                <div class="sidebar-box text-center bg-white shadow-sm p-4 rounded">
                    <div class="bio">
                        <img src="{{ $user->image ? asset('assets/user_images/' . $user->image) : asset('assets/images/default-user.png') }}"
                             alt="{{ $user->name }}" class="img-fluid mb-3 rounded-circle" width="120">
                        <div class="bio-body">
                            <h3 class="mb-2">{{ $user->name }}</h3>
                            <p class="text-muted">{{ $user->email }}</p>
                            <p class="mb-3">{{ $user->bio ?? 'No bio available.' }}</p>
                            @if(Auth::id() === $user->id)
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm rounded px-3 py-2">
                                    Edit Profile
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Daftar Postingan User --}}
            <div class="col-lg-12">
                <h4 class="mb-4">My Posts</h4>

                @if($posts->count())
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-md-3 mb-4">
                                <div class="card h-100 shadow-sm border-0">
                                    <a href="{{ route('posts.single', $post->id) }}">
                                        <img src="{{ asset('assets/images/' . $post->image. '') }}"
                                             class="card-img-top rounded" alt="{{ $post->title }}" style="height: 180px; object-fit: cover;">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="{{ route('posts.single', $post->id) }}" class="text-dark">
                                                {{ $post->title }}
                                            </a>
                                        </h5>
                                        <p class="mb-1">
                                            <small class="text-muted">
                                                Category: {{ $post->category_name ?? 'Uncategorized' }}
                                            </small>
                                        </p>
                                        <p class="mb-1">
                                            <small class="text-muted">
                                                {{ $post->comments_count }} comments
                                            </small>
                                        </p>
                                        <p class="mb-0">
                                            <small class="text-muted">
                                                Updated {{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">You haven't written any posts yet.</p>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection