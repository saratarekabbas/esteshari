<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <title>Physician</title>
</head>
<body>
<div class="row header">
    <div class="col-lg-2 col-md-3">
        <a href="{{route('physician.dashboard')}}" style="text-decoration: none">
            <div class="navbar-logo">
                <img src="{{ asset('assets/favicon.ico') }}" alt="Esteshari Logo" height="30">
                {{__('homepage.esteshari')}}
            </div>
        </a>
    </div>
    <div class="col-lg-10 col-md-9">
        <ul>
            <li class="dropdown">
                <button href="#">Portfolio</button>
                <div class="dropdown-content">
                    <a href="#">View Portfolio</a>
                    <a href="#">Manage Portfolio</a>
                </div>
            </li>
            <li class="dropdown">
                <button href="#">Schedule</button>
                <div class="dropdown-content">
                    <a href="#">View Schedule</a>
                    <a href="#">Manage Schedule</a>
                </div>
            </li>
            <li class="dropdown">
                <button href="#">Appointments</button>
                <div class="dropdown-content">
                    <a href="#">Pending Appointments</a>
                    <a href="#">Upcoming Appointments</a>
                    <a href="#">Cancelled Appointments</a>
                    <a href="#">Appointments History</a>
                </div>
            </li>
            <li class="dropdown">
                <button href="#">Patients</button>
                <div class="dropdown-content">
                    <a href="#">View Patients List</a>
                </div>
            </li>
{{--            <li class="dropdown">--}}
{{--                <button href="#">Finances</button>--}}
{{--                <div class="dropdown-content">--}}
{{--                    <a href="#">View Revenue</a>--}}{{--ANALYTICAL IF POSSIBLE; This week, all time, etc // GROSS INCOME--}}
{{--                    <a href="#">Manage My Rate</a>--}}{{--Manage Banking Details; Manage Session Costs; Add discount--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="dropdown">--}}
{{--                <button href="#">Reports</button>--}}
{{--                <div class="dropdown-content">--}}
{{--                    <a href="#">Patient Medical History Report</a>--}}
{{--                    <a href="#">Patient Pre-Session Questionnaire</a>--}}
{{--                </div>--}}
{{--            </li>--}}
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
</body>
</html>
