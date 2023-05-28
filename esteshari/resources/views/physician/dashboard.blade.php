<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
</head>
<body>
{{--NEW LARAVEL PHP DAHSBOARD CONTENT:--}}
@extends('layouts.physician_layout')

@section('content')
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
@endsection

{{--END OF NEW LARAVEL PHP DAHSBOARD CONTENT:--}}

{{--ORIGINAL LARAVEL PHP DASHBOARD: --}}
{{--@extends('layouts.app')--}}

{{--@section('content')--}}

{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">{{ ucfirst(Auth::user()->role) }} Dashboard</div>--}}

{{--                    <div class="card-body">--}}
{{--                        Welcome to your {{ Auth::user()->role }} dashboard, {{ Auth::user()->name }}!--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

</body>
</html>
