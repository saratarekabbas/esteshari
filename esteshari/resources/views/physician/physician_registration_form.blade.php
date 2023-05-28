@extends('layouts.physician_layout')

@section('content')
    <!-- Content of the Physician Registration Form -->
    <label for="title">Professional Title/Designation:</label>
    <select id="title" name="title" required>
        <!-- Options -->
    </select>

    <!-- Rest of the form fields -->

    <button type="submit">Submit</button>
@endsection
