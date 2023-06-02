@extends('layouts.admin_layout')

@section('content')
    <div class="col-lg-12" style="padding: 30px">
        <h3 style="padding-bottom: 20px">Welcome, Administrator</h3>
        <div class="row">
            <div class="col-lg-3" style="margin-bottom: 20px">
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-body text-center">
                        <h5 class="card-title">Registered</h5>
                        <h3>{{ $registeredPhysiciansCount }} Physicians</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3" style="margin-bottom: 20px">
                <div class="card text-white bg-primary" style="max-width: 18rem;">
                    <div class="card-body text-center">
                        <h5 class="card-title">Pending</h5>
                        <h3>{{ $pendingPhysiciansCount }} Physicians</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3" style="margin-bottom: 20px">
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-body text-center">
                        <h5 class="card-title">Rejected</h5>
                        <h3>{{ $rejectedPhysiciansCount }} Physicians</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3" style="margin-bottom: 20px">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-body text-center">
                        <h5 class="card-title">Approved</h5>
                        <h3>{{ $approvedPhysiciansCount }} Physicians</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <h5 class="card-title">Pending Physician Registration Requests</h5>
                <p class="card-text">This is the list of pending physician registration applications. Click on the
                    to respond to the pending applications.</p>
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
                                <div class="text-center">No pending physician registration requests.
                                </div>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                <div class="text-end">
                    <a href="{{ route('administrator.registration.index')}}" class="btn btn-primary">View All Pending
                        Applications</a>
                </div>
            </div>
        </div>
    </div>
@endsection
