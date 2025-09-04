@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    {{-- Success Alert --}}
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Error Alert --}}
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title mb-4"><b>Edit Post</b></h5>

                <form action="{{ route('posts.update', $posts->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Title --}}
                    <div class="mb-3">
                        <label for="title" class="form-label"><b>Title</b></label>
                        <input type="text" name="title" id="title" 
                               class="form-control @error('title') is-invalid @enderror" 
                               value="{{ old('title', $posts->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label for="description" class="form-label"><b>Description</b></label>
                        <textarea name="description" id="description" rows="4"
                                  class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $posts->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Category --}}
                    <div class="mb-3">
                        <label for="category" class="form-label"><b>Category</b></label>
                        <select name="category" id="category" 
                                class="form-select @error('category') is-invalid @enderror" required>
                            <option value="" disabled selected>-- Select Category --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->name }}" 
                                    {{ old('category', $posts->category) == $cat->name ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Username --}}
                    <div class="mb-3">
                        <label for="user_name" class="form-label"><b>Username</b></label>
                        <input type="text" name="user_name" id="user_name" 
                               class="form-control @error('user_name') is-invalid @enderror" 
                               value="{{ old('user_name', $posts->user_name) }}">
                        @error('user_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Image --}}
                    <div class="mb-3">
                        <label for="image" class="form-label"><b>Image</b></label>
                        <div class="mb-2">
                            @if($posts->image)
                                <img src="{{ asset('assets/images/'.$posts->image) }}" 
                                     alt="Current Image" 
                                     class="img-thumbnail" 
                                     style="max-width: 120px; height:auto;">
                            @else
                                <span class="text-muted">No image uploaded</span>
                            @endif
                        </div>
                        <input type="file" name="image" id="image" 
                               class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('posts.all') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Update Post
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
