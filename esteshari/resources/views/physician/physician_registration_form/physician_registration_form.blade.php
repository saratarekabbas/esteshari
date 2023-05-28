@extends('layouts.physician_layout')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="container">
        <h2 class="form-title">Physician Registration Form</h2>
        <form class="form-content row g-3" action="{{ route('physician.registration.store') }}" method="POST"
              enctype="multipart/form-data">
            @csrf

            @include('physician.physician_registration_form.section1')

            {{--SECTION 1--}}

        </form>
    </div>
@endsection
