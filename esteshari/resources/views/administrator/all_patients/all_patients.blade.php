@extends('layouts.admin_layout')

@section('content')
    <h4 class="form-subtitle">Patients List</h4>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Date of Registration</th>
        </tr>
        </thead>
        <tbody>
        @if ($allPatients->isEmpty())
            <tr>
                <td colspan="5">
                    <div class="text-center">No patients exist.
                    </div>
                </td>
            </tr>
        @else
            @foreach ($allPatients as $patient)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{asset('/assets/unknown.webp')}}" alt="" style="width: 45px; height: 45px"
                                 class="rounded-circle"/>
                            <div class="ms-3">
                                <p class="fw-bold mb-1">
                                {{$patient->name}}
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-muted mb-1">
                            {{$patient->email}}</p>
                    </td>
                    <td>
                        <p class="text-muted mb-1">
                            {{$patient->created_at}}</p>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
