@yield('section5')
<form class="form-content row g-3" action="{{ route('physician.registration.store')  }}" method="POST"
      enctype="multipart/form-data">
    <input type="hidden" name="section" value="5">
    @csrf
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 57.2%" aria-valuenow="25" aria-valuemin="0"
             aria-valuemax="100"></div>
    </div>

    <h4 class="form-subtitle">Section 5: Professional Registration</h4>

    <div class="col-md-12">
        <h5 class="form-subtitle">Registration 1:</h5>
    </div>
    <div class="col-md-3 form-floating">
        <select id="registration_type" name="registration_type"
                class="form-select @error('registration_type') is-invalid @enderror"
                required>
            <option value="">Select Registration Type</option>
            <option value="Medical License">Medical License</option>
            <option value="State Registration">State Registration</option>
            <option value="DEA Registration">DEA Registration</option>
            <option value="Specialty Certifications">Specialty Certifications</option>
            <option value="Other">Other</option>
        </select>

        <label for="registration_type">Registration Type</label>
        @error('registration_type')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div id="otherRegistrationContainer" class="form-floating col-md-3" style="display: none;">
        <input type="text" placeholder="Other Registration Type" id="otherRegistration" name="otherRegistration"
               class="form-control
                @error('registration_type') is-invalid @enderror"
               value="{{ $professionalRegistration ? $professionalRegistration->otherRegistration : old('otherRegistration') }}">
        <label for="otherRegistration">Other Registration Type</label>
        @error('registration_type')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 form-floating">
        <input type="text" id="registration_title" name="registration_title"
               placeholder="Enter Registration Title"
               class="form-control @error('registration_title') is-invalid @enderror"
               value="{{ $professionalRegistration ? $professionalRegistration->registration_title : old('registration_title') }}"
               required>
        <label for="registration_title">Registration Title</label>
        @error('registration_title')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 form-floating">
        <input type="text" id="registration_number" name="registration_number"
               placeholder="Enter Registration Number"
               class="form-control @error('registration_number') is-invalid @enderror"
               value="{{ $professionalRegistration ? $professionalRegistration->registration_number : old('registration_number') }}"
        >
        <label for="registration_number">Registration Number</label>
        @error('registration_number')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 form-floating">
        <input type="date" id="registration_issue_date" name="registration_issue_date"
               class="form-control @error('registration_issue_date') is-invalid @enderror"
               value="{{ $professionalRegistration ? $professionalRegistration->registration_issue_date : old('registration_issue_date') }}"
               required>

        <label for="registration_issue_date">Issue Date</label>
        @error('registration_issue_date')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 form-floating">
        <input type="date" id="registration_expiry_date" name="registration_expiry_date"
               class="form-control @error('registration_expiry_date') is-invalid @enderror"
               value="{{ $professionalRegistration ? $professionalRegistration->registration_expiry_date : old('registration_expiry_date') }}"
               required>

        <label for="registration_expiry_date">Expiration Date</label>
        @error('registration_expiry_date')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <div class="form-group">
        <label for="registration_files" class="form-label">Registration Files:</label>
        <input class="form-control @error('registration_files') is-invalid @enderror" type="file"
               name="registration_files[]"
               id="registration_files" multiple/>

        @error('registration_files')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        @if ($professionalRegistration)
            <div class="mt-2">
                <strong>Previously uploaded files:</strong>
                @foreach (json_decode($professionalRegistration->registration_files) as $file)
                    <div>
                        <a href="{{ asset('storage/'. $file) }}" target="_blank">View File: {{ $file }}</a>
                    </div>
                @endforeach
            </div>
        @elseif (old('registration_files'))
            <div class="mt-2">
                <strong>Previously uploaded files:</strong>
                @foreach (old('registration_files') as $file)
                    <div>{{ $file }}</div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="text-center mt-4">
        <button type="button" id="addRegistrationBtn" class="btn btn-primary">Add Another Registration</button>
    </div>

    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Next
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Submit Section 5</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to submit Section 5? Once you submit, all data entered in Section 5 will be
                    saved and cannot be edited or viewed.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Proceed</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // -------------------------------------------------
        // START OF old value management for lists
        document.getElementById('registration_type').value = "{{ $professionalRegistration ? $professionalRegistration->registration_type : old('registration_type') }}";
        // END OF old value management for lists

        // -------------------------------------------------
        //       Start of other inputs

        // Other 1. Degree Level Other Button
        const registrationTypeSelect = document.getElementById('registration_type');
        const otherRegistrationContainer = document.getElementById('otherRegistrationContainer');
        const otherRegistrationInput = document.getElementById('otherRegistration');

        registrationTypeSelect.addEventListener('change', function () {
            if (this.value === 'Other') {
                otherRegistrationContainer.style.display = 'block';
                otherRegistrationInput.required = true;
            } else {
                otherRegistrationContainer.style.display = 'none';
                otherRegistrationInput.required = false;
            }
        });


        let registrationCount = 1;

        const addRegistrationBtn = document.getElementById('addRegistrationBtn');

        addRegistrationBtn.addEventListener('click', function () {
            registrationCount++;

            newRegistrationSection = `
    <hr class="hr hr-blurry"/>
            <div class="col-md-12">
            <h5 class="form-subtitle">Registration ${registrationCount}:</h5>
        </div>

<div class="col-md-3 form-floating">
        <select id="registration_type" name="registration_type"
                class="form-select @error('registration_type') is-invalid @enderror"
                required>
            <option value="">Select Registration Type</option>
            <option value="Medical License">Medical License</option>
            <option value="State Registration">State Registration</option>
            <option value="DEA Registration">DEA Registration</option>
            <option value="Specialty Certifications">Specialty Certifications</option>
            <option value="Other">Other</option>
        </select>

        <label for="registration_type">Registration Type</label>
        @error('registration_type')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>

            <div id="otherRegistrationContainer" class="form-floating col-md-3" style="display: none;">
                <input type="text" placeholder="Other Registration Type" id="otherRegistration" name="otherRegistration"
                       class="form-control
@error('registration_type') is-invalid @enderror"
               value="{{ $professionalRegistration ? $professionalRegistration->otherRegistration : old('otherRegistration') }}">
        <label for="otherRegistration">Other Registration Type</label>
        @error('registration_type')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>

            <div class="col-md-6 form-floating">
                <input type="text" id="registration_title" name="registration_title"
                       placeholder="Enter Registration Title"
                       class="form-control @error('registration_title') is-invalid @enderror"
               value="{{ $professionalRegistration ? $professionalRegistration->registration_title : old('registration_title') }}"
               required>
        <label for="registration_title">Registration Title</label>
        @error('registration_title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>

            <div class="col-md-4 form-floating">
                <input type="text" id="registration_number" name="registration_number"
                       placeholder="Enter Registration Number"
                       class="form-control @error('registration_number') is-invalid @enderror"
               value="{{ $professionalRegistration ? $professionalRegistration->registration_number : old('registration_number') }}"
        >
        <label for="registration_number">Registration Number</label>
        @error('registration_number')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>

            <div class="col-md-4 form-floating">
                <input type="date" id="registration_issue_date" name="registration_issue_date"
                       class="form-control @error('registration_issue_date') is-invalid @enderror"
               value="{{ $professionalRegistration ? $professionalRegistration->registration_issue_date : old('registration_issue_date') }}"
               required>

        <label for="registration_issue_date">Issue Date</label>
        @error('registration_issue_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>

            <div class="col-md-4 form-floating">
                <input type="date" id="registration_expiry_date" name="registration_expiry_date"
                       class="form-control @error('registration_expiry_date') is-invalid @enderror"
               value="{{ $professionalRegistration ? $professionalRegistration->registration_expiry_date : old('registration_expiry_date') }}"
               required>

        <label for="registration_expiry_date">Expiration Date</label>
        @error('registration_expiry_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>


            <div class="form-group">
                <label for="registration_files" class="form-label">Registration Files:</label>
                <input class="form-control @error('registration_files') is-invalid @enderror" type="file"
               name="registration_files[]"
               id="registration_files" multiple/>

        @error('registration_files')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

            @if ($professionalRegistration)
            <div class="mt-2">
                <strong>Previously uploaded files:</strong>
                @foreach (json_decode($professionalRegistration->registration_files) as $file)
            <div>
                <a href="{{ asset('storage/'. $file) }}" target="_blank">View File: {{ $file }}</a>
                    </div>
                @endforeach
            </div>
        @elseif (old('registration_files'))
            <div class="mt-2">
                <strong>Previously uploaded files:</strong>
                @foreach (old('registration_files') as $file)
            <div>{{ $file }}</div>
                @endforeach
            </div>
        @endif
            </div>
`;
            const buttonDiv = addRegistrationBtn.parentNode;
            buttonDiv.insertAdjacentHTML('beforebegin', newRegistrationSection);
        });

    </script>
</form>
