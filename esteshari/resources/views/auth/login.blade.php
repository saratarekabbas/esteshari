@extends('layouts.app')

@section('content')

    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="text-center mb-3">
                <p>Sign in with:</p>
                <a href="{{ url('redirect/facebook') }}" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                </a>

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

            <!-- Email/Phone Number input -->
            <div class="form-outline mb-4">
                <input type="text" id="loginName" class="form-control @error('identify') is-invalid @enderror"
                       name="identify"
                       value="{{ old('identify') }}" required autofocus>
                @error('identify')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <label class="form-label" for="identify">{{ __('Email Address or Phone Number') }}</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="loginPassword"
                       class="form-control @error('password') is-invalid @enderror" name="password"
                       required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <label class="form-label" for="password">{{ __('Password') }}</label>
            </div>


            <!-- 2 column grid layout -->
            <div class="row mb-4">
                <div class="col-md-6 d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check mb-3 mb-md-0">
                        <input class="form-check-input" type="checkbox" name="remember"
                               id="loginCheck" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">  {{ __('Remember Me') }} </label>
                    </div>
                </div>


                @if (Route::has('password.request'))

                    <div class="col-md-6 d-flex justify-content-center">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                @endif

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">{{ __('Login') }}</button>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Not a member? <a href="{{ route('register') }}">Register</a></p>
                </div>
            </div>

    </form>
    </div>

@endsection
