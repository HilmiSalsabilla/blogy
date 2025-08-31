@extends('layouts.app')

@section('content')
    {{-- Form Section --}}
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                {{-- <div class="col-md-10 col-lg-8"> --}}
                    {{-- Flash Message --}}
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="flash-message">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <div class="comment-form-wrap bg-white p-5 shadow-sm rounded">
                        <h3 class="mb-4">Create New Blog Post</h3>

                        {{-- Form Create Post --}}
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- Hidden User Info --}}
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">

                            {{-- Title --}}
                            <div class="form-group mb-3">
                                <label for="title">Post Title</label>
                                <input type="text" 
                                       class="form-control @error('title') is-invalid @enderror" 
                                       id="title" name="title" 
                                       value="{{ old('title') }}" 
                                       placeholder="Enter post title" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Category --}}
                            <div class="form-group mb-3">
                                <label for="category">Category</label>
                                <select class="form-control @error('category') is-invalid @enderror" 
                                        id="category" name="category" required>
                                    <option value="">-- Choose Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->name }}"
                                            {{ old('category') == $category->name ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Image --}}
                            <div class="form-group mb-3">
                                <label for="image">Post Image</label>
                                <input type="file" 
                                       class="form-control @error('image') is-invalid @enderror" 
                                       id="image" name="image" accept="image/*">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Description --}}
                            <div class="form-group mb-3">
                                <label for="description">Content</label>
                                <textarea name="description" id="description" 
                                          cols="30" rows="8" 
                                          class="form-control @error('description') is-invalid @enderror"
                                          placeholder="Write your content here..." required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Submit --}}
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary px-4 py-2">Publish Post</button>
                                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary px-4 py-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                {{-- </div> --}}
            </div>
        </div>
    </section>
@endsection
