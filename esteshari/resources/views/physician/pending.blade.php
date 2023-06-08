@extends('layouts.physician_layout')

@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Pending Application
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Your physician registration request is pending review. Please wait till your application is reviewed. Once your request has been responded to, you will be notified through email and this page will be updated. If you have any questions, please reach out to us.</li>
        </ul>
    </div>

@endsection
