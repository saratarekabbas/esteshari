@extends('layouts.admin_layout')

@section('content')
    <h4 class="form-subtitle">All Physician Registration</h4>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
        <tr>
            <th>Name</th>
            <th>About</th>
            <th>Application</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($allPhysicians as $physician)
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        @if( $physician->personalInformation && $physician->personalInformation->gender == 'Female' )
                            <img src="{{asset('/assets/female_physician.png')}}" alt="" style="width: 45px; height: 45px" class="rounded-circle"/>
                        @elseif( $physician->personalInformation && $physician->personalInformation->gender == 'Male')
                            <img src="{{asset('/assets/male_physician.png')}}" alt="" style="width: 45px; height: 45px" class="rounded-circle"/>
                        @else
                            <img src="{{asset('/assets/unknown.webp')}}" alt="" style="width: 45px; height: 45px" class="rounded-circle"/>
                        @endif
                            <div class="ms-3">
                                <p class="fw-bold mb-1">{{ $physician->personalInformation ? $physician->personalInformation->full_name : $physician->name}}</p>
                            </div>

                    </div>
                </td>
                <td>
                    <p class="fw-normal mb-1">{{ $physician->personalInformation ? $physician->personalInformation->designation : 'N/A' }}</p>
                    <p class="text-muted mb-0">+{{ $physician->personalInformation ? $physician->personalInformation->country_code : 'N/A' }}
                        -{{ $physician->personalInformation ? $physician->personalInformation->mobile_number : 'N/A' }}
                        | {{ $physician->personalInformation ? $physician->personalInformation->email_address : $physician->email}}</p>
                </td>
                <td>
                    @if($physician->personalInformation)
                    <a href="{{ route('administrator.registration.view', ['id' => $physician->id]) }}" class="btn btn-link btn-sm">
                        View
                    </a>
                    @else
                    N/A
                        @endif
                </td>
                <td>
                    @if ($physician->status == 'registered')
                        <span class="badge bg-secondary">Registered</span>
                    @elseif ($physician->status == 'pending')
                        <span class="badge bg-primary">Pending</span>
                    @elseif ($physician->status == 'approved')
                        <span class="badge bg-success">Approved</span>
                    @elseif ($physician->status == 'rejected')
                        <span class="badge bg-danger">Rejected</span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
