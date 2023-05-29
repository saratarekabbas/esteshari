@extends('layouts.physician_layout')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="container">
        <h2 class="form-title">Physician Registration Form</h2>
        @if ($section == 1)
            @include('physician.physician_registration_form.section1')
        @elseif ($section == 2)
            @include('physician.physician_registration_form.section2')
        @elseif ($section == 3)
            @include('physician.physician_registration_form.section3')
        @elseif ($section == 4)
            @include('physician.physician_registration_form.section4')
        @elseif ($section == 5)
            @include('physician.physician_registration_form.section5')
        @elseif ($section == 6)
            @include('physician.physician_registration_form.section6')
        @elseif ($section == 7)
            @include('physician.physician_registration_form.section7')
        @elseif ($section == 8)
            @include('physician.physician_registration_form.section8')
        @endif
    </div>
@endsection

