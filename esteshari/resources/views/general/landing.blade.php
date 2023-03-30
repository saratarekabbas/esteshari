@extends('layouts.master')

@section('content')

    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">{{__('homepage.main headline')}}</h1>
                    <hr class="divider"/>
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">{{__('homepage.main description')}}</p>
                    <a class="btn btn-primary btn-xl" href="#about">{{__('homepage.find out more')}}</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="page-section bg-primary" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">{{__('homepage.about')}}</h2>
                    <hr class="divider divider-light"/>
                    <p class="text-white-75 mb-4">{{__('homepage.about description')}}</p>
                    <a class="btn btn-light btn-xl" href="#services">{{__('homepage.about get started')}}</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">{{__('homepage.service title')}}</h2>
            <hr class="divider"/>
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-gem fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">{{__('homepage.service 1 title')}}</h3>
                        <p class="text-muted mb-0">{{__('homepage.service 1 description')}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">{{__('homepage.service 2 title')}}</h3>
                        <p class="text-muted mb-0">{{__('homepage.service 2 description')}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-globe fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">{{__('homepage.service 3 title')}}</h3>
                        <p class="text-muted mb-0">{{__('homepage.service 3 description')}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">{{__('homepage.service 4 title')}}</h3>
                        <p class="text-muted mb-0">{{__('homepage.service 4 description')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio-->
    <div id="portfolio">
        THIS IS PORTFOLIO SECTION
    </div>
    <!-- Call to action-->
    <section class="page-section bg-dark text-white" id="contact">
        <div class="container px-4 px-lg-5 text-center">
            <h2 class="mb-4">{{__('homepage.register headline')}}</h2>
            <a class="btn btn-light btn-xl" href="/register">{{__('homepage.register button')}}</a>
        </div>
    </section>

@stop
