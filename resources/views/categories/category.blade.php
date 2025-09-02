@extends('layouts.app')

@section('content')
<div class="section search-result-wrap">
    <div class="container">
        {{-- Category Heading --}}
        <div class="row mb-5">
            <div class="col-12">
                <div class="heading">Category: {{ ucfirst($name) }}</div>
            </div>
        </div>

        <div class="row posts-entry">
            {{-- Main Posts --}}
            <div class="col-lg-8">
                @forelse($posts as $post)
                    <div class="blog-entry d-flex blog-entry-search-item mb-4">
                        <a href="{{ route('posts.single', $post->id) }}" class="img-link me-4">
                            <img src="{{ asset('assets/images/' . $post->image) }}"
                                 alt="{{ $post->title }}" class="img-fluid rounded">
                        </a>
                        <div>
                            <span class="date">
                                {{ \Carbon\Carbon::parse($post->created_at)->format('d M Y H:i') }}
                                &bullet;
                                <a href="{{ route('category.single', $post->category) }}">{{ $post->category }}</a>
                            </span>
                            <h2>
                                <a href="{{ route('posts.single', $post->id) }}">
                                    {{ Str::words($post->title, 20, ' ...') }}
                                </a>
                            </h2>
                            <p>{{ Str::words($post->description, 20, ' ...') }}</p>
                            <p>
                                <a href="{{ route('posts.single', $post->id) }}"
                                   class="btn btn-sm btn-outline-primary">Read More</a>
                            </p>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">No posts found in this category.</p>
                @endforelse
            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4 sidebar">
                {{-- Another Posts --}}
                <div class="sidebar-box p-4 mb-4">
                    <h3 class="heading">Another Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            @foreach ($anotherPosts as $another)
                                <li>
                                    <a href="{{ route('posts.single', $another->id) }}">
                                        <img src="{{ asset('assets/images/' . $another->image) }}"
                                             alt="{{ $another->title }}" class="me-3 rounded">
                                        <div class="text">
                                            <h4>{{ Str::words($another->title, 15, ' ...') }}</h4>
                                            <div class="post-meta">
                                                <span class="mr-2">
                                                    {{ \Carbon\Carbon::parse($another->created_at)->format('d M Y') }}
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
                                <a href="{{ route('category.single', $category->name) }}">
                                    {{ $category->name }}
                                    <span>{{ $category->total }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
