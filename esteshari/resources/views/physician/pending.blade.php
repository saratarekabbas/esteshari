@extends('layouts.physician_layout')

@section('content')
This is pending page

@if (Session::has('success'))
    </div>
    <div class="alert alert-success">
                {{ Session::get('success') }}
    </div>
@endif
@endsection
