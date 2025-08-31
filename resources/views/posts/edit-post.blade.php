@extends('layouts.app')

@section('content')
    <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form action="{{ route('posts.update', $post->id) }}" method="POST" class="p-4 shadow-sm bg-light rounded">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Post Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Post Description</label>
                    <textarea name="description" rows="6" class="form-control" required>{{ old('description', $post->description) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" name="category" class="form-control" value="{{ old('category', $post->category) }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Post</button>
                <a href="{{ route('posts.single', $post->id) }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection