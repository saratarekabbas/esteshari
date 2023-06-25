@yield('section8')
<form class="form-content row g-3" action="{{ route('physician.registration.store')  }}" method="POST"
      enctype="multipart/form-data">
    <input type="hidden" name="section" value="8">
    @csrf
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0"
             aria-valuemax="100"></div>
    </div>

    <h4 class="form-subtitle">Section 8: Insurance</h4>

    <div class="col-md-12">
        <h5 class="form-subtitle">Insurance 1:</h5>
    </div>

    <div class="col-md-3 form-floating">
        <select id="insurance_type" name="insurance_type"
                class="form-select @error('insurance_type') is-invalid @enderror"
                >
            <option value="">Select Insurance Type</option>
            <option value="Physician Malpractice Insurance">Physician Malpractice Insurance</option>
            <option value="General Liability Insurance">General Liability Insurance</option>
            <option value="Professional Indemnity Insurance">Professional Indemnity Insurance</option>
            <option value="Cyber Liability Insurance">Cyber Liability Insurance</option>
            <option value="Business Interruption Insurance">Business Interruption Insurance</option>
            <option value="Workers' Compensation Insurance">Workers' Compensation Insurance</option>
            <option value="Other">Other</option>
        </select>

        <label for="insurance_type">Insurance Type</label>
        @error('insurance_type')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div id="otherInsuranceContainer" class="form-floating col-md-3" style="display: none;">
        <input type="text" placeholder="Other Insurance Type" id="otherInsurance" name="otherInsurance"
               class="form-control
                @error('insurance_type') is-invalid @enderror"
               value="{{ $insurance ? $insurance->otherInsurance : old('otherInsurance') }}">
        <label for="otherInsurance">Other Insurance Type</label>
        @error('insurance_type')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 form-floating">
        <input type="text" id="insurance_title" name="insurance_title"
               placeholder="Enter Insurance Title"
               class="form-control @error('insurance_title') is-invalid @enderror"
               value="{{ $insurance ? $insurance->insurance_title : old('insurance_title') }}"
               >
        <label for="insurance_title">Insurance Title</label>
        @error('insurance_title')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <div class="col-md-6 form-floating">
        <input type="text" id="insurance_number" name="insurance_number"
               placeholder="Enter Insurance Number"
               class="form-control @error('insurance_number') is-invalid @enderror"
               value="{{ $insurance ? $insurance->insurance_number : old('insurance_number') }}"
               >
        <label for="insurance_number">Insurance Number</label>
        @error('insurance_number')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 form-floating">
        <input type="text" id="insurance_provider" name="insurance_provider"
               placeholder="Enter Insurance Provider's Name"
               class="form-control @error('insurance_provider') is-invalid @enderror"
               value="{{ $insurance ? $insurance->insurance_provider : old('insurance_provider') }}">
        <label for="insurance_provider">Insurance Provider</label>
        @error('insurance_provider')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 form-floating">
        <input type="date" id="insurance_issue_date" name="insurance_issue_date"
               class="form-control @error('insurance_issue_date') is-invalid @enderror"
               value="{{ $insurance ? $insurance->insurance_issue_date : old('insurance_issue_date') }}"
               >

        <label for="insurance_issue_date">Issue Date</label>
        @error('insurance_issue_date')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 form-floating">
        <input type="date" id="insurance_expiry_date" name="insurance_expiry_date"
               class="form-control @error('insurance_expiry_date') is-invalid @enderror"
               value="{{ $insurance ? $insurance->insurance_expiry_date : old('insurance_expiry_date') }}"
               >

        <label for="insurance_expiry_date">Expiration Date</label>
        @error('insurance_expiry_date')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <div class="form-group">
        <label for="insurance_files" class="form-label">Insurance Files:</label>
        <input class="form-control @error('insurance_files') is-invalid @enderror" type="file"
               name="insurance_files[]"
               id="insurance_files" multiple/>

        @error('insurance_files')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        @if ($insurance)
            <div class="mt-2">
                <strong>Previously uploaded files:</strong>
                @foreach (json_decode($insurance->insurance_files) as $file)
                    <div>
                        <a href="{{ asset('storage/'. $file) }}" target="_blank">View File: {{ $file }}</a>
                    </div>
                @endforeach
            </div>
        @elseif (old('insurance_files'))
            <div class="mt-2">
                <strong>Previously uploaded files:</strong>
                @foreach (old('insurance_files') as $file)
                    <div>{{ $file }}</div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="text-center mt-4">
        <button type="button" id="addInsuranceBtn" class="btn btn-primary">Add Another Insurance</button>
    </div>


    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Submit
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Submit Physician Registration Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to submit you Physician Registration Form? Once the form is submitted, the
                    data entered in all sections will be submitted and can no longer be edited or viewed.
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
        document.getElementById('insurance_type').value = "{{ $insurance ? $insurance->insurance_type : old('insurance_type') }}";
        // END OF old value management for lists

        // -------------------------------------------------
        //       Start of other inputs

        // Other 1. Degree Level Other Button
        const insuranceTypeSelect = document.getElementById('insurance_type');
        const otherInsuranceContainer = document.getElementById('otherInsuranceContainer');
        const otherInsuranceInput = document.getElementById('otherInsurance');

        insuranceTypeSelect.addEventListener('change', function () {
            if (this.value === 'Other') {
                otherInsuranceContainer.style.display = 'block';
                // otherInsuranceInput.required = true;
            } else {
                otherInsuranceContainer.style.display = 'none';
                // otherInsuranceInput.required = false;
            }
        });


        let insuranceCount = 1;

        const addInsuranceBtn = document.getElementById('addInsuranceBtn');

        addInsuranceBtn.addEventListener('click', function () {
            insuranceCount++;

            newInsuranceSection = `
    <hr class="hr hr-blurry"/>
            <div class="col-md-12">
            <h5 class="form-subtitle">Insurance ${insuranceCount}:</h5>
        </div>

<div class="col-md-3 form-floating">
        <select id="insurance_type"
                class="form-select @error('insurance_type') is-invalid @enderror"
                >
            <option value="">Select Insurance Type</option>
            <option value="Medical License">Medical License</option>
            <option value="Other">Other</option>
        </select>

        <label for="insurance_type">Insurance Type</label>
        @error('insurance_type')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>

            <div id="otherInsuranceContainer" class="form-floating col-md-3" style="display: none;">
                <input type="text" placeholder="Other Insurance Type" id="otherInsurance"
                       class="form-control
@error('insurance_type') is-invalid @enderror"
               value="{{ $insurance ? $insurance->otherInsurance : old('otherInsurance') }}">
        <label for="otherInsurance">Other Insurance Type</label>
        @error('insurance_type')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>

            <div class="col-md-6 form-floating">
                <input type="text" id="insurance_title"
                       placeholder="Enter Insurance Title"
                       class="form-control @error('insurance_title') is-invalid @enderror"
               value="{{ $insurance ? $insurance->insurance_title : old('insurance_title') }}"
               >
        <label for="insurance_title">insurance Title</label>
        @error('insurance_title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>

            <div class="col-md-4 form-floating">
                <input type="text" id="insurance_number"
                       placeholder="Enter insurance Number"
                       class="form-control @error('insurance_number') is-invalid @enderror"
               value="{{ $insurance ? $insurance->insurance_number : old('insurance_number') }}"
        >
        <label for="insurance_number">insurance Number</label>
        @error('insurance_number')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>

            <div class="col-md-4 form-floating">
                <input type="date" id="insurance_issue_date"
                       class="form-control @error('insurance_issue_date') is-invalid @enderror"
               value="{{ $insurance ? $insurance->insurance_issue_date : old('insurance_issue_date') }}"
               >

        <label for="insurance_issue_date">Issue Date</label>
        @error('insurance_issue_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>

            <div class="col-md-4 form-floating">
                <input type="date" id="insurance_expiry_date"
                       class="form-control @error('insurance_expiry_date') is-invalid @enderror"
               value="{{ $insurance ? $insurance->insurance_expiry_date : old('insurance_expiry_date') }}"
               >

        <label for="insurance_expiry_date">Expiration Date</label>
        @error('insurance_expiry_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>


            <div class="form-group">
                <label for="insurance_files" class="form-label">insurance Files:</label>
                <input class="form-control @error('insurance_files') is-invalid @enderror" type="file"

               id="insurance_files" multiple/>

        @error('insurance_files')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

            @if ($insurance)
            <div class="mt-2">
                <strong>Previously uploaded files:</strong>
                @foreach (json_decode($insurance->insurance_files) as $file)
            <div>
                <a href="{{ asset('storage/'. $file) }}" target="_blank">View File: {{ $file }}</a>
                    </div>
                @endforeach
            </div>
        @elseif (old('insurance_files'))
            <div class="mt-2">
                <strong>Previously uploaded files:</strong>
                @foreach (old('insurance_files') as $file)
            <div>{{ $file }}</div>
                @endforeach
            </div>
        @endif
            </div>`;
            const buttonDiv = addInsuranceBtn.parentNode;
            buttonDiv.insertAdjacentHTML('beforebegin', newInsuranceSection);
        });

    </script>
</form>
