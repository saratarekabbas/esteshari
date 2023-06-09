@extends('layouts.patient_layout')

@section('content')
    <div class="container">
        <h3 class="form-title">Upcoming Appointments</h3>
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
                                    Dr {{$appointment->user->name}}
                                </a></h5>
                            <p class="card-text">{{ date('l, jS F Y', strtotime($appointment->slot_date)) }}, {{ substr($appointment->slot_time, 0, 5) }}.</p>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-outline-primary">Join Meeting</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection
