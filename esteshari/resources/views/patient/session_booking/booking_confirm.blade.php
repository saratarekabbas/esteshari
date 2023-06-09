@extends('layouts.patient_layout')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="container">
        THIS IS CONFIRM FOR SESSION: {{$session->slot_date}}, {{ substr($session->slot_time, 0, 5) }} with {{$physician->name}}

    </div>
@endsection
