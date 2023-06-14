@extends('layouts.physician_layout')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="container">
        <h2 class="form-title">Manage Portfolio</h2>
        <hr class="hr hr-blurry"/>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            Please note that all portfolio details are displayed and can be viewed by the patient. Therefore, it is
            important to avoid sharing any personal or private information that you do not wish to disclose or have your
            patient see. We kindly remind you to keep your portfolio content strictly professional and relevant to your
            practice.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="row">
            <div class="col-lg-4 ">
                <div class="card mb-4" style="height: 300px">
                    <div class="card-body text-center mt-3">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                             alt="avatar"
                             class="rounded-circle img-fluid" style="width: 150px;">
                        <div class="d-flex justify-content-center mb-2 mt-4">
                            <button type="button" class="btn btn-primary">Change Photo</button>
                            <button type="button" class="btn btn-outline-primary ms-1">Remove</button>
                        </div>
                        {{--                        ELSE if user does not have any photos--}}
                        {{--                        <div class="d-flex justify-content-center mb-2 mt-4">--}}
                        {{--                            <button type="button" class="btn btn-primary">Upload Photo</button>--}}
                        {{--                        </div>--}}

                    </div>
                </div>

            </div>
            <div class="col-lg-8">
                {{--                MAKE IT SCROLLABLE IF IT GETS MORE IN LENGTH--}}
                <div class="card mb-4" style="height: 300px">
                    <div class="card-body">
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-3">--}}
{{--                                <p class="mb-0">Designation</p>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-9">--}}
{{--                                <p class="text-muted mb-0">Dr</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <hr>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-3">--}}
{{--                                <p class="mb-0">Full Name</p>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-9">--}}
{{--                                <p class="text-muted mb-0">Johnatan Smith</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <hr>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-3">--}}
{{--                                <p class="mb-0">Email</p>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-9">--}}
{{--                                <p class="text-muted mb-0">example@example.com</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <hr>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-3">--}}
{{--                                <p class="mb-0">Specialties</p>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-9">--}}
{{--                                <p class="text-muted mb-0">Endogrinology, XXXology</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <hr>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-3">--}}
{{--                                <p class="mb-0">Languages Spoken</p>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-9">--}}
{{--                                <p class="text-muted mb-0">English, French, Malay</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{asset('assets/profile_dr_1.jpg')}}" class="d-block w-100" alt="..." style="object-fit: cover; max-height: 270px ">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('assets/profile_dr_2.jpg')}}" class="d-block w-100" alt="..." style="object-fit: cover; max-height: 270px">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('assets/profile_dr_3.jpg')}}" class="d-block w-100" alt="..." style="object-fit: cover; max-height: 270px">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                                    data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                                    data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <h4 class="form-title">Portfolio Details</h4>
            </div>
        </div>


    </div>

@endsection

