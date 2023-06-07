@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="text-center mb-3">
            <p>Sign up with:</p>
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
            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                   value="{{ old('name') }}" required autocomplete="name" autofocus>
            <label class="form-label" for="name">{{ __('Name') }}</label>

            @error('name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>

        <div class="form-outline mb-4">
            <select id="role" class="form-select @error('role') is-invalid @enderror"
                    name="role" value="{{ old('role') }}" required autocomplete="role">
                <option value="patient">Patient</option>
                <option value="physician">Physician</option>
            </select>

            @error('role')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="role" class="form-label">{{ __('Role') }}</label>
        </div>


        <div class="form-outline mb-4">
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{ old('email') }}" required autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror

            <label class="form-label" for="email">{{ __('Email Address') }}</label>

        </div>

        <div class="form-outline mb-4">
            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                   name="password"
                   required autocomplete="new-password">
            <label class="form-label" for="password">{{ __('Password') }}</label>
        </div>

        <div class="form-outline mb-4">
            <input type="password" id="password-confirm" class="form-control "
                   name="password_confirmation" required autocomplete="new-password">
            <label class="form-label" for="password-confirm">{{ __('Confirm Password') }}</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block mb-3">{{ __('Register') }}</button>
        <div class="text-center">
            <p>Already a member? <a href="{{ route('login') }}">Login</a></p>
        </div>

    </form>
@endsection
