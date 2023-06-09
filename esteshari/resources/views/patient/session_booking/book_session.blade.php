@extends('layouts.patient_layout')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="container">
        <h2 class="form-title">Online Consultation with Dr. {{$physician->name}}</h2>
        <div class="row">
            <div class="col-md-8" style="height: 700px;">
                <div class="overflow-auto h-100">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="{{asset('assets/profile_dr_4.jpg')}}" alt=""
                                         class="img-fluid rounded-start"
                                         style="min-height: 272px; object-fit: cover;">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h4 class="card-title">Dr. {{$physician->name}}</h4>
                                        <p class="card-text">Obstetrician & Gynocologist, Fertility & Reproductive
                                            Medicine
                                            Specialist</p>
                                        <p class="card-text">English, Bahasa Malaysia</p>
                                        <p class="card-text">15 Years Experience</p>
                                        <div>
                                            <i class="fa fa-star star" style="color: #f1b701"></i>
                                            <i class="fa fa-star star" style="color: #f1b701"></i>
                                            <i class="fa fa-star star" style="color: #f1b701"></i>
                                            <i class="fa fa-star star" style="color: #f1b701"></i>
                                            <i class="fa fa-star star" style="color: #f1b701"></i>
                                        </div>
                                        <div class="text-muted">34 reviews</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">About Doctor</h5>
                                <p class="card-text" style="font-weight: lighter">Dr. Navdeep
                                    Singh
                                    Pannu is a
                                    Consultant Obstetrician, Gynaecologist, and Fertility specialist at TMC
                                    Fertility
                                    Centre.
                                    Previously worked at the General Hos...
                                    <a href="#" class="card-link">See More</a></p>
                                <h5 class="card-title">About Dr. {{$physician->name}}</h5>
                                <p class="card-text" style="font-weight: lighter; font-size: small">Dr. Navdeep
                                    Singh
                                    Pannu is a
                                    Consultant Obstetrician, Gynaecologist, and Fertility specialist at TMC
                                    Fertility
                                    Centre.
                                    Previously worked at the General Hos...
                                    <a href="#" class="card-link">See More</a></p>
                                <h5 class="card-title">About Dr. {{$physician->name}}</h5>
                                <p class="card-text" style="font-weight: lighter; font-size: small">Dr. Navdeep
                                    Singh
                                    Pannu is a
                                    Consultant Obstetrician, Gynaecologist, and Fertility specialist at TMC
                                    Fertility
                                    Centre.
                                    Previously worked at the General Hos...
                                    <a href="#" class="card-link">See More</a></p>
                                <h5 class="card-title">About Dr. {{$physician->name}}</h5>
                                <p class="card-text" style="font-weight: lighter; font-size: small">Dr. Navdeep
                                    Singh
                                    Pannu is a
                                    Consultant Obstetrician, Gynaecologist, and Fertility specialist at TMC
                                    Fertility
                                    Centre.
                                    Previously worked at the General Hos...
                                    <a href="#" class="card-link">See More</a></p>
                                <h5 class="card-title">About Dr. {{$physician->name}}</h5>
                                <p class="card-text" style="font-weight: lighter; font-size: small">Dr. Navdeep
                                    Singh
                                    Pannu is a
                                    Consultant Obstetrician, Gynaecologist, and Fertility specialist at TMC
                                    Fertility
                                    Centre.
                                    Previously worked at the General Hos...
                                    <a href="#" class="card-link">See More</a></p>
                                <h5 class="card-title">About Dr. {{$physician->name}}</h5>
                                <p class="card-text" style="font-weight: lighter; font-size: small">Dr. Navdeep
                                    Singh
                                    Pannu is a
                                    Consultant Obstetrician, Gynaecologist, and Fertility specialist at TMC
                                    Fertility
                                    Centre.
                                    Previously worked at the General Hos...
                                    <a href="#" class="card-link">See More</a></p>
                                <h5 class="card-title">About Dr. {{$physician->name}}</h5>
                                <p class="card-text" style="font-weight: lighter; font-size: small">Dr. Navdeep
                                    Singh
                                    Pannu is a
                                    Consultant Obstetrician, Gynaecologist, and Fertility specialist at TMC
                                    Fertility
                                    Centre.
                                    Previously worked at the General Hos...
                                    <a href="#" class="card-link">See More</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="row">

                        <div class="card-body">
                            <h5 class="card-title" style="margin-left: 8px">Choose Date & Time</h5>
                            <p class="card-text text-muted" style="margin-left: 8px">Choose date and time from available slots
                            </p>

                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <td style="text-align: center; vertical-align: middle;"><i class="fa fa-angle-left fa-2x" style="color:#a8a5a5;" aria-hidden="true"></i>
                                    <td style="text-align: center;">Mon <br> Jun 12</td>
                                    <td style="text-align: center; color: #dc6464; border-bottom: 1px solid #dc6464">Mon <br> Jun 12</td>
                                    <td style="text-align: center;">Mon <br> Jun 12</td>
                                    <td style="text-align: center;">Mon <br> Jun 12</td>
                                    <td style="text-align: center; vertical-align: middle;"><i class="fa fa-angle-right fa-2x" style="color:#4a4a4d;" aria-hidden="true"></i>
                                    </td>
                                </tr>

                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="6" style="text-align: center; vertical-align: middle;">
                                        <div class="d-flex justify-content-center">
                                            <div class="row row-cols-1 row-cols-md-4 g-3">
                                                <a class="col available_slot_items" >
                                                    sdsds33
                                                </a>
                                                <div class="col available_slot_items">
                                                    sdsds
                                                </div>
                                                <div class="col available_slot_items">
                                                    sdsds
                                                </div>
                                                <div class="col available_slot_items">
                                                    sdsds
                                                </div>
                                                <div class="col available_slot_items">
                                                    sdsds
                                                </div>
                                                <div class="col available_slot_items">
                                                    sdsds
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
