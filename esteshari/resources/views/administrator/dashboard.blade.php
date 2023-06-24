@extends('layouts.admin_layout')

@section('content')
    <div class="col-lg-12" style="padding: 30px">
        <h3 style="padding-bottom: 20px">{{__('dashboard.WelcomeAdmin')}} {{ Auth::user()->name }}</h3>
        <div class="row">
            <div class="col-lg-3" style="margin-bottom: 20px">
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{__('dashboard.Registered')}}</h5>
                        <h3>{{ $registeredPhysiciansCount }} {{__('dashboard.Physicians')}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3" style="margin-bottom: 20px">
                <div class="card text-white bg-primary" style="max-width: 18rem;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{__('dashboard.Pending')}}</h5>
                        <h3>{{ $pendingPhysiciansCount }} {{__('dashboard.Physicians')}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3" style="margin-bottom: 20px">
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{__('dashboard.Rejected')}}</h5>
                        <h3>{{ $rejectedPhysiciansCount }} {{__('dashboard.Physicians')}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3" style="margin-bottom: 20px">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{__('dashboard.Approved')}}</h5>
                        <h3>{{ $approvedPhysiciansCount }} {{__('dashboard.Physicians')}}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                {{__('dashboard.Featured')}}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{__('dashboard.PendingPhysicianRegistrationRequests')}}</h5>
                <p class="card-text">{{__('dashboard.PendingPhysicianRegistrationRequestsMSG')}}</p>
                <table class="table table-borderless">
                    <tbody>
                    @if($pendingPhysiciansCount != 0)
                        @foreach ($pendingPhysicians as $physician)
                            <tr>
                                <th scope="row">{{ $physician->personalInformation->full_name}}</th>
                                <td>{{ $physician->personalInformation->designation }}</td>
                                <td>{{ $physician->personalInformation->gender }}</td>
                                <td>{{ $physician->personalInformation->nationality }}</td>
                                <td>{{ $physician->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">
                                <div class="text-center">{{__('dashboard.NoPendingPhysicianRegistrationRequestsContent')}}
                                </div>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                <div class="text-end">
                    <a href="{{ route('administrator.registration.index')}}" class="btn btn-primary">{{__('dashboard.ViewAllPendingApplications')}}
                        </a>
                </div>
            </div>
        </div>
    </div>
@endsection
