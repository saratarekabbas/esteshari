@extends('layouts.physician_layout')

@section('content')
    <div class="col-lg-12" style="padding: 30px">
        <h3 style="padding-bottom: 20px">Welcome, Dr. {{ Auth::user()->name }}</h3>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">My schedule</h5>
                <p class="card-text">This is your schedule for this week.</p>
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
                <a href="{{route('physician.schedule.view')}}" class="btn btn-primary">Update Schedule</a>
            </div>
        </div>
    </div>
@endsection
