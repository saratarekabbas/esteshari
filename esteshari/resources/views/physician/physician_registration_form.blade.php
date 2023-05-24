<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Physician Registration Form</title>


</head>
<body>
@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
<form action="{{ route('physician.registration.store') }}" method="POST" enctype="multipart/form-data">

    @csrf
    <div>
        <label for="title"> Title:</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div>
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required>
    </div>
    <div>
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required>
    </div>
    <div>
        <label for="job_title">Job Title:</label>
        <input type="text" id="job_title" name="job_title" required>
    </div>

    <!-- Passport file -->
    <input type="file" name="passport">

    <!-- Insurance files -->
    <input type="file" name="insurance[]" multiple>


    <div>
        <button type="submit">Submit</button>
    </div>
</form>

</body>
</html>
