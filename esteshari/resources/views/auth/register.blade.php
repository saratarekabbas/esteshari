{{--@extends('layouts.app')--}}

{{--@section('content')--}}

{{--    <div id="register-content" class="tab-pane fade" role="tabpanel" aria-labelledby="tab-register">--}}
{{--        <form method="POST" action="{{ route('register') }}">--}}
{{--            @csrf--}}
{{--            <div class="text-center mb-3">--}}
{{--                <p>Sign up with:</p>--}}
{{--                <a href="{{ url('redirect/facebook') }}" class="btn btn-link btn-floating mx-1">--}}
{{--                    <i class="fab fa-facebook-f"></i>--}}
{{--                </a>--}}

{{--                <button type="button" class="btn btn-link btn-floating mx-1">--}}
{{--                    <i class="fab fa-google"></i>--}}
{{--                </button>--}}

{{--                <button type="button" class="btn btn-link btn-floating mx-1">--}}
{{--                    <i class="fab fa-twitter"></i>--}}
{{--                </button>--}}

{{--                <button type="button" class="btn btn-link btn-floating mx-1">--}}
{{--                    <i class="fab fa-github"></i>--}}
{{--                </button>--}}
{{--            </div>--}}

{{--            <p class="text-center">or:</p>--}}

{{--            <!-- Name input -->--}}
{{--            <div class="form-outline mb-4">--}}
{{--                <input type="text" id="registerName" class="form-control  @error('name') is-invalid @enderror"--}}
{{--                       name="name"--}}
{{--                       value="{{ old('name') }}" required autocomplete="name" autofocus>--}}
{{--                @error('name')--}}
{{--                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                @enderror--}}
{{--                <label class="form-label" for="name">{{ __('Name') }}</label>--}}
{{--            </div>--}}


{{--            <!-- Email input -->--}}
{{--            <div class="form-outline mb-4">--}}
{{--                <input type="email" id="registerEmail" class="form-control  @error('email') is-invalid @enderror" name="email"--}}
{{--                       value="{{ old('email') }}" required autocomplete="email">--}}
{{--                @error('email')--}}
{{--                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                @enderror--}}
{{--                <label class="form-label" for="email">{{ __('Email Address') }}</label>--}}
{{--            </div>--}}


{{--            <!-- Phone Number input -->--}}
{{--            <div class="form-outline mb-4">--}}
{{--                <input type="text" id="registerUsername" class="form-control @error('mobile') is-invalid @enderror" name="mobile"--}}
{{--                       value="{{ old('mobile') }}" required>--}}
{{--                @error('mobile')--}}
{{--                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                @enderror--}}
{{--                <label class="form-label" for="mobile">{{ __('Mobile') }}</label>--}}
{{--            </div>--}}


{{--            <!-- Password input -->--}}
{{--            <div class="form-outline mb-4">--}}
{{--                <input type="password" id="registerPassword" class="form-control @error('password') is-invalid @enderror"--}}
{{--                       name="password" required autocomplete="new-password">--}}

{{--                @error('password')--}}
{{--                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                @enderror--}}
{{--                <label class="form-label" for="registerPassword">{{ __('Password') }}</label>--}}
{{--            </div>--}}

{{--            <!-- Confirm Password input -->--}}
{{--            <div class="form-outline mb-4">--}}
{{--                <input type="password" id="registerRepeatPassword" class="form-control" name="password_confirmation" required--}}
{{--                       autocomplete="new-password">--}}
{{--                <label class="form-label" for="registerRepeatPassword">{{ __('Confirm Password') }}</label>--}}
{{--            </div>--}}
{{--            <!-- Submit button -->--}}
{{--            <button type="submit" class="btn btn-primary btn-block mb-3"> {{ __('Register') }}</button>--}}
{{--        </form>--}}
{{--    </div>--}}

{{--@endsection--}}
