@extends('layouts.app')

@section('content')
<div class="section sec-login">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">

                <div class="comment-form-wrap bg-white p-5 shadow-sm rounded">
                    <h3 class="mb-4 text-center"><strong>Login to Blogy</strong></h3>

                    <form action="{{ route('login') }}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <!-- Email -->
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   name="password" required>
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>

                        <!-- Submit -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary py-2">Login</button>
                        </div>

                        <!-- Extra Links -->
                        <div class="text-center">
                            @if (Route::has('register'))
                                <p class="mb-1">Don't have an account? 
                                    <a href="{{ route('register') }}" class="text-primary">Register</a>
                                </p>
                            @endif
                            {{-- 
                            @if (Route::has('password.request'))
                                <p>
                                    <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                                </p>
                            @endif
                            --}}
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
