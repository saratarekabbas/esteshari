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
{{--<div class="container-fluid">--}}
<div class="row header">
    <div class="col-lg-2 col-md-3">
        <div class="navbar-logo">
            <img src="{{ asset('assets/favicon.ico') }}" alt="Esteshari Logo" height="30">
            {{__('homepage.esteshari')}}
        </div>
    </div>
    <div class="col-lg-10 col-md-9">
        <ul>
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
            <li class="dropdown">
                <button href="#">Portfolio</button>
                <div class="dropdown-content">
                    <a href="#">View Portfolio</a>
                    <a href="#">Manage Portfolio</a>
                </div>
            </li>
            <li class="dropdown">
                <button href="#">Finances</button>
                <div class="dropdown-content">
                    <a href="#">View Revenue</a>{{--ANALYTICAL IF POSSIBLE; This week, all time, etc // GROSS INCOME--}}
                    <a href="#">Manage My Rate</a>{{--Manage Banking Details; Manage Session Costs; Add discount--}}
                </div>
            </li>
            <li class="dropdown">
                <button href="#">Reports</button>
                <div class="dropdown-content">
                    <a href="#">Patient Medical History Report</a>
                    <a href="#">Patient Pre-Session Questionnaire</a>
                </div>
            </li>
            <li style="float:right">
                <button class="active" href="#">Logout</button>
            </li>
        </ul>
    </div>
</div>

{{--    <div class="container-fluid">--}}

<div class="row-lg content">
    <div class="col-lg-12" style="padding: 30px">
        <h3 style="padding-bottom: 20px">Welcome, Dr XXX</h3>
        {{--                <div class="col-lg-8">Welcome Appointment schedule</div>--}}
        {{--                <div class="col-lg-4">schedule update</div>--}}
        <div class="card">
            {{--                    <div class="card-header">--}}
            {{--                        Featured--}}
            {{--                    </div>--}}
            <div class="card-body">
                <h5 class="card-title">My schedule for this week</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th scope="col">Slot</th>
                        <th scope="col">Mon</th>
                        <th scope="col">Tue</th>
                        <th scope="col">Wed</th>
                        <th scope="col">Thu</th>
                        <th scope="col">Fri</th>
                        <th scope="col">Sat</th>
                        <th scope="col">Sun</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">9:00-10:00 am</th>
                        <td>Available</td>
                        <td>Away</td>
                        <td>Booked</td>
                        <td>Booked</td>
                        <td>Available</td>
                        <td>Booked</td>
                        <td>Booked</td>
                    </tr>
                    <tr>
                        <th scope="row">10:00-11:00 am</th>
                        <td>Available</td>
                        <td>Away</td>
                        <td>Booked</td>
                        <td>Booked</td>
                        <td>Available</td>
                        <td>Booked</td>
                        <td>Booked</td>
                    </tr>
                    <tr>
                        <th scope="row">11:00-12:00 pm</th>
                        <td>Available</td>
                        <td>Away</td>
                        <td>Booked</td>
                        <td>Booked</td>
                        <td>Available</td>
                        <td>Booked</td>
                        <td>Booked</td>
                    </tr>
                    </tbody>
                </table>
                <a href="#" class="btn btn-primary">Update Schedule</a>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="col">
            apt 1
            @yield('content')
        </div>
        <div class="col">
            apt 1
        </div>
        <div class="col">
            apt 1
        </div>
    </div>
</div>
{{--    </div>--}}


<footer class="bg-light text-center text-lg-start">
    <!-- Footer content -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Esteshari, All Rights Reserved
    </div>
</footer>

{{--</div>--}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>
