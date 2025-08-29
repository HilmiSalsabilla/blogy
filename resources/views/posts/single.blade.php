@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <div class="site-cover site-cover-sm same-height overlay single-page"
         style="background-image: url('{{ asset('assets/images/' . $single->image) }}'); margin-top:-25px">
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

                    <div class="pt-5">
                        <p>Categories: <a href="#">{{ $single->category }}</a></p>
                    </div>

                    {{-- Comments --}}
                    <div class="pt-5 comment-wrap">
                        <h3 class="mb-5 heading">6 Comments</h3>
                        <ul class="comment-list">
                            <li class="comment">
                                <div class="vcard">
                                    <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>Jean Doe</h3>
                                    <div class="meta">January 9, 2018 at 2:21pm</div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure!
                                        Quam voluptas earum impedit necessitatibus, nihil?
                                    </p>
                                    <p><a href="#" class="reply rounded">Reply</a></p>
                                </div>
                            </li>
                        </ul>

                        {{-- Comment Form --}}
                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Leave a comment</h3>
                            <form action="#" class="p-5 bg-light">
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" class="form-control" id="website">
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
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
                                                <h4>{{ \Illuminate\Support\Str::words($post->title, 20, ' ...') }}</h4>
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
                                    {{ \Illuminate\Support\Str::words($post->title, 20, ' ...') }}
                                </a>
                            </h2>
                            <p>{{ \Illuminate\Support\Str::words($post->description, 20, ' ...') }}</p>
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