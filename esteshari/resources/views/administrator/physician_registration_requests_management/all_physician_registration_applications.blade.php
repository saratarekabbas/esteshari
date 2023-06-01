@extends('layouts.admin_layout')

@section('content')
    <h4 class="form-subtitle">All Pending Physician Registration Requests</h4>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
        <tr>
            <th>Name</th>
            <th>About</th>

            <th>Status</th>
            <th>Application</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <img
                        src="{{asset('/assets/male_physician.png')}}"
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                    />
                    <div class="ms-3">
                        <p class="fw-bold mb-1">John Doe</p>
                        <p class="text-muted mb-0">12/12/2021</p>
                    </div>
                </div>
            </td>
            <td>
                <p class="fw-normal mb-1">Dr</p>
                <p class="text-muted mb-0">+60-1160563562 | abbassara@gmail.com</p>
            </td>
            <td>
                Rejected
            </td>
            <td>
                <button type="button" class="btn btn-link btn-sm btn-rounded">
                    View
                </button>
            </td>
        </tr>
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <img
                        src="{{asset('/assets/female_physician.png')}}"
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                    />
                    <div class="ms-3">
                        <p class="fw-bold mb-1">John Doe</p>
                        <p class="text-muted mb-0">2 hours ago</p>
                    </div>
                </div>
            </td>
            <td>
                <p class="fw-normal mb-1">Dr</p>
                <p class="text-muted mb-0">+60-1160563562 | abbassara@gmail.com</p>
            </td>
            <td>
                Approved
            </td>
            <td>
                <button type="button" class="btn btn-link btn-sm btn-rounded">
                    View
                </button>
            </td>
        </tr>
        </tbody>
    </table>

@endsection
