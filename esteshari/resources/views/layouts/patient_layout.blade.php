<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--    JQUERY--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Include jQuery datetimepicker CSS -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"
          integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- Include jQuery datetimepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"
            integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{--    bootstrap--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    {{--    Full Calendar--}}
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <title>Patient</title>
</head>
<body>
<div class="row header">
    <div class="col-lg-2 col-md-3">
        <a href="{{route('patient.dashboard')}}" style="text-decoration: none">
            <div class="navbar-logo">
                <img src="{{ asset('assets/favicon.ico') }}" alt="Esteshari Logo" height="30">
                {{__('homepage.esteshari')}}
            </div>
        </a>
    </div>
    <div class="col-lg-10 col-md-9">
        <ul>
            <li class="dropdown">
                <button href="">{{__('layout.SearchPhysician')}}</button>
                <div class="dropdown-content">
                    <a href="{{route('patient.physicians_list.view')}}">{{__('layout.ViewPhysiciansList')}}</a>
                </div>
            </li>
            <li class="dropdown">
                <button href="">{{__('layout.MedicalHistory')}}</button>
                <div class="dropdown-content">
                    <a href="#">{{__('layout.ManageMyMedicalHistory')}}</a>
                </div>
            </li>
            <li class="dropdown">
                <button href="">{{__('layout.MyAppointments')}}</button>
                <div class="dropdown-content">
                    <a href="{{route('patient.upcoming_appointments')}}">{{__('layout.UpcomingAppointments')}}</a>
                    <a href="{{route('patient.appointments_history')}}">{{__('layout.AppointmentsHistory')}}</a>
                </div>
            </li>
            <li class="dropdown" style="float:right">
                <div class="dropdown-button" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }} <i class="fa fa-angle-down"></i>
                </div>

                <div class="dropdown-menu dropdown-menu-end custom-dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                        {{__('layout.English')}}
                    </a>
                    <a class="dropdown-item" href="{{LaravelLocalization::getLocalizedURL('ms', null, [], true) }}">
                        {{__('layout.Malay')}}
                    </a>
                    <a class="dropdown-item" href="{{LaravelLocalization::getLocalizedURL('zh', null, [], true) }}">
                        {{__('layout.Chinese')}}
                    </a>
                    <a class="dropdown-item" href="{{LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                        {{__('layout.Arabic')}}
                    </a>
                    <hr>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{__('layout.Logout')}}
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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- Display any errors/success messages --}}
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<footer class="bg-light text-center text-lg-start">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        {{__('homepage.copyrights')}}
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>
