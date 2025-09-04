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

    {{-- Danger Alert --}}
    @if(Session::has('danger'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get('danger') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>

<div class="row">
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title mb-4"><b>Posts</b></h5>

                <table class="table table-striped table-bordered table-hover align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Author</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $post->title }}</td>
                                <td class="text-center">
                                    @if($post->image)
                                        <img src="{{ asset('assets/images/'.$post->image) }}" 
                                             alt="Post Image" 
                                             class="img-thumbnail" 
                                             style="max-width: 80px; height: auto;">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>{{ Str::limit($post->description, 50) }}</td>
                                <td class="text-center">{{ $post->category ?? '-' }}</td>
                                <td class="text-center">{{ $post->user_name ?? '-' }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="{{ route('posts.delete', $post->id) }}" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Are you sure want to delete this post?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">No posts available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
@endsection