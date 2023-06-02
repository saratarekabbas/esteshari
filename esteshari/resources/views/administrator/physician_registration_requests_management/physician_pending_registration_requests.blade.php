@extends('layouts.admin_layout')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <h4 class="form-subtitle">All Pending Physician Registration Requests</h4>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
        <tr>
            <th>Name</th>
            <th>About</th>
            <th>Application</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if ($pendingPhysicians->isEmpty())
            <tr>
                <td colspan="5">No Pending Requests</td>
            </tr>
        @else
            @foreach ($pendingPhysicians as $physician)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            @if( $physician->personalInformation->gender == 'Female' )
                                <img
                                    src="{{asset('/assets/female_physician.png')}}" alt=""
                                    style="width: 45px; height: 45px"
                                    class="rounded-circle"/>
                            @elseif( $physician->personalInformation->gender == 'Male')
                                <img
                                    src="{{asset('/assets/male_physician.png')}}" alt=""
                                    style="width: 45px; height: 45px"
                                    class="rounded-circle"/>
                            @endif
                            <div class="ms-3">
                                <p class="fw-bold mb-1">{{ $physician->personalInformation->full_name}}</p>
                                <p class="text-muted mb-0">{{ $physician->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">{{ $physician->personalInformation->designation }}</p>
                        <p class="text-muted mb-0">+{{ $physician->personalInformation->country_code }}
                            -{{ $physician->personalInformation->mobile_number }}
                            | {{ $physician->personalInformation->email_address }}</p>
                    </td>
                    <td>
                        <a href="{{ route('administrator.registration.view', ['id' => $physician->id]) }}"
                           class="btn btn-link btn-sm">
                            View
                        </a>
                    </td>
                    <td>
                        <div class="d-flex">

                            <form action="{{ route('administrator.registration.respond') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $physician->id }}">
                                <button type="submit" name="action" value="approve" class="btn btn-primary btn-sm me-2">
                                    Approve
                                </button>
                            </form>
                            <form action="{{ route('administrator.registration.respond') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $physician->id }}">
                                <button type="submit" name="action" value="reject" class="btn btn-secondary btn-sm">
                                    Reject
                                </button>
                            </form>
                        </div>
                    </td>

                </tr>

            @endforeach
        @endif
        </tbody>
    </table>

@endsection
