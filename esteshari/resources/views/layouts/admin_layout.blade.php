<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css"
        integrity="sha512-FcdSL2q1UZyfJxwQ1oFYZrYpA/f+Xv32RD34VhFGWjt5X4C0agC2HvlB+3IUtWzQsByc9V02AZXUbc3KAVv95g=="
        crossorigin="anonymous"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <title>Admin</title>
</head>
<body>
<div class="row header">
    <div class="col-lg-2 col-md-3">
        <a href="{{route('admin.dashboard')}}" style="text-decoration: none">
        <div class="navbar-logo">
            <img src="{{ asset('assets/favicon.ico') }}" alt="Esteshari Logo" height="30">
            {{__('homepage.esteshari')}}
        </div>
        </a>
    </div>
    <div class="col-lg-10 col-md-9">
        <ul>
            <li class="dropdown">
                <button href="#">Physician Registration Applications</button>
                <div class="dropdown-content">
                    <a href="{{ route('administrator.registration.index')}}">View Pending Requests</a>
                    <a href="{{ route('administrator.registration.indexAll')}}">View All Physician Registration Applications</a>
                </div>
            </li>
            <li class="dropdown">
                <button href="#">Physicians</button>
                <div class="dropdown-content">
                    <a href="{{ route('administrator.indexAllPhysicians')}}">View Physicians List</a>
                </div>
            </li>
            <li class="dropdown">
                <button href="#">Patients</button>
                <div class="dropdown-content">
                    <a href="{{ route('administrator.indexAllPatients')}}">View Patients List</a>
                </div>
            </li>

            <li class="dropdown" style="float:right">
                <div class="dropdown-button" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }} <i class="fa fa-angle-down"></i>
                </div>

                <div class="dropdown-menu dropdown-menu-end custom-dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>

        </ul>
    </div>
</div>

<div class="row-lg content">
    @yield('content')
</div>

<footer class="bg-light text-center text-lg-start">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Esteshari, All Rights Reserved
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"
    integrity="sha512-jJrECcYrQpPcAXvl+92wCAjfqZpEsV/mK2+FcP8w6Q6XK6OYt3GpBd8UEG8dFtsXQZNL+02bGm8VwKwYVt0FbA=="
    crossorigin="anonymous"
></script>
</body>
</html>
