@extends('layouts.physician_layout')

@section('content')

    @if (Session::has('success'))

        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>

        This is pending page
    @endif
@endsection
