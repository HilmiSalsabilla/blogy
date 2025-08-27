@extends('layouts.app')

@section('content')
<div class="section sec-register">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">

                <div class="comment-form-wrap bg-white p-5 shadow-sm rounded">
                    <h3 class="mb-4 text-center"><strong>Create an Account</strong></h3>

                    <form action="{{ route('register') }}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <!-- Name -->
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input 
                                id="name" 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                name="name" 
                                value="{{ old('name') }}" 
                                required 
                                autofocus>
                            @error('name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input 
                                id="email" 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required>
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input 
                                id="password" 
                                type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                name="password" 
                                required 
                                autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group mb-4">
                            <label for="password-confirm" class="form-label">Confirm Password</label>
                            <input 
                                id="password-confirm" 
                                type="password" 
                                class="form-control" 
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password">
                        </div>

                        <!-- Submit -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary py-2">Register</button>
                        </div>

                        <!-- Extra Link -->
                        <div class="text-center">
                            @if (Route::has('login'))
                                <p class="mb-0">
                                    Already have an account? 
                                    <a href="{{ route('login') }}" class="text-primary">Login here</a>
                                </p>
                            @endif
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
