<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Esteshari _ Register</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- MDB CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
          integrity="sha512-VJ9Y9mPeU1yRvJikUPmKj7mHJuz+nlwCQ1jijMq3JXoe54O/pNVk7vO+cWq3qZtACJZtjF7RBO/mW5p5rLrj9w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">

</head>
<body>
<div id="app">
    <section class="background-radial-gradient overflow-hidden">
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-start mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <div style="display: inline-block; margin-top: 40px;">
                        <div class="logo">
                            <img src="{{ asset('assets/favicon.ico') }}" alt="Esteshari Logo">
                        </div>
                        <div class="site-name">Esteshari</div>
                    </div>
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        Revolutionize your <br/>
                        <span style="color: hsl(218, 81%, 75%)">medical care</span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                        Connect with verified and skilled physicians from different specialties, get the consultation
                        you need from the comfort of your own home through our affordable online video conference
                        meeting
                        service. Browse through physicians' portfolios, ratings, and book a session with the physician
                        of your choice. We aim to provide you with the best experience and professional opinion you are
                        looking for.
                    </p>
                </div>


                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <!-- Pills navs -->
                            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="tab-login" data-toggle="pill" href="#pills-login"
                                       role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                                </li>
                                <li class="nav-item" role="presentation">

                                    <a class="nav-link" id="tab-register" data-toggle="pill" href="#pills-register"
                                       role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <!-- Pills navs -->

                            <!-- Pills content -->
                            <div class="tab-content">
                                {{--                                @yield('content')--}}

                                <div class="tab-pane fade show active" id="pills-login" role="tabpanel"
                                     aria-labelledby="tab-login">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="text-center mb-3">
                                            <p>Sign in with:</p>
                                            <a href="{{ url('redirect/facebook') }}"
                                               class="btn btn-link btn-floating mx-1">
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
                                            <input type="text" id="loginName"
                                                   class="form-control @error('identify') is-invalid @enderror"
                                                   value="{{ old('identify') }}" required autofocus>
                                            @error('identify')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                            <label class="form-label"
                                                   for="identify">{{ __('Email Address or Phone Number') }}</label>
                                        </div>

                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <input type="password" id="loginPassword"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password"
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
                                                    <label class="form-check-label"
                                                           for="remember">  {{ __('Remember Me') }} </label>
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
                                            <button type="submit"
                                                    class="btn btn-primary btn-block mb-4">{{ __('Login') }}</button>

                                            <!-- Register buttons -->
                                            <div class="text-center">
                                                <p>Not a member? <a href="{{ route('register') }}">Register</a></p>
                                            </div>
                                        </div>

                                    </form>
                                </div>


                                <div class="tab-pane fade" id="pills-register" role="tabpanel"
                                     aria-labelledby="tab-register">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="text-center mb-3">
                                            <p>Sign up with:</p>
                                            <a href="{{ url('redirect/facebook') }}"
                                               class="btn btn-link btn-floating mx-1">
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

                                        <!-- Name input -->
                                        <div class="form-outline mb-4">
                                            <input type="text" id="registerName"
                                                   class="form-control  @error('name') is-invalid @enderror"
                                                   name="name"
                                                   value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                            <label class="form-label" for="name">{{ __('Name') }}</label>
                                        </div>


                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <input type="email" id="registerEmail"
                                                   class="form-control  @error('email') is-invalid @enderror"
                                                   name="email"
                                                   value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                            <label class="form-label" for="email">{{ __('Email Address') }}</label>
                                        </div>


                                        <!-- Phone Number input -->
                                        <div class="form-outline mb-4">
                                            <input type="text" id="registerUsername"
                                                   class="form-control @error('mobile') is-invalid @enderror"
                                                   name="mobile"
                                                   value="{{ old('mobile') }}" required>
                                            @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                            <label class="form-label" for="mobile">{{ __('Mobile') }}</label>
                                        </div>


                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <input type="password" id="registerPassword"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                            <label class="form-label"
                                                   for="registerPassword">{{ __('Password') }}</label>
                                        </div>

                                        <!-- Confirm Password input -->
                                        <div class="form-outline mb-4">
                                            <input type="password" id="registerRepeatPassword" class="form-control"
                                                   name="password_confirmation" required
                                                   autocomplete="new-password">
                                            <label class="form-label"
                                                   for="registerRepeatPassword">{{ __('Confirm Password') }}</label>
                                        </div>
                                        <!-- Submit button -->
                                        <button type="submit"
                                                class="btn btn-primary btn-block mb-3"> {{ __('Register') }}</button>
                                    </form>
                                </div>


                            </div>

                            <!-- Pills content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Section: Design Block -->

<!-- Footer-->
<footer class="bg-light py-5">
    <div class="container px-4 px-lg-5">
        <div class="small text-center text-muted">{{__('homepage.copyrights')}}</div>
    </div>
</footer>

<!-- MDB JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
        integrity="sha512-+ckxRJf5W5rj+XNszgIhDXEEvF1Jz/1QVvkjGWZxP7VavB/PLSExhTbTZeTzLZXj+xHDCrl6h4AioIX0J6km4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>

{{--    <!-- MDBootstrap JS -->--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

<script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
