@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="comment-form-wrap bg-white p-5 shadow-sm rounded">
                    <h3 class="mb-4">Edit Blog Post</h3>
                    <form action="{{ route('posts.update', $post->id) }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="title" class="form-label">Post Title</label>
                            <input type="text" name="title" id="title" class="form-control" 
                                value="{{ old('title', $post->title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="category" id="category" class="form-select" required>
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->name }}" 
                                        {{ old('category', $post->category) == $category->name ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Post Description</label>
                            <textarea name="description" id="description" rows="6" 
                                    class="form-control" required>{{ old('description', $post->description) }}</textarea>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Update Post</button>
                            <a href="{{ route('posts.single', $post->id) }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection