@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="text-center mb-3">
            <p>Sign in with:</p>
            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-google"></i>
            </button>

            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-github"></i>
            </button>
        </div>

        <p class="text-center">or:</p>

        <div class="form-outline mb-4">
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{ old('email') }}" required autocomplete="email" autofocus/>
            <label class="form-label" for="email">{{ __('Email Address') }}</label>
            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>

        <div class="form-outline mb-4">
            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                   name="password" required autocomplete="current-password"/>
            <label class="form-label" for="password">{{ __('Password') }}</label>
            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>

        <div class="row mb-4">
            <div class="col-md-6 d-flex justify-content-center">
                <div class="form-check mb-3 mb-md-0">
                    <input class="form-check-input" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                </div>
            </div>

            <div class="col-md-6 d-flex justify-content-center">
                <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block mb-4">{{ __('Login') }}</button>

        <div class="text-center">
            <p>Not a member? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </form>
@endsection
