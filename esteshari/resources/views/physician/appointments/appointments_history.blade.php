@extends('layouts.physician_layout')

@section('content')
    <div class="container">
        <h3 class="form-title">Appointments History</h3>
        @if($appointments->isEmpty())
            <div class="card">
                <div class="card-header">
                    Appointments History
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">No appointments exist.</li>
                </ul>
            </div>
        @else
            @foreach($appointments as $appointment)
                @if($appointment->patient)
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{asset('assets/patient.webp')}}" class="card-img img-fluid rounded-start"
                                     style="object-fit: cover; max-height: 150px">
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Video Conference Meeting with <a href="#"
                                                                                            style="text-decoration: none">{{$appointment->patient->name}} </a>
                                    </h5>
                                    <p class="card-text">{{ date('l, jS F Y', strtotime($appointment->slot_date)) }}
                                        , {{ substr($appointment->slot_time, 0, 5) }}.</p>
                                    @if($appointment->status == 'booked')

                                        <span class="badge bg-primary">Upcoming</span>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <a href="{{$appointment->meeting_link}}" target="_blank" type="button"
                                               class="btn btn-outline-primary">Join Meeting</a>
                                        </div>
                                    @elseif($appointment->status == 'pending')
                                        <span class="badge bg-danger">Pending</span>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <form method="post" action="{{ route('physician.post_session.fill')  }}">
                                                @csrf
                                                <input type="hidden" name="patient_id"
                                                       value="{{$appointment->patient->id}}">
                                                <input type="hidden" name="session_id" value="{{$appointment->id}}">
                                                <button class="btn btn-outline-danger" type="submit">Fill Post-Session
                                                    Assessment
                                                </button>
                                            </form>
                                        </div>
                                    @elseif($appointment->status == 'completed')
                                        <span class="badge bg-success">Completed</span>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <form method="post" action="{{ route('physician.post_session.view')  }}">
                                                @csrf
                                                <input type="hidden" name="patient_id"
                                                       value="{{$appointment->patient->id}}">
                                                <button class="btn btn-outline-success" type="submit">View Post-Session
                                                    Assessment</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{asset('assets/available.webp')}}" class="card-img img-fluid rounded-start"
                                     style="object-fit: cover; max-height: 150px">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Video Conference Meeting</h5>
                                    <p class="card-text">{{ date('l, jS F Y', strtotime($appointment->slot_date)) }}
                                        , {{ substr($appointment->slot_time, 0, 5) }}.</p>
                                    <span class="badge bg-secondary">Available</span>
                                </div>
                            </div>

                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
@endsection
