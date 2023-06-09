@yield('section7')
<form class="form-content row g-3" action="{{ route('physician.registration.store')  }}" method="POST"
      enctype="multipart/form-data">
    <input type="hidden" name="section" value="7">
    @csrf
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 85.8%" aria-valuenow="25" aria-valuemin="0"
             aria-valuemax="100"></div>
    </div>

    <h4 class="form-subtitle">Section 7: Language Qualifications</h4>

    <div class="col-md-12">
        <h5 class="form-subtitle">Language Qualification 1:</h5>
    </div>


    <div class="col-md-3 form-floating">
        <select id="qualification_type" name="qualification_type"
                class="form-select @error('qualification_type') is-invalid @enderror">
            <option value="">Select qualification type</option>
            <option value="TOEFL (Test of English as a Foreign Language)">TOEFL (Test of English as a Foreign
                Language)
            </option>
            <option value="IELTS (International English Language Testing System)">IELTS (International English Language
                Testing System)
            </option>
            <option value="Cambridge English Qualifications">Cambridge English Qualifications</option>
            <option value="DELF (Diplôme d'Études en Langue Française)">DELF (Diplôme d'Études en Langue Française)
            </option>
            <option value="DELE (Diplomas de Español como Lengua Extranjera)">DELE (Diplomas de Español como Lengua
                Extranjera)
            </option>
            <option value="Goethe-Zertifikat">Goethe-Zertifikat</option>
            <option value="JLPT (Japanese Language Proficiency Test)">JLPT (Japanese Language Proficiency Test)</option>
            <option value="HSK (Hanyu Shuiping Kaoshi)">HSK (Hanyu Shuiping Kaoshi)</option>
            <option value="CELPIP (Canadian English Language Proficiency Index Program)">CELPIP (Canadian English
                Language Proficiency Index Program)
            </option>
            <option value="PTE Academic (Pearson Test of English Academic)">PTE Academic (Pearson Test of English
                Academic)
            </option>
            <option value="Other">Other</option>
        </select>

        <label for="qualification_type">Language Qualification Type</label>
        @error('qualification_type')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div id="otherQualificationTypeContainer" class="form-floating col-md-3" style="display: none;">
        <input type="text" placeholder="Other Qualification Type" id="otherQualificationType"
               name="otherQualificationType"
               class="form-control
                @error('qualification_type') is-invalid @enderror"
               value="{{ $languageQualification ? $languageQualification->otherQualificationType : old('otherQualificationType') }}">
        <label for="otherQualificationType">Other Qualification Type</label>
        @error('qualification_type')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 form-floating">
        <input type="text" id="qualification_title" name="qualification_title"
               placeholder="Enter Language Qualification Title"
               class="form-control @error('qualification_title') is-invalid @enderror"
               value="{{ $languageQualification ? $languageQualification->qualification_title : old('qualification_title') }}">
        <label for="qualification_title">Language Qualification Title</label>
        @error('qualification_title')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 form-floating">
        <input type="text" id="qualification_title" name="qualification_title"
               placeholder="Enter Language Qualification Issuing Board"
               class="form-control @error('qualification_issuing_board') is-invalid @enderror"
               value="{{ $languageQualification ? $languageQualification->qualification_issuing_board : old('qualification_issuing_board') }}">
        <label for="qualification_title">Language Qualification Issuing Board</label>
        @error('qualification_title')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 form-floating">
        <input type="date" id="qualification_issue_date" name="qualification_issue_date"
               class="form-control @error('qualification_issue_date') is-invalid @enderror"
               value="{{ $languageQualification ? $languageQualification->qualification_issue_date : old('qualification_issue_date') }}">
        <label for="qualification_issue_date">Issue Date</label>
        @error('qualification_issue_date')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 form-floating">
        <input type="date" id="qualification_expiry_date" name="qualification_expiry_date"
               class="form-control @error('qualification_expiry_date') is-invalid @enderror"
               value="{{ $languageQualification ? $languageQualification->qualification_expiry_date : old('qualification_expiry_date') }}">
        <label for="qualification_expiry_date">Expiration Date</label>
        @error('qualification_expiry_date')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="qualification_files" class="form-label">Language Qualification Files:</label>
        <input class="form-control @error('qualification_files') is-invalid @enderror" type="file"
               name="qualification_files[]"
               id="qualification_files" multiple/>

        @error('qualification_files')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        @if ($languageQualification)
            <div class="mt-2">
                <strong>Previously uploaded files:</strong>
                @foreach (json_decode($languageQualification->qualification_files) as $file)
                    <div>
                        <a href="{{ asset('storage/'. $file) }}" target="_blank">View File: {{ $file }}</a>
                    </div>
                @endforeach
            </div>
        @elseif (old('qualification_files'))
            <div class="mt-2">
                <strong>Previously uploaded files:</strong>
                @foreach (old('qualification_files') as $file)
                    <div>{{ $file }}</div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="text-center mt-4">
        <button type="button" id="addQualificationBtn" class="btn btn-primary">Add Another Language Qualification
        </button>
    </div>


    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Save & Proceed
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Submit Section 7</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to submit Section 7? Once you submit, all data entered in Section 7 will be
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
        document.getElementById('qualification_type').value = "{{ $languageQualification ? $languageQualification->qualification_type : old('qualification_type') }}";
        // END OF old value management for lists

        // -------------------------------------------------
        //       Start of other inputs

        // Other 1. Degree Level Other Button
        const qualificationTypeSelect = document.getElementById('qualification_type');
        const otherQualificationTypeContainer = document.getElementById('otherQualificationTypeContainer');
        const otherQualificationTypeInput = document.getElementById('otherQualificationType');

        qualificationTypeSelect.addEventListener('change', function () {
            if (this.value === 'Other') {
                otherQualificationTypeContainer.style.display = 'block';
                otherQualificationTypeInput.required = true;
            } else {
                otherQualificationTypeContainer.style.display = 'none';
                otherQualificationTypeInput.required = false;
            }
        });


        let qualificationCount = 1;

        const addQualificationBtn = document.getElementById('addQualificationBtn');

        addQualificationBtn.addEventListener('click', function () {
            qualificationCount++;

            newQualificationSection = `
    <hr class="hr hr-blurry"/>
            <div class="col-md-12">
            <h5 class="form-subtitle">Language Qualification ${qualificationCount}:</h5>
        </div>

    <div class="col-md-3 form-floating">
        <select id="qualification_type"
                class="form-select @error('qualification_type') is-invalid @enderror">
            <option value="">Select qualification type</option>
            <option value="TOEFL (Test of English as a Foreign Language)">TOEFL (Test of English as a Foreign
                Language)
            </option>
            <option value="IELTS (International English Language Testing System)">IELTS (International English Language
                Testing System)
            </option>
            <option value="Cambridge English Qualifications">Cambridge English Qualifications</option>
            <option value="DELF (Diplôme d'Études en Langue Française)">DELF (Diplôme d'Études en Langue Française)
            </option>
            <option value="DELE (Diplomas de Español como Lengua Extranjera)">DELE (Diplomas de Español como Lengua
                Extranjera)
            </option>
            <option value="Goethe-Zertifikat">Goethe-Zertifikat</option>
            <option value="JLPT (Japanese Language Proficiency Test)">JLPT (Japanese Language Proficiency Test)</option>
            <option value="HSK (Hanyu Shuiping Kaoshi)">HSK (Hanyu Shuiping Kaoshi)</option>
            <option value="CELPIP (Canadian English Language Proficiency Index Program)">CELPIP (Canadian English
                Language Proficiency Index Program)
            </option>
            <option value="PTE Academic (Pearson Test of English Academic)">PTE Academic (Pearson Test of English
                Academic)
            </option>
            <option value="Other">Other</option>
        </select>

        <label for="qualification_type">Language Qualification Type</label>
        @error('qualification_type')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>

            <div id="otherQualificationTypeContainer" class="form-floating col-md-3" style="display: none;">
                <input type="text" placeholder="Other Qualification Type" id="otherQualificationType"

                       class="form-control
@error('qualification_type') is-invalid @enderror"
               value="{{ $languageQualification ? $languageQualification->otherQualificationType : old('otherQualificationType') }}">
        <label for="otherQualificationType">Other Qualification Type</label>
        @error('qualification_type')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>

            <div class="col-md-6 form-floating">
                <input type="text" id="qualification_title"
                       placeholder="Enter Language Qualification Title"
                       class="form-control @error('qualification_title') is-invalid @enderror"
               value="{{ $languageQualification ? $languageQualification->qualification_title : old('qualification_title') }}">
        <label for="qualification_title">Language Qualification Title</label>
        @error('qualification_title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>

            <div class="col-md-6 form-floating">
                <input type="date" id="qualification_issue_date"
                       class="form-control @error('qualification_issue_date') is-invalid @enderror"
               value="{{ $languageQualification ? $languageQualification->qualification_issue_date : old('qualification_issue_date') }}">
        <label for="qualification_issue_date">Issue Date</label>
        @error('qualification_issue_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>

            <div class="col-md-6 form-floating">
                <input type="date" id="qualification_expiry_date"
                       class="form-control @error('qualification_expiry_date') is-invalid @enderror"
               value="{{ $languageQualification ? $languageQualification->qualification_expiry_date : old('qualification_expiry_date') }}">
        <label for="qualification_expiry_date">Expiration Date</label>
        @error('qualification_expiry_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>

            <div class="form-group">
                <label for="qualification_files" class="form-label">Language Qualification Files:</label>
                <input class="form-control @error('qualification_files') is-invalid @enderror" type="file"

               id="qualification_files" multiple/>

        @error('qualification_files')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

            @if ($languageQualification)
            <div class="mt-2">
                <strong>Previously uploaded files:</strong>
                @foreach (json_decode($languageQualification->qualification_files) as $file)
            <div>
                <a href="{{ asset('storage/'. $file) }}" target="_blank">View File: {{ $file }}</a>
                    </div>
                @endforeach
            </div>
        @elseif (old('qualification_files'))
            <div class="mt-2">
                <strong>Previously uploaded files:</strong>
                @foreach (old('qualification_files') as $file)
            <div>{{ $file }}</div>
                @endforeach
            </div>
        @endif
            </div>

`;
            const buttonDiv = addQualificationBtn.parentNode;
            buttonDiv.insertAdjacentHTML('beforebegin', newQualificationSection);
        });


    </script>
</form>
