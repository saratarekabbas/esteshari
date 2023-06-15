@extends('layouts.physician_layout')

@section('content')
    <div class="container">

        <h3 class="form-title">My Revenue</h3>

        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            Please note that the session cost will not be released after the session has been completed unless you
            submit the post-session notes/assessment for the patient.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div class="card">
            <div class="card-body">
                <strong>Total Revenue:</strong> RM 675.22
            </div>
        </div>

        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Patient</th>
                <th scope="col">Session Date</th>
                <th scope="col">Session Time</th>
                <th scope="col">Session Cost</th>
                <th scope="col">Post-Session Assessment</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @if($schedules->isEmpty())
                <tr>
                    <td colspan="7">No scheduled or completed sessions with patients to display revenue.</td>
                </tr>
            @else
                @php($count = 1)
                @foreach($schedules as $schedule)
                    <tr>
                        <th scope="row">{{$count}}</th>
                        <td>{{$schedule->patient->name}}</td>
                        <td>{{ date('l, jS F Y', strtotime($schedule->slot_date)) }}</td>
                        <td>{{ substr($schedule->slot_time, 0, 5) }}</td>
                        <td>{{$schedule->currency}} {{$schedule->price}}</td>
                        {{--                        View a button to fill it up if not completed, otherwise a link to the submitted assessment if it exists--}}
                        <td><a href="#" style="text-decoration: none">Fill Post-Session Form</a></td>
                        {{--                        ONCE THE ASSESSMENT IS COMPLETED THEN RELEASE; OTHERWISE IT IS ON-HOLD--}}
                        {{--                        @if($schedule->status == "booked" && PSA is true)--}}
                        {{--                        <td>On-hold</td>--}}
                        {{--                            HENA CHECK BA2A KHALAS EL PSA WALA LA2A 3ASHAN YEGHAYAR EL STATUS MEN ON-HOLD L RELEASED--}}
                        {{--                        @elseif($schedule->status == "booked")--}}
                        {{--                        <span class="badge bg-primary mb-1">On-hold</span>--}}
                        {{--                            <span class="badge bg-success mb-1">Released</span>--}}
                        <td>
                            <span class="badge bg-primary mb-1">On-hold</span>
                        </td>
                        {{--                        @endif--}}
                    </tr>
                    @php($count++)
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
