@yield('section2')
<form class="form-content row g-3" action="{{ route('physician.registration.store')  }}" method="POST"
      enctype="multipart/form-data">
    <input type="hidden" name="section" value="2">
    @csrf
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 14.3%" aria-valuenow="25" aria-valuemin="0"
             aria-valuemax="100"></div>
    </div>

    <h4 class="form-subtitle">Section 2: Educational Qualifications</h4>
    <hr class="hr hr-blurry"/>

    <div class="col-md-12">
        <h5 class="form-subtitle">Qualification 1:</h5>
    </div>
    <div class="col-md-3 form-floating">
        <select id="degree_level" name="degree_level"
                class="form-select @error('degree_level') is-invalid @enderror"
                required>
            <option value="">Select degree</option>
            <option value="Dr">Diploma</option>
            <option value="Prof">Associate Degree</option>
            <option value="MD">Bachelor's Degree</option>
            <option value="Other">Other</option>
        </select>

        <label for="title">Degree Level</label>
        @error('degree_level')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div id="otherDegreeContainer" class="form-floating col-md-3" style="display: none;">
        <input type="text" placeholder="Other Degree Level" id="otherDegree" name="otherDegree"
               class="form-control
                @error('degree_level') is-invalid @enderror"
               value="{{ $educationalQualification ? $educationalQualification->otherDegree : old('otherDegree') }}">
        <label for="otherDegree">Other Degree Level</label>
        @error('degree_level')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <div class="col-md-6 form-floating">
        <input type="text" id="degree_title" name="degree_title"
               placeholder="Enter Degree Title"
               class="form-control @error('degree_title') is-invalid @enderror"
               value="{{ $educationalQualification ? $educationalQualification->degree_title : old('degree_title') }}"
               required>
        <label for="degree_title">Degree Title</label>
        @error('degree_title')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 form-floating">
        <input type="text" id="institute" name="institute"
               placeholder="Enter Institute Title"
               class="form-control  @error('institute') is-invalid @enderror"
               value="{{ $educationalQualification ? $educationalQualification->institute : old('institute') }}"
               required>
        <label for="institute">Institute/University Name</label>
        @error('institute')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 form-floating">
        <select id="institute_location" name="institute_location"
                class="form-select @error('institute_location') is-invalid @enderror" required>
            <option value="">Select Institute Location</option>
            <option value="Afghanistan">Afghanistan</option>
            <option value="Aland Islands">Aland Islands</option>
            <option value="Western Sahara">Western Sahara</option>
            <option value="Yemen">Yemen</option>
            <option value="Zambia">Zambia</option>
            <option value="Zimbabwe">Zimbabwe</option>
        </select>
        <label for="institute_location">Institute/University Location</label>
        @error('institute_location')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 form-floating">
        <input type="date" id="year_of_graduation" name="year_of_graduation"
               class="form-control @error('year_of_graduation') is-invalid @enderror"
               value="{{ $educationalQualification ? $educationalQualification->year_of_graduation : old('year_of_graduation') }}"
               required>

        <label for="year_of_graduation">Year of Graduation</label>
        @error('year_of_graduation')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="medical_degree_files" class="form-label">Medical Degree Files (e.g., Certificate, Academic
            Transcript, etc.):</label>
        <input class="form-control @error('medical_degree_files') is-invalid @enderror" type="file"
               name="medical_degree_files[]"
               id="medical_degree_files" multiple/>

        @error('medical_degree_files')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        @if ($educationalQualification)
            <div class="mt-2">
                <strong>Previously uploaded files:</strong>
                @foreach (json_decode($educationalQualification->medical_degree_files) as $file)
                    <div>
                        <a href="{{ asset('storage/'. $file) }}" target="_blank">View File: {{ $file }}</a>
                    </div>
                @endforeach
            </div>
        @elseif (old('medical_degree_files'))
            <div class="mt-2">
                <strong>Previously uploaded files:</strong>
                @foreach (old('medical_degree_files') as $file)
                    <div>{{ $file }}</div>
                @endforeach
            </div>
        @endif
    </div>


    <div class="col-md-12">
        <h5 class="form-subtitle">Honors, Awards, Recognitions and Distinctions:</h5>
    </div>

    <ol class="list-group list-group-numbered">
        <li class="list-group-item">
            <div class="row align-items-center">
                <div class="col-12 col-md-2">
                    <div class="form-floating">
                        <select id="award_type" name="award_type"
                                class="form-select @error('award_type') is-invalid @enderror">
                            <option disabled selected>Select Award</option>
                            <optgroup label="1. Academic Honors">
                                <option value="Dean's List">Dean's List</option>
                                <option value="Character Award">Character Award</option>
                                <option value="Student of the Year">Student of the Year</option>
                            </optgroup>
                            <option value="Other">Other</option>
                        </select>

                        <label for="award_type">Award Type</label>
                        @error('award_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div id="otherAwardTypeContainer" class="form-floating col-md-2" style="display: none;">
                    <input type="text" placeholder="Other Award Type" id="otherAwardType" name="otherAwardType"
                           class="form-control"
                           value="{{ $educationalQualification ? $educationalQualification->otherAwardType : old('otherAwardType') }}">
                    <label for="otherTitle">Other Award Type</label>
                    @error('award_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-md-4">
                    <div class="form-floating">
                        <input type="text" id="award_title" name="award_title"
                               placeholder="Award Title"
                               class="form-control @error('award_title') is-invalid @enderror"
                               value="{{ $educationalQualification ? $educationalQualification->award_title : old('award_title') }}">
                        <label for="award_title">Award Title</label>
                        @error('award_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="form-floating">
                        <input type="date" id="date_of_award" name="date_of_award"
                               class="form-control @error('date_of_award') is-invalid @enderror"
                               value="{{ $educationalQualification ? $educationalQualification->date_of_award : old('date_of_award') }}">
                        <label for="date_of_birth">Date of Award</label>
                        @error('date_of_award')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-12">
                    <div class="form-floating">
                        <textarea rows="3" type="text" id="award_description" name="award_description"
                                  class="form-control @error('award_description') is-invalid @enderror">{{ $educationalQualification ? $educationalQualification->award_description : old('award_description') }}</textarea>
                        <label for="award_description">Award Description</label>
                        @error('award_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </li>
        <div class="d-grid gap-2 col-3 mx-auto">
            <button class="btn btn-secondary" id="addAwardBtn" type="button">Add Another Award</button>
        </div>
    </ol>


    <div class="text-center mt-4">
        <button type="button" id="addQualificationBtn" class="btn btn-primary">Add Another Qualification</button>
    </div>

    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Next
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Submit Section 2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to submit Section 2? Once you submit, all data entered in Section 2 will be
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
        document.getElementById('degree_level').value = "{{ $educationalQualification ? $educationalQualification->degree_level : old('degree_level') }}";
        document.getElementById('institute_location').value = "{{ $educationalQualification ? $educationalQualification->institute_location : old('institute_location') }}";
        document.getElementById('award_type').value = "{{ $educationalQualification ? $educationalQualification->award_type : old('award_type') }}";


        // END OF old value management for lists

        // -------------------------------------------------
        //       Start of other inputs

        // Other 1. Degree Level Other Button
        const titleSelect = document.getElementById('degree_level');
        const otherTitleContainer = document.getElementById('otherDegreeContainer');
        const otherTitleInput = document.getElementById('otherDegree');

        titleSelect.addEventListener('change', function () {
            if (this.value === 'Other') {
                otherTitleContainer.style.display = 'block';
                otherTitleInput.required = true;
            } else {
                otherTitleContainer.style.display = 'none';
                otherTitleInput.required = false;
            }
        });

        // Other 2. Award Type Other Button
        const awardTypeSelect = document.getElementById('award_type');
        const otherAwardTypeContainer = document.getElementById('otherAwardTypeContainer');
        const otherAwardTypeInput = document.getElementById('otherAwardType');

        awardTypeSelect.addEventListener('change', function () {
            if (this.value === 'Other') {
                otherAwardTypeContainer.style.display = 'block';
                otherAwardTypeInput.required = true;
            } else {
                otherAwardTypeContainer.style.display = 'none';
                otherAwardTypeInput.required = false;
            }
        });

        //       End of other Buttons
        
    </script>
</form>

