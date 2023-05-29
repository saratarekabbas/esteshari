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
        @endif

    </div>
@endsection

