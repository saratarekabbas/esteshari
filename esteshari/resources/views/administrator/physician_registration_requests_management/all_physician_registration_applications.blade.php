@extends('layouts.admin_layout')

@section('content')
    <h4 class="form-subtitle">All Physician Registration</h4>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
        <tr>
            <th>Name</th>
            <th>Contact Information</th>
            <th>Application Date</th>
            <th>Application</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @if ($allPhysicians->isEmpty())
            <tr>
                <td colspan="5" class="text-center">No Physician Registration Applications Exist</td>
            </tr>
        @else
            @foreach ($allPhysicians as $physician)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            @if( $physician->personalInformation && $physician->personalInformation->gender == 'Female' )
                                <img src="{{asset('/assets/female_physician.png')}}" alt=""
                                     style="width: 45px; height: 45px" class="rounded-circle"/>
                            @elseif( $physician->personalInformation && $physician->personalInformation->gender == 'Male')
                                <img src="{{asset('/assets/male_physician.png')}}" alt=""
                                     style="width: 45px; height: 45px" class="rounded-circle"/>
                            @endif
                            <div class="ms-3">
                                <p class="fw-bold mb-1">{{ $physician->personalInformation ? $physician->personalInformation->full_name : 'N/A'}}
                                    , {{ $physician->personalInformation ? $physician->personalInformation->designation : 'N/A' }}</p>
                            </div>

                        </div>
                    </td>
                    <td>
                        <p class="text-muted mb-1">
                            +{{ $physician->personalInformation ? $physician->personalInformation->country_code : 'N/A' }}
                            -{{ $physician->personalInformation ? $physician->personalInformation->mobile_number : 'N/A' }}
                            | {{ $physician->personalInformation ? $physician->personalInformation->email_address : $physician->email}}</p>
                    </td>
                    <td>
                        <p class="text-muted mb-1">{{ $physician->insurance ? $physician->insurance->created_at : 'N/A' }}</p>
                    </td>
                    <td>
                        @if($physician->personalInformation)
                            <a href="{{ route('administrator.registration.view', ['id' => $physician->id]) }}"
                               class="btn btn-link btn-sm mb-1">
                                View
                            </a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @if ($physician->status == 'pending')
                            <span class="badge bg-primary mb-1">Pending</span>
                        @elseif ($physician->status == 'approved')
                            <span class="badge bg-success mb-1">Approved</span>
                        @elseif ($physician->status == 'rejected')
                            <span class="badge bg-danger mb-1">Rejected</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
