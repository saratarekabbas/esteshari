@extends('layouts.admin_layout')


@section('content')

    <div class="container">
        <h2 class="form-title">Physician Registration Form: <small
                class="text-muted">{{$physician->personalInformation->full_name}}
                , {{ $physician->personalInformation->designation}}</small></h2>

        <div class="container">
            <h4 class="form-subtitle">Section 1: Personal Information</h4>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th style="width: 25%;">Full Name</th>
                    <td style="width: 75%;">{{ $physician->personalInformation->full_name }}</td>
                </tr>
                <tr>
                    <th>Designation</th>
                    <td>{{ $physician->personalInformation->designation }}</td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>{{ $physician->personalInformation->date_of_birth }}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{ $physician->personalInformation->gender }}</td>
                </tr>
                <tr>
                    <th>Email Address</th>
                    <td>{{ $physician->personalInformation->email_address }}</td>
                </tr>
                <tr>
                    <th>Alternative Email Address</th>
                    <td>{{ $physician->personalInformation->alternative_email_address }}</td>
                </tr>
                <tr>
                    <th>Nationality</th>
                    <td>{{ $physician->personalInformation->nationality }}</td>
                </tr>
                <tr>
                    <th>Mobile Number</th>
                    <td>+{{ $physician->personalInformation->country_code }}
                        -{{ $physician->personalInformation->mobile_number }}</td>
                </tr>
                <tr>
                    <th>Telephone Number</th>
                    <td>{{ $physician->personalInformation->telephone_number }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $physician->personalInformation->address_line_1 }} <br>
                        {{ $physician->personalInformation->address_line_2 }} <br>
                        {{ $physician->personalInformation->postal_code }} {{ $physician->personalInformation->city }}
                        , {{ $physician->personalInformation->state }}, {{ $physician->personalInformation->country }}
                    </td>
                </tr>
                <tr>
                    <th>Identity Verification Files</th>

                    <td>
                        <ol class="list-group list-group-numbered">
                            @foreach(json_decode($physician->personalInformation->identity_verification_files) as $file)
                                <li class="list-group-item"><a href="{{ asset('storage/'. $file) }}"
                                                               target="_blank">{{ $file }}</a></li>
                            @endforeach
                        </ol>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>

@endsection
