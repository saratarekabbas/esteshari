@extends('layouts.patient_layout')

@section('content')
    <div class="col-lg-12" style="padding: 30px">
        <h3 style="padding-bottom: 20px">Welcome, {{ Auth::user()->name }}</h3>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Upcoming Appointments</h5>
                @if($appointments->isEmpty())
                    <div class="text-center">
                        <img src="{{asset('assets/calendar-icon-png-4.png')}}" alt=""
                             style="width: 150px; height: 150px; margin: 20px">
                        <p class="card-text" style="font-weight: 600 ">You have no upcoming appointments</p>
                        <a href="{{route('patient.physicians_list.view')}}" class="btn btn-primary">Book an
                            Appointment</a>
                    </div>
                @else

                    @foreach($appointments as $appointment)

                        <div class="list-group-item list-group-item-action flex-column align-items-start">

                            <div class="d-flex w-100 justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img
                                        src="{{asset('/assets/female_physician.png')}}" alt=""
                                        style="width: 60px; height: 60px"
                                        class="rounded-circle"/>
                                    <div class="ms-3">

                                        <h6 class="mb-1">Appointment with Dr {{$appointment->user->name}}</h6>
                                        <small
                                            class="text-muted">{{ date('l, jS F Y', strtotime($appointment->slot_date)) }}
                                            , {{ substr($appointment->slot_time, 0, 5) }}</small>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach

            </div>

            {{--                    @foreach($appointments as $appointment)--}}
            {{--                        <div class="d-flex align-items-center">--}}
            {{--                                <img--}}
            {{--                                    src="{{asset('/assets/female_physician.png')}}" alt=""--}}
            {{--                                    style="width: 60px; height: 60px"--}}
            {{--                                    class="rounded-circle"/>--}}

            {{--                            <div class="ms-3">--}}
            {{--                                <p class="fw-bold mb-1">ss</p>--}}
            {{--                                <p class="text-muted mb-0">dd</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}

            {{--                                            @endforeach--}}
            <a href="{{route('patient.upcoming_appointments')}}" class="btn btn-primary">View All Upcoming
                Appointments</a>
            @endif
        </div>
    </div>

    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-11">
                    <h5 class="card-title">Consult with a Specialist Online</h5>
                </div>
                <div class="col-1 text-center">
                    <a class="mb-3 mr-1" href="{{route('patient.physicians_list.view')}}"
                       style="text-decoration: none">See All </a>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="card h-100">
                                <img class="img-fluid" alt="100%x280"
                                     src="{{asset('assets/tele9.webp')}}">
                                <div class="card-body">
                                    <h4 class="card-title">Allergies and Hay Fever</h4>
                                    <p class="card-text">Struggling with allergies and hay fever symptoms? Connect
                                        with our online doctors for expert advice and personalized treatment plans
                                        to alleviate your discomfort.</p>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card h-100">
                                <img class="img-fluid" alt="100%x280"
                                     src="{{asset('assets/tele7.jpg')}}">
                                <div class="card-body">
                                    <h4 class="card-title">Children Vaccinations and Immunizations</h4>
                                    <p class="card-text">Need information about childhood vaccinations and
                                        immunizations? Speak to our pediatricians online to ensure your child
                                        receives the necessary vaccinations for their well-being.</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card h-100">
                                <img class="img-fluid" alt="100%x280"
                                     src="{{asset('assets/tele3.jpg')}}">
                                <div class="card-body">
                                    <h4 class="card-title">Women's Health and Wellness</h4>
                                    <p class="card-text">Seeking advice on women's health and wellness? Our
                                        experienced gynecologists are available for online consultations to address
                                        your concerns and provide guidance.</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card h-100">
                                <img class="img-fluid" alt="100%x280"
                                     src="{{asset('assets/tele5.jpg')}}">
                                <div class="card-body">
                                    <h4 class="card-title">Stomach Upset and Digestive Issues</h4>
                                    <p class="card-text">Having frequent stomach upsets and digestive issues? Our
                                        qualified gastroenterologists are here to provide virtual consultations and
                                        assist you in managing your gastrointestinal health.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>

@endsection
