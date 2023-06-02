@extends('layouts.admin_layout')

@section('content')
    <h4 class="form-subtitle">Physicians List</h4>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
        <tr>
            <th>Name</th>
            <th>Contact Information</th>
            <th>Date of Registration</th>
            <th>Application</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @if ($allPhysicians->isEmpty())
            <tr>
                <td colspan="5">No Physicians Exist</td>
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
                                     style="width: 45px; height: 45px"
                                     class="rounded-circle"/>
                            @else
                                <img src="{{asset('/assets/unknown.webp')}}" alt="" style="width: 45px; height: 45px"
                                     class="rounded-circle"/>
                            @endif
                            <div class="ms-3">
                                <p class="fw-bold mb-1">
                                    @if($physician->personalInformation)
                                        {{$physician->personalInformation->full_name}}
                                        , {{$physician->personalInformation->designation}}
                                    @else
                                        {{$physician->name}}</p>
                                @endif
                            </div>

                        </div>
                    </td>
                    <td>
                        <p class="text-muted mb-1">
                            @if($physician->personalInformation)
                                +{{$physician->personalInformation->country_code}}
                                -{{$physician->personalInformation->mobile_number }}
                                | {{ $physician->personalInformation->email_address}}
                            @else
                                {{$physician->email}}</p>
                        @endif
                        </p>
                    </td>
                    <td>
                        <p class="text-muted mb-1">
                            {{$physician->created_at}}</p>
                    </td>
                    <td>
                        @if($physician->personalInformation)
                            <a href="{{ route('administrator.registration.view', ['id' => $physician->id]) }}"
                               class="btn btn-link btn-sm">
                                View
                            </a>
                        @else
                            <p class="text-muted mb-1">
                                N/A</p>
                        @endif
                    </td>
                    <td>
                        @if ($physician->status == 'registered')
                            <span class="badge bg-secondary">Registered</span>
                        @elseif ($physician->status == 'pending')
                            <span class="badge bg-primary">Pending</span>
                        @elseif ($physician->status == 'approved')
                            <span class="badge bg-success">Approved</span>
                        @elseif ($physician->status == 'denied')
                            <span class="badge bg-danger">Rejected</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
