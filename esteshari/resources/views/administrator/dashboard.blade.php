<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
</head>
<body>
{{--NEW LARAVEL PHP DAHSBOARD CONTENT:--}}
@extends('layouts.admin_layout')

@section('content')
    <div class="col-lg-12" style="padding: 30px">
        <h3 style="padding-bottom: 20px">Welcome, Administrator</h3>
        <div class="card">
            {{--            <div class="card-header">--}}
            {{--                Physician Registration Applications--}}
            {{--            </div>--}}
            <div class="card-body">
                <h5 class="card-title">Pending Physician Registration Applications</h5>
                <p class="card-text">This is the list of pending physician registration applications. Click on view more
                    to view all pending applications.</p>
                <table class="table table-borderless">
                    <tbody>
                    <tr>
                        <th scope="row">Title + Physician Name</th>
                        <td>Role</td>
                        <td>Gender</td>
                        <td>Location</td>
                        <td>2 days ago</td>
                    </tr>
                    <tr>
                        <th scope="row">Title + Physician Name</th>
                        <td>Role</td>
                        <td>Gender</td>
                        <td>Location</td>
                        <td>2 days ago</td>
                    </tr>
                    <tr>
                        <th scope="row">Title + Physician Name</th>
                        <td>Role</td>
                        <td>Gender</td>
                        <td>Location</td>
                        <td>2 days ago</td>
                    </tr>
                    </tbody>
                </table>
                <a href="#" class="btn btn-primary">View All Pending Applications</a>
            </div>
        </div>
    </div>
@endsection

</body>
</html>
