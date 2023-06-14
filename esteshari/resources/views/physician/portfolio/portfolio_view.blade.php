@extends('layouts.physician_layout')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="container">
        <h2 class="form-title">My Portfolio</h2>
        <section class="h-100 gradient-custom-2">
            <div class="container  h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-12 col-xl-12">
                        <div class="card">
{{--                            Make this a caroussel, else BG color gray--}}
                            <div class="rounded-top text-white d-flex flex-row" style="background-color: gray; height:200px;">
                                <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                         alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                                         style="width: 150px; z-index: 1">
                                    <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                                            style="z-index: 1;">
                                        Edit profile
                                    </button>
                                </div>
                                <div class="ms-3" style="margin-top: 130px;">
                                    <h5>Dr. Andy Horwitz</h5>
                                    <p>Speciality</p>
                                </div>
                            </div>
                            <div class="p-4 text-black" style="background-color: #f8f9fa;">
                                <div class="d-flex justify-content-end text-center py-1">
                                    <div>
                                        <p class="mb-1 h5">SESSION COST</p>
                                        <p class="small text-muted mb-0 text-end">/session</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4 text-black">
                                <div class="mb-5">
                                    <p class="lead fw-normal mb-1">About</p>
                                    <div class="p-4" style="background-color: #f8f9fa;">
                                        <p class="font-italic mb-1">Web Developer</p>
                                        <p class="font-italic mb-1">Lives in New York</p>
                                        <p class="font-italic mb-0">Photographer</p>
                                    </div>
                                </div>


                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <p class="lead fw-normal mb-0">Recent photos</p>
                                    <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

