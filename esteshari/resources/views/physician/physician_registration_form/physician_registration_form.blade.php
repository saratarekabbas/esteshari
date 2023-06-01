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

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item {{ $section == 1 ? 'disabled' : '' }}">
                <a class="page-link" href="{{ route('administrator.registration.view', ['id' => $physician->id, 'section' => $section - 1]) }}" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="{{ route('administrator.registration.view', ['id' => $physician->id, 'section' => 1]) }}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{ route('administrator.registration.view', ['id' => $physician->id, 'section' => 2]) }}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{ route('administrator.registration.view', ['id' => $physician->id, 'section' => 3]) }}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{ route('administrator.registration.view', ['id' => $physician->id, 'section' => 4]) }}">4</a></li>
            <li class="page-item"><a class="page-link" href="{{ route('administrator.registration.view', ['id' => $physician->id, 'section' => 5]) }}">5</a></li>
            <li class="page-item"><a class="page-link" href="{{ route('administrator.registration.view', ['id' => $physician->id, 'section' => 6]) }}">6</a></li>
            <li class="page-item"><a class="page-link" href="{{ route('administrator.registration.view', ['id' => $physician->id, 'section' => 7]) }}">7</a></li>
            <li class="page-item"><a class="page-link" href="{{ route('administrator.registration.view', ['id' => $physician->id, 'section' => 8]) }}">8</a></li>
            <li class="page-item {{ $section == 8 ? 'disabled' : '' }}">
                <a class="page-link" href="{{ route('administrator.registration.view', ['id' => $physician->id, 'section' => $section + 1]) }}">Next</a>
            </li>
        </ul>
    </nav>




@endsection

