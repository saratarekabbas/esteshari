@extends('layouts.physician_layout')

@section('content')
    <div class="container">
        <h3 class="form-title">Upcoming Appointments</h3>
        @if($appointments->isEmpty())
            <div class="card">
                <div class="card-header">
                    Upcoming Appointments
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">You have no upcoming appointments.</li>
                </ul>
            </div>
        @else
        @foreach($appointments as $appointment)
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{asset('assets/profile_dr_2.jpg')}}" class="card-img img-fluid rounded-start"
                             style="object-fit: cover; max-height: 150px">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Video Conference Meeting with <a href="#"
                                                                                    style="text-decoration: none">
                                    {{$appointment->patient->name}}
                                </a></h5>
                            <p class="card-text">{{ date('l, jS F Y', strtotime($appointment->slot_date)) }}, {{ substr($appointment->slot_time, 0, 5) }}.</p>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{$appointment->meeting_link}}" target="_blank" type="button" class="btn btn-outline-primary">Join Meeting</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
            @endif
    </div>
@endsection
