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
<form method="POST" action="{{ route('physician.registration.store') }}" enctype="multipart/form-data">
    @csrf

    <h2>Personal Information</h2>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required value="{{ old('name') }}">
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" name="dob" id="dob" class="form-control {{ $errors->has('dob') ? 'is-invalid' : '' }}" required value="{{ old('dob') }}">
        @if ($errors->has('dob'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('dob') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        <label for="nationality">Nationality</label>
        <input type="text" name="nationality" id="nationality" class="form-control {{ $errors->has('nationality') ? 'is-invalid' : '' }}" required value="{{ old('nationality') }}">
        @if ($errors->has('nationality'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('nationality') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        <label for="gender">Gender</label>
        <select name="gender" id="gender" class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" required>
            <option value="">Select Gender</option>
            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
        </select>
        @if ($errors->has('gender'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('gender') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" required value="{{ old('email') }}">
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="tel" name="phone" id="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" value="{{ old('phone') }}" required>
        @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <textarea name="address" id="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" required>{{ old('address') }}</textarea>
        @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <h2>Educational Qualifications</h2>
    <div class="form-group">
        <label for="medical_degree_files">Medical Degree Files</label>
        <input type="file" name="medical_degree_files[]" id="medical_degree_files" class="form-control {{ $errors->has('medical_degree_files') ? 'is-invalid' : '' }}" value="{{ old('medical_degree_files') }}" required multiple>
        @error('medical_degree_files')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="other_qualifications_files">Other Qualifications Files</label>
        <input type="file" name="other_qualifications_files[]" id="other_qualifications_files" class="form-control {{ $errors->has('other_qualifications_files') ? 'is-invalid' : '' }}" value="{{ old('other_qualifications_files') }}" multiple>
        @error('other_qualifications_files')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <h2>Professional Registration/Licensing</h2>
    <div class="form-group">
        <label for="registration_and_license_files">Registration and License Files</label>
        <input type="file" name="registration_and_license_files[]" id="registration_and_license_files"
               class="form-control {{ $errors->has('registration_and_license_files') ? 'is-invalid' : '' }}" required multiple>
        @error('registration_and_license_files')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="board_certification_files">Board Certification Files</label>
        <input type="file" name="board_certification_files[]" id="board_certification_files" class="form-control {{ $errors->has('board_certification_files') ? 'is-invalid' : '' }}"
               multiple>
        @error('board_certification_files')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <h2>Certifications</h2>
    <div class="form-group">
        <label for="certification_files">Certification Files</label>
        <input type="file" name="certification_files[]" id="certification_files" class="form-control {{ $errors->has('certification_files') ? 'is-invalid' : '' }}"
               multiple>
        @error('certification_files')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <h2>Work Experience</h2>
    <div class="form-group">
        <table class="table">
            <thead>
            <tr>
                <th>Job Title</th>
                <th>Employer</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="text" name="work_experience[0][job_title]" class="form-control"
                           value="{{ old('work_experience.0.job_title') }}" required></td>
                <td><input type="text" name="work_experience[0][employer]" class="form-control"
                           value="{{ old('work_experience.0.employer') }}" required></td>
                <td><input type="date" name="work_experience[0][start_date]" class="form-control"
                           value="{{ old('work_experience.0.start_date') }}" required></td>
                <td><input type="date" name="work_experience[0][end_date]" class="form-control"
                           value="{{ old('work_experience.0.end_date') }}"></td>
            </tr>
            <tr>
                <td><input type="text" name="work_experience[1][job_title]" class="form-control"
                           value="{{ old('work_experience.1.job_title') }}" required></td>
                <td><input type="text" name="work_experience[1][employer]" class="form-control"
                           value="{{ old('work_experience.1.employer') }}" required></td>
                <td><input type="date" name="work_experience[1][start_date]" class="form-control"
                           value="{{ old('work_experience.1.start_date') }}" required></td>
                <td><input type="date" name="work_experience[1][end_date]" class="form-control"
                           value="{{ old('work_experience.1.end_date') }}"></td>
            </tr>
            @error('work_experience')
            <tr>
                <td colspan="4" style="color: red">{{ $message }}</td>
            </tr>
            @enderror
            </tbody>
        </table>
    </div>

    <h2>Background Check</h2>
    <div class="form-group">
        <label for="background_check_files">Background Check Files</label>
        <input type="file" name="background_check_files[]" id="background_check_files" class="form-control-file" multiple>
        @error('background_check_files')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <h2>References</h2>
    <div class="form-group">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="text" name="references[0][name]" value="{{ old('references.0.name') }}" class="form-control" required></td>
                <td><input type="email" name="references[0][email]" value="{{ old('references.0.email') }}" class="form-control" required></td>
                <td><input type="tel" name="references[0][phone_number]" value="{{ old('references.0.phone_number') }}" class="form-control" required></td>
            </tr>
            <tr>
                <td><input type="text" name="references[1][name]" value="{{ old('references.1.name') }}" class="form-control" required></td>
                <td><input type="email" name="references[1][email]" value="{{ old('references.1.email') }}" class="form-control" required></td>
                <td><input type="tel" name="references[1][phone_number]" value="{{ old('references.1.phone_number') }}" class="form-control" required></td>
            </tr>
            </tbody>
        </table>
        @error('references')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <h2>Malpractice Insurance</h2>
    <div class="form-group">
        <label for="malpractice_insurance_file">Malpractice Insurance File</label>
        <input type="file" name="malpractice_insurance_file" id="malpractice_insurance_file" class="form-control-file"
               required>
        @if ($errors->has('malpractice_insurance_file'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('malpractice_insurance_file') }}</strong>
        </span>
        @endif
        @if(old('malpractice_insurance_file'))
            <span class="text-muted">{{ old('malpractice_insurance_file') }}</span>
        @endif
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>
</body>
</html>
