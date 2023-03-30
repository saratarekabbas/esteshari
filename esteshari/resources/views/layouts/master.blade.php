<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Esteshari</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css') }}" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700') }}" rel="stylesheet" />
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic') }}" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css') }}" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#page-top">{{__('homepage.esteshari')}}</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">
                <li class="nav-item"><a class="nav-link" href="#about">{{__('homepage.about')}}</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">{{__('homepage.services')}}</a></li>
                <li class="nav-item"><a class="nav-link" href="#portfolio">{{__('homepage.contact')}}</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">{{__('homepage.join')}}</a></li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<!-- Footer-->
<footer class="bg-light py-5">
    <div class="container px-4 px-lg-5"><div class="small text-center text-muted">{{__('homepage.copyrights')}}</div></div>
</footer>
<!-- Bootstrap core JS-->
<script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- SimpleLightbox plugin JS-->
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js') }}"></script>
<!-- Core theme JS-->
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('https://cdn.startbootstrap.com/sb-forms-latest.js') }}"></script>

</body>
</html>
