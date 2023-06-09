@yield('section4')
<form class="form-content row g-3" action="{{ route('physician.registration.store')  }}" method="POST"
      enctype="multipart/form-data">
    <input type="hidden" name="section" value="4">
    @csrf
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 42.9%" aria-valuenow="25" aria-valuemin="0"
             aria-valuemax="100"></div>
    </div>

    <h4 class="form-subtitle">Section 4: Board Certifications</h4>
    <hr class="hr hr-blurry"/>

    <div class="col-md-12">
        <h5 class="form-subtitle">Certification 1:</h5>
    </div>


    <div class="col-md-3 form-floating">
        <select id="certification_type" name="certification_type"
                class="form-select @error('certification_type') is-invalid @enderror"
                required>
            <option value="">Select Certification Type</option>
            <option value="Specialty Board Certification">Specialty Board Certification</option>
            <option value="Sub-specialty Board Certification">Sub-specialty Board Certification</option>
            <option value="Advanced Practice Certification">Advanced Practice Certification</option>
            <option value="Surgical Board Certification">Surgical Board Certification</option>
            <option value="Primary Care Board Certification">Primary Care Board Certification</option>
            <option value="Other">Other</option>
        </select>

        <label for="certification_type">Certification Type</label>
        @error('certification_type')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div id="otherCertificationContainer" class="form-floating col-md-3" style="display: none;">
        <input type="text" placeholder="Other Certification Type" id="otherCertification" name="otherCertification"
               class="form-control
                @error('certification_type') is-invalid @enderror"
               value="{{ $boardCertification ? $boardCertification->otherCertification : old('otherCertification') }}">
        <label for="otherCertification">Other Certification Type</label>
        @error('certification_type')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <div class="col-md-6 form-floating">
        <input type="text" id="certification_title" name="certification_title"
               placeholder="Enter Certification Title"
               class="form-control @error('certification_title') is-invalid @enderror"
               value="{{ $boardCertification ? $boardCertification->certification_title : old('certification_title') }}"
               required>
        <label for="degree_title">Certification Title</label>
        @error('certification_title')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 form-floating">
        <input type="text" id="certification_issuing_board" name="certification_issuing_board"
               placeholder="Enter Issuing Board Name"
               class="form-control @error('certification_issuing_board') is-invalid @enderror"
               value="{{ $boardCertification ? $boardCertification->certification_issuing_board : old('certification_issuing_board') }}"
               required>
        <label for="degree_title">Issuing Board</label>
        @error('certification_issuing_board')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 form-floating">
        <input type="date" id="certification_issue_date" name="certification_issue_date"
               class="form-control @error('certification_issue_date') is-invalid @enderror"
               value="{{ $boardCertification ? $boardCertification->certification_issue_date : old('certification_issue_date') }}"
               required>

        <label for="certification_issue_date">Issue Date</label>
        @error('certification_issue_date')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 form-floating">
        <input type="date" id="certification_expiry_date" name="certification_expiry_date"
               class="form-control @error('certification_expiry_date') is-invalid @enderror"
               value="{{ $boardCertification ? $boardCertification->certification_expiry_date : old('certification_expiry_date') }}"
        >

        <label for="certification_expiry_date">Expiration Date</label>
        @error('certification_expiry_date')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 form-floating">
        <input type="text" id="certification_credential_id" name="certification_credential_id"
               placeholder="Enter Credential ID"
               class="form-control @error('certification_credential_id') is-invalid @enderror"
               value="{{ $boardCertification ? $boardCertification->certification_credential_id : old('certification_credential_id') }}"
               >
        <label for="certification_credential_id">Credential ID</label>
        @error('certification_credential_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-8 form-floating">
        <input type="text" id="certification_credential_url" name="certification_credential_url"
               placeholder="Enter Credential URL"
               class="form-control @error('certification_credential_url') is-invalid @enderror"
               value="{{ $boardCertification ? $boardCertification->certification_credential_url : old('certification_credential_url') }}"
        >
        <label for="certification_credential_url">Credential URL</label>
        @error('certification_credential_url')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="certification_files" class="form-label">Certification Files:</label>
        <input class="form-control @error('certification_files') is-invalid @enderror" type="file"
               name="certification_files[]"
               id="certification_files" multiple/>

        @error('certification_files')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        @if ($boardCertification)
            <div class="mt-2">
                <strong>Previously uploaded files:</strong>
                @foreach (json_decode($boardCertification->certification_files) as $file)
                    <div>
                        <a href="{{ asset('storage/'. $file) }}" target="_blank">View File: {{ $file }}</a>
                    </div>
                @endforeach
            </div>
        @elseif (old('certification_files'))
            <div class="mt-2">
                <strong>Previously uploaded files:</strong>
                @foreach (old('certification_files') as $file)
                    <div>{{ $file }}</div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="text-center mt-4">
        <button type="button" id="addCertificationBtn" class="btn btn-primary">Add Another Certification</button>
    </div>

    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Next
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Submit Section 4</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to submit Section 4? Once you submit, all data entered in Section 4 will be
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
            document.getElementById('certification_type').value = "{{ $boardCertification ? $boardCertification->certification_type : old('certification_type') }}";
            // END OF old value management for lists

            // -------------------------------------------------
            //       Start of other inputs

            // Other 1. Degree Level Other Button
            const certificationTypeSelect = document.getElementById('certification_type');
            const otherCertificationContainer = document.getElementById('otherCertificationContainer');
            const otherCertificationInput = document.getElementById('otherCertification');

            certificationTypeSelect.addEventListener('change', function () {
                if (this.value === 'Other') {
                    otherCertificationContainer.style.display = 'block';
                    otherCertificationInput.required = true;
                } else {
                    otherCertificationContainer.style.display = 'none';
                    otherCertificationInput.required = false;
                }
            });


            let certificationCount = 1;

            const addCertificationBtn = document.getElementById('addCertificationBtn');

            addCertificationBtn.addEventListener('click', function () {
                certificationCount++;

                newCertificationSection = `
    <hr class="hr hr-blurry"/>
            <div class="col-md-12">
            <h5 class="form-subtitle">Certification ${certificationCount}:</h5>
        </div>

<div class="col-md-3 form-floating">
        <select id="certification_type"
                class="form-select @error('certification_type') is-invalid @enderror"
                >
            <option value="">Select Certification Type</option>
            <option value="Specialty Board Certification">Specialty Board Certification</option>
            <option value="Sub-specialty Board Certification">Sub-specialty Board Certification</option>
            <option value="Advanced Practice Certification">Advanced Practice Certification</option>
            <option value="Surgical Board Certification">Surgical Board Certification</option>
            <option value="Primary Care Board Certification">Primary Care Board Certification</option>
            <option value="Other">Other</option>
        </select>

        <label for="title">Certification Type</label>
        @error('certification_type')
                <div class="invalid-feedback">{{ $message }}</div>
        @enderror
                </div>

                <div id="otherCertificationContainer" class="form-floating col-md-3" style="display: none;">
                    <input type="text" placeholder="Other Certification Type" id="otherCertification"
                           class="form-control
@error('certification_type') is-invalid @enderror"
               value="{{ $boardCertification ? $boardCertification->otherCertification : old('otherCertification') }}">
        <label for="otherCertification">Other Certification Type</label>
        @error('certification_type')
                <div class="invalid-feedback">{{ $message }}</div>
        @enderror
                </div>


                <div class="col-md-6 form-floating">
                    <input type="text" id="certification_title"
                           placeholder="Enter Certification Title"
                           class="form-control @error('certification_title') is-invalid @enderror"
               value="{{ $boardCertification ? $boardCertification->certification_title : old('certification_title') }}"
               >
        <label for="degree_title">Certification Title</label>
        @error('certification_title')
                <div class="invalid-feedback">{{ $message }}</div>
        @enderror
                </div>

                <div class="col-md-4 form-floating">
                    <input type="text" id="certification_issuing_board"
                           placeholder="Enter Issuing Board Name"
                           class="form-control @error('certification_issuing_board') is-invalid @enderror"
               value="{{ $boardCertification ? $boardCertification->certification_issuing_board : old('certification_issuing_board') }}"
               >
        <label for="degree_title">Issuing Board</label>
        @error('certification_issuing_board')
                <div class="invalid-feedback">{{ $message }}</div>
        @enderror
                </div>

                <div class="col-md-4 form-floating">
                    <input type="date" id="certification_issue_date"
                           class="form-control @error('certification_issue_date') is-invalid @enderror"
               value="{{ $boardCertification ? $boardCertification->certification_issue_date : old('certification_issue_date') }}"
               >

        <label for="certification_issue_date">Issue Date</label>
        @error('certification_issue_date')
                <div class="invalid-feedback">{{ $message }}</div>
        @enderror
                </div>

                <div class="col-md-4 form-floating">
                    <input type="date" id="certification_expiry_date"
                           class="form-control @error('certification_expiry_date') is-invalid @enderror"
               value="{{ $boardCertification ? $boardCertification->certification_expiry_date : old('certification_expiry_date') }}"
        >

        <label for="certification_expiry_date">Expiration Date</label>
        @error('certification_expiry_date')
                <div class="invalid-feedback">{{ $message }}</div>
        @enderror
                </div>

                <div class="col-md-4 form-floating">
                    <input type="text" id="certification_credential_id"
                           placeholder="Enter Credential ID"
                           class="form-control @error('certification_credential_id') is-invalid @enderror"
               value="{{ $boardCertification ? $boardCertification->certification_credential_id : old('certification_credential_id') }}"
               >
        <label for="certification_credential_id">Credential ID</label>
        @error('certification_credential_id')
                <div class="invalid-feedback">{{ $message }}</div>
        @enderror
                </div>

                <div class="col-md-8 form-floating">
                    <input type="text" id="certification_credential_url"
                           placeholder="Enter Credential URL"
                           class="form-control @error('certification_credential_url') is-invalid @enderror"
               value="{{ $boardCertification ? $boardCertification->certification_credential_url : old('certification_credential_url') }}"
        >
        <label for="certification_credential_url">Credential URL</label>
        @error('certification_credential_url')
                <div class="invalid-feedback">{{ $message }}</div>
        @enderror
                </div>

                <div class="form-group">
                    <label for="certification_files" class="form-label">Certification Files:</label>
                    <input class="form-control @error('certification_files') is-invalid @enderror" type="file"

               id="certification_files" multiple/>

        @error('certification_files')
                <div class="invalid-feedback">{{ $message }}</div>
        @enderror

                @if ($boardCertification)
                <div class="mt-2">
                    <strong>Previously uploaded files:</strong>
@foreach (json_decode($boardCertification->certification_files) as $file)
                <div>
                    <a href="{{ asset('storage/'. $file) }}" target="_blank">View File: {{ $file }}</a>
                    </div>
                @endforeach
                </div>
@elseif (old('certification_files'))
                <div class="mt-2">
                    <strong>Previously uploaded files:</strong>
@foreach (old('certification_files') as $file)
                <div>{{ $file }}</div>
                @endforeach
                </div>
@endif
                </div>
`;

            const buttonDiv = addCertificationBtn.parentNode;
            buttonDiv.insertAdjacentHTML('beforebegin', newCertificationSection);
        });

    </script>
</form>
