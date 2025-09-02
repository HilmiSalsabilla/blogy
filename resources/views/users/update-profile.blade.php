@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="comment-form-wrap bg-white p-5 shadow-sm rounded">
                    <h3 class="mb-4">Update Profile</h3>
                    <form action="{{ route('users.save', $user->id) }}" method="POST">
                        @csrf
                        
                        {{-- Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" 
                                value="{{ old('name', $user->name) }}" required>
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" 
                                value="{{ old('email', $user->email) }}" required>
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Password Confirmation --}}
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>

                        {{-- Bio --}}
                        <div class="mb-3">
                            <label for="bio" class="form-label">Profile bio</label>
                            <textarea name="bio" id="bio" rows="6" 
                                    class="form-control">{{ old('bio', $user->bio) }}</textarea>
                            @error('bio') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Submit --}}
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                            <a href="{{ route('posts.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection