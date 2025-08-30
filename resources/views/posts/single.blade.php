@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <div class="site-cover site-cover-sm same-height overlay single-page"
         style="background-image: url('{{ asset('assets/images/' . $single->image. '') }}'); margin-top:-25px">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-6">
                    <div class="post-entry text-center">
                        <h1 class="mb-4">{{ $single->title }}</h1>
                        <div class="post-meta align-items-center text-center">
                            <figure class="author-figure mb-0 me-3 d-inline-block">
                                <img src="{{ asset('assets/user_images/' . $user->image) }}"
                                     alt="{{ $user->name }}" class="img-fluid rounded-circle">
                            </figure>
                            <span class="d-inline-block mt-1">By {{ $single->user_name }}</span>
                            <span>&nbsp;-&nbsp; {{ \Carbon\Carbon::parse($single->created_at)->format('d M Y H:i') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Content Section --}}
    <section class="section">
        <div class="container">
            <div class="row blog-entries element-animate">
                {{-- Main Content --}}
                <div class="col-md-12 col-lg-8 main-content">
                    <div class="post-content-body">
                        <p>{!! nl2br(e($single->description)) !!}</p>
                    </div>

                    {{-- Category & Delete --}}
                    <div class="pt-4 d-flex justify-content-between align-items-center border-top mt-4 pt-3">
                        <p class="mb-0">
                            Category:
                            <a href="#" class="text-decoration-none">{{ $single->category }}</a>
                        </p>

                        @auth
                            @if(Auth::id() === $single->user_id)
                                <form action="{{ route('posts.delete', $single->id) }}" 
                                    method="POST" 
                                    onsubmit="return confirm('Are you sure you want to delete this post?')">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Delete My Post</button>
                                </form>
                            @endif
                        @endauth
                    </div>

                    {{-- Comments --}}
                    <div class="pt-5 comment-wrap">
                        <h3 class="mb-5 heading">{{ $commentsCount }} Comment</h3>
                        <ul class="comment-list">
                            @forelse ($comments as $comment)
                                <li class="comment">
                                    <div class="vcard">
                                        <img src="{{ asset('assets/user_images/'. $comment->image) }}" alt="Image placeholder">
                                    </div>
                                    <div class="comment-body">
                                        <h3>{{ $comment->user_name }}</h3>
                                        <div class="meta">
                                            {{ \Carbon\Carbon::parse($comment->created_at)->format('d M Y H:i') }}
                                        </div>
                                        <p>{{ $comment->comment }}</p>
                                    </div>
                                </li>
                            @empty
                                <p style="text-align: center">There is no comment in this post yet.</p>
                            @endforelse
                        </ul>

                        {{-- Comment Form --}}
                        @auth
                            <div class="comment-form-wrap pt-5">
                                <h3 class="mb-5">Leave a comment</h3>

                                {{-- Flash Message --}}
                                @if(Session::has('success'))
                                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif

                                <form action="{{ route('posts.comment.store') }}" method="POST" class="p-5 bg-light">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $single->id }}">
                                    <div class="form-group">
                                        <label for="comment">Comment</label>
                                        <textarea name="comment" cols="30" rows="5" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="submit" value="Post Comment" class="btn btn-sm btn-primary">
                                    </div>
                                </form>
                            </div>
                        @else
                            <p style="text-align: center">
                                You must <a href="{{ route('login') }}">login</a> to leave a comment.
                            </p>
                        @endauth
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="col-md-12 col-lg-4 sidebar">
                    {{-- Bio User --}}
                    <div class="sidebar-box p-4">
                        <div class="bio text-center">
                            <img src="{{ asset('assets/user_images/' . $user->image) }}"
                                 alt="{{ $user->name }}" class="img-fluid mb-3 rounded-circle">
                            <div class="bio-body">
                                <h2>{{ $user->name }}</h2>
                                <p class="mb-4">{{ $user->bio }}</p>
                                <p>
                                    <a href="#" class="btn btn-primary btn-sm rounded px-3 py-2">Read my bio</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Another Posts --}}
                    <div class="sidebar-box p-4">
                        <h3 class="heading">Another Posts</h3>
                        <div class="post-entry-sidebar">
                            <ul>
                                @foreach ($anotherPosts as $post)
                                    <li>
                                        <a href="{{ route('posts.single', $post->id) }}">
                                            <img src="{{ asset('assets/images/' . $post->image) }}"
                                                 alt="{{ $post->title }}" class="me-4 rounded">
                                            <div class="text">
                                                <h4>{{ Str::words($post->title, 20, ' ...') }}</h4>
                                                <div class="post-meta">
                                                    <span class="mr-2">
                                                        {{ \Carbon\Carbon::parse($post->created_at)->format('d M Y H:i') }}
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    {{-- Categories --}}
                    <div class="sidebar-box p-4">
                        <h3 class="heading">Categories</h3>
                        <ul class="categories">
                            @foreach($categories as $category)
                            <li>
                                <a href="#">
                                    {{ $category->name }} <span>{{ $category->total }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- More Posts --}}
    <section class="section posts-entry posts-entry-sm bg-light">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-uppercase text-black">More Blog Posts</div>
            </div>
            <div class="row">
                @foreach($morePosts as $post)
                    <div class="col-md-6 col-lg-3">
                        <div class="blog-entry">
                            <a href="{{ route('posts.single', $post->id) }}" class="img-link">
                                <img src="{{ asset('assets/images/' . $post->image) }}" alt="{{ $post->title }}"
                                     class="img-fluid">
                            </a>
                            <span class="date">{{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}</span>
                            <h2>
                                <a href="{{ route('posts.single', $post->id) }}">
                                    {{ Str::words($post->title, 20, ' ...') }}
                                </a>
                            </h2>
                            <p>{{ Str::words($post->description, 20, ' ...') }}</p>
                            <p>
                                <a href="{{ route('posts.single', $post->id) }}">Continue Reading</a>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection