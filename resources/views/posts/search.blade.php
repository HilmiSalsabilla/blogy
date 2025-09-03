@extends('layouts.app')

@section('content')
<div class="section search-result-wrap">
    <div class="container">
        <div class="row posts-entry">
            {{-- Main Posts --}}
            <div class="col-lg-12">
                @forelse($results as $post)
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
                    <p class="alert alert-danger text-center">No posts found with your input in database.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
