@extends('layouts.app')

@section('content')
    <form>
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

        <!-- Name input -->
        <div class="form-outline mb-4">
            <input type="text" id="registerName" class="form-control"/>
            <label class="form-label" for="registerName">Name</label>
        </div>

        <!-- Username input -->
        <div class="form-outline mb-4">
            <input type="text" id="registerUsername" class="form-control"/>
            <label class="form-label" for="registerUsername">Username</label>
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="registerEmail" class="form-control"/>
            <label class="form-label" for="registerEmail">Email</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="registerPassword" class="form-control"/>
            <label class="form-label" for="registerPassword">Password</label>
        </div>

        <!-- Repeat Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="registerRepeatPassword" class="form-control"/>
            <label class="form-label" for="registerRepeatPassword">Confirm
                password</label>
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-3">Sign in</button>
    </form>
@endsection
