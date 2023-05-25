<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <title>Physician</title>
</head>
<body>
<div class="container-fluid">
    <div class="row header">
        <div class="col-lg-2 col-md-3">
            <div class="navbar-logo">
                <img src="{{ asset('assets/favicon.ico') }}" alt="Esteshari Logo" height="30">
                {{__('homepage.esteshari')}}
            </div>
        </div>
        <div class="col-lg-10 col-md-9">
            <ul>
                <li><button href="#">Schedule</button></li>
                <li><button href="#">Appointments</button></li>
                <li><button href="#">Patients</button></li>
                <li><button href="#">Portfolio</button></li>
                <li><button href="#">Finances</button></li>
                <li><button href="#">Reports</button></li>
                <li style="float:right">
                    <button class="active" href="#">Logout</button>
                </li>
            </ul>
        </div>
        {{--        <div class="menu col-md col-lg-8">--}}
        {{--            <div class="navbar">--}}
                        <div class="col-sm dropdown">
                            <button class="dropbtn">Schedule
                            </button>
                            <div class="dropdown-content">
                                <a href="#">View Schedule</a>
                                <a href="#">Manage Schedule</a>
                            </div>
                        </div>
        {{--                <div class="col-sm dropdown">--}}
        {{--                    <button class="dropbtn">Appointments--}}
        {{--                        <i class="fa fa-caret-down"></i>--}}
        {{--                    </button>--}}
        {{--                    <div class="dropdown-content">--}}
        {{--                        <a href="#">Pending Appointments</a>--}}
        {{--                        <a href="#">Upcoming Appointments</a>--}}
        {{--                        <a href="#">Cancelled Appointments</a>--}}
        {{--                        <a href="#">Appointments History</a>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="col-sm dropdown">--}}
        {{--                    <button class="dropbtn">Patients--}}
        {{--                        <i class="fa fa-caret-down"></i>--}}
        {{--                    </button>--}}
        {{--                    <div class="dropdown-content">--}}
        {{--                        <a href="#">View My Patients List</a> --}}{{--MEDICAL HISTORY--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="col-sm dropdown">--}}
        {{--                    <button class="dropbtn">Portfolio--}}
        {{--                        <i class="fa fa-caret-down"></i>--}}
        {{--                    </button>--}}
        {{--                    <div class="dropdown-content">--}}
        {{--                        <a href="#">View Portfolio</a>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="col-sm dropdown">--}}
        {{--                    <button class="dropbtn">Finances--}}
        {{--                        <i class="fa fa-caret-down"></i>--}}
        {{--                    </button>--}}
        {{--                    <div class="dropdown-content">--}}
        {{--                        <a href="#">View--}}
        {{--                            Revenue</a> --}}{{--ANALYTICAL IF POSSIBLE; This week, all time, etc // GROSS INCOME--}}
        {{--                        <a href="#">Manage Rates</a> --}}{{--Manage Banking Details; Manage Session Costs; Add discount--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="col-sm dropdown">--}}
        {{--                    <button class="dropbtn">Reports--}}
        {{--                        <i class="fa fa-caret-down"></i>--}}
        {{--                    </button>--}}
        {{--                    <div class="dropdown-content">--}}
        {{--                        <a href="#">Patient Medical History Report</a>--}}
        {{--                        <a href="#">Patient Pre-Session Questionnaire</a>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <div class="col-md col-lg-2">profile img & logout</div>--}}
        {{--    </div>--}}
    </div>

    <div class="container-lg">
        {{--    @yield('content')--}}
        <div class="row-lg content">
            <div class="row">
                <div class="col-lg-8">Welcome Appointment schedule</div>
                <div class="col-lg-4">schedule update</div>
            </div>
            <div class="row">
                <div class="col">
                    apt 1
                </div>
                <div class="col">
                    apt 1
                </div>
                <div class="col">
                    apt 1
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="col">
            Footer
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
</body>
</html>
