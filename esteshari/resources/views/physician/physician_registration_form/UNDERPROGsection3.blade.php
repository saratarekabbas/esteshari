@yield('section3')
<form class="form-content row g-3" action="{{ route('physician.registration.store')  }}" method="POST"
      enctype="multipart/form-data">
    <input type="hidden" name="section" value="3">
    @csrf
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 28.6%" aria-valuenow="25" aria-valuemin="0"
             aria-valuemax="100"></div>
    </div>

    <h4 class="form-subtitle">Section 3: Work Experience</h4>
    <hr class="hr hr-blurry"/>

    <div class="col-md-12">
        <h5 class="form-subtitle">Experience 1:</h5>
    </div>

    <div class="col-md-4 form-floating">
        <input type="text" id="job_title" name="work_experiences[0][job_title]"
               placeholder="Enter Job Title"
               class="form-control @error('work_experiences.0.job_title') is-invalid @enderror"
               value="{{ $workExperience ? $workExperience->job_title : old('work_experiences.0.job_title') }}"
               required>
        <label for="degree_title">Job Title</label>
        @error('work_experiences.0.job_title')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <div class="col-md-4 form-floating">
        <input type="text" id="employer_name" name="work_experiences[0][employer_name]"
               placeholder="Enter Employer Name"
               class="form-control  @error('work_experiences.0.employer_name') is-invalid @enderror"
               value="{{ $workExperience ? $workExperience->employer_name : old('work_experiences.0.employer_name') }}"
               required>
        <label for="institute">Employer Name</label>
        @error('work_experiences.0.employer_name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 form-floating">
        <select id="employment_type" name="work_experiences[0][employment_type]"
                class="form-select @error('work_experiences.0.employment_type') is-invalid @enderror" required>
            <option value="">Select Employment Type</option>
            <option value="Full-time">Full-time</option>
            <option value="Part-time">Part-time</option>
            <option value="Self-employed">Self-employed</option>
            <option value="Fellowships">Fellowships</option>
            <option value="Residency">Residency</option>
            <option value="Specialized Training">Specialized Training</option>
            <option value="Research Experience">Research Experience</option>
            <option value="Freelance">Freelance</option>
            <option value="Contract">Contract</option>
            <option value="Internship">Internship</option>
            <option value="Apprenticeship">Apprenticeship</option>
            <option value="Seasonal">Seasonal</option>
        </select>
        <label for="employment_type">Employment Type</label>
        @error('work_experiences.0.employment_type')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 form-floating">
        <input type="date" id="start_date_of_employment" name="work_experiences[0][start_date_of_employment]"
               class="form-control @error('work_experiences.0.start_date_of_employment') is-invalid @enderror"
               value="{{ $workExperience ? $workExperience->start_date_of_employment : old('work_experiences.0.start_date_of_employment') }}"
               required>

        <label for="year_of_graduation">Start Date of Employment</label>
        @error('work_experiences.0.start_date_of_employment')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 form-floating">
        <input type="date" id="end_date_of_employment" name="work_experiences[0][end_date_of_employment]"
               class="form-control @error('work_experiences.0.end_date_of_employment') is-invalid @enderror"
               value="{{ $workExperience ? $workExperience->end_date_of_employment : old('work_experiences.0.end_date_of_employment') }}"
               required>
        <label for="end_date_of_employment">End Date of Employment</label>
        @error('work_experiences.0.end_date_of_employment')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror


        {{--        <div class="form-check">--}}
        {{--            <input type="checkbox" class="form-check-input" id="current_role" name="current_role"--}}
        {{--                   onchange="handleCheckboxChange()">--}}
        {{--            <label class="form-check-label" for="current_role">I am currently working in this role</label>--}}
        {{--            <input type="hidden" id="current_role" name="current_role"--}}
        {{--                   value="{{ $workExperience && $workExperience->current_role ? 1 : 0 }}">--}}

        {{--        </div>--}}


        <div class="form-group">
            <div class="form-check">
                <input type="hidden" name="work_experiences[0][current_role]" value="0">
                <input type="checkbox" class="form-check-input" id="current_role"
                       name="work_experiences[0][current_role]" value="1"
                       {{ $workExperience && $workExperience->current_role ? 'checked' : '' }} onchange="handleCheckboxChange()">
                <label class="form-check-label" for="current_role">I am currently working in this role</label>
            </div>
            @error('work_experiences.0.current_role')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <div class="col-md-4 form-floating">
        <input type="text" id="job_location_city" name="work_experiences[0][job_location_city]"
               placeholder="Enter Job Location - City"
               class="form-control  @error('work_experiences.0.job_location_city') is-invalid @enderror"
               value="{{ $workExperience ? $workExperience->job_location_city : old('work_experiences.0.job_location_city') }}"
               required>
        <label for="institute">Job Location - City</label>
        @error('work_experiences.0.job_location_city')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 form-floating">
        <select id="job_location_country" name="work_experiences[0][job_location_country]"
                class="form-select @error('work_experiences.0.job_location_country') is-invalid @enderror" required>
            <option value="">Select Job Location</option>
            <option value="Afghanistan">Afghanistan</option>
            <option value="Aland Islands">Aland Islands</option>
            <option value="Albania">Albania</option>
            <option value="Algeria">Algeria</option>
            <option value="American Samoa">American Samoa</option>
            <option value="Andorra">Andorra</option>
            <option value="Angola">Angola</option>
            <option value="Anguilla">Anguilla</option>
            <option value="Antarctica">Antarctica</option>
            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
            <option value="Argentina">Argentina</option>
            <option value="Armenia">Armenia</option>
            <option value="Aruba">Aruba</option>
            <option value="Australia">Australia</option>
            <option value="Austria">Austria</option>
            <option value="Azerbaijan">Azerbaijan</option>
            <option value="Bahamas">Bahamas</option>
            <option value="Bahrain">Bahrain</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Barbados">Barbados</option>
            <option value="Belarus">Belarus</option>
            <option value="Belgium">Belgium</option>
            <option value="Belize">Belize</option>
            <option value="Benin">Benin</option>
            <option value="Bermuda">Bermuda</option>
            <option value="Bhutan">Bhutan</option>
            <option value="Bolivia">Bolivia</option>
            <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
            <option value="Botswana">Botswana</option>
            <option value="Bouvet Island">Bouvet Island</option>
            <option value="Brazil">Brazil</option>
            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
            <option value="Brunei Darussalam">Brunei Darussalam</option>
            <option value="Bulgaria">Bulgaria</option>
            <option value="Burkina Faso">Burkina Faso</option>
            <option value="Burundi">Burundi</option>
            <option value="Cambodia">Cambodia</option>
            <option value="Cameroon">Cameroon</option>
            <option value="Canada">Canada</option>
            <option value="Cape Verde">Cape Verde</option>
            <option value="Cayman Islands">Cayman Islands</option>
            <option value="Central African Republic">Central African Republic</option>
            <option value="Chad">Chad</option>
            <option value="Chile">Chile</option>
            <option value="China">China</option>
            <option value="Christmas Island">Christmas Island</option>
            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
            <option value="Colombia">Colombia</option>
            <option value="Comoros">Comoros</option>
            <option value="Congo">Congo</option>
            <option value="Congo, Democratic Republic of the Congo">Congo, Democratic Republic of the Congo
            </option>
            <option value="Cook Islands">Cook Islands</option>
            <option value="Costa Rica">Costa Rica</option>
            <option value="Cote D'Ivoire">Cote D'Ivoire</option>
            <option value="Croatia">Croatia</option>
            <option value="Cuba">Cuba</option>
            <option value="Curacao">Curacao</option>
            <option value="Cyprus">Cyprus</option>
            <option value="Czech Republic">Czech Republic</option>
            <option value="Denmark">Denmark</option>
            <option value="Djibouti">Djibouti</option>
            <option value="Dominica">Dominica</option>
            <option value="Dominican Republic">Dominican Republic</option>
            <option value="Ecuador">Ecuador</option>
            <option value="Egypt">Egypt</option>
            <option value="El Salvador">El Salvador</option>
            <option value="Equatorial Guinea">Equatorial Guinea</option>
            <option value="Eritrea">Eritrea</option>
            <option value="Estonia">Estonia</option>
            <option value="Ethiopia">Ethiopia</option>
            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
            <option value="Faroe Islands">Faroe Islands</option>
            <option value="Fiji">Fiji</option>
            <option value="Finland">Finland</option>
            <option value="France">France</option>
            <option value="French Guiana">French Guiana</option>
            <option value="French Polynesia">French Polynesia</option>
            <option value="French Southern Territories">French Southern Territories</option>
            <option value="Gabon">Gabon</option>
            <option value="Gambia">Gambia</option>
            <option value="Georgia">Georgia</option>
            <option value="Germany">Germany</option>
            <option value="Ghana">Ghana</option>
            <option value="Gibraltar">Gibraltar</option>
            <option value="Greece">Greece</option>
            <option value="Greenland">Greenland</option>
            <option value="Grenada">Grenada</option>
            <option value="Guadeloupe">Guadeloupe</option>
            <option value="Guam">Guam</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Guernsey">Guernsey</option>
            <option value="Guinea">Guinea</option>
            <option value="Guinea-Bissau">Guinea-Bissau</option>
            <option value="Guyana">Guyana</option>
            <option value="Haiti">Haiti</option>
            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
            <option value="Honduras">Honduras</option>
            <option value="Hong Kong">Hong Kong</option>
            <option value="Hungary">Hungary</option>
            <option value="Iceland">Iceland</option>
            <option value="India">India</option>
            <option value="Indonesia">Indonesia</option>
            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
            <option value="Iraq">Iraq</option>
            <option value="Ireland">Ireland</option>
            <option value="Isle of Man">Isle of Man</option>
            <option value="Israel">Israel</option>
            <option value="Italy">Italy</option>
            <option value="Jamaica">Jamaica</option>
            <option value="Japan">Japan</option>
            <option value="Jersey">Jersey</option>
            <option value="Jordan">Jordan</option>
            <option value="Kazakhstan">Kazakhstan</option>
            <option value="Kenya">Kenya</option>
            <option value="Kiribati">Kiribati</option>
            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of
            </option>
            <option value="Korea, Republic of">Korea, Republic of</option>
            <option value="Kosovo">Kosovo</option>
            <option value="Kuwait">Kuwait</option>
            <option value="Kyrgyzstan">Kyrgyzstan</option>
            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
            <option value="Latvia">Latvia</option>
            <option value="Lebanon">Lebanon</option>
            <option value="Lesotho">Lesotho</option>
            <option value="Liberia">Liberia</option>
            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
            <option value="Liechtenstein">Liechtenstein</option>
            <option value="Lithuania">Lithuania</option>
            <option value="Luxembourg">Luxembourg</option>
            <option value="Macao">Macao</option>
            <option value="Macedonia, the Former Yugoslav Republic of">Macedonia, the Former Yugoslav
                Republic
                of
            </option>
            <option value="Madagascar">Madagascar</option>
            <option value="Malawi">Malawi</option>
            <option value="Malaysia">Malaysia</option>
            <option value="Maldives">Maldives</option>
            <option value="Mali">Mali</option>
            <option value="Malta">Malta</option>
            <option value="Marshall Islands">Marshall Islands</option>
            <option value="Martinique">Martinique</option>
            <option value="Mauritania">Mauritania</option>
            <option value="Mauritius">Mauritius</option>
            <option value="Mayotte">Mayotte</option>
            <option value="Mexico">Mexico</option>
            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
            <option value="Moldova, Republic of">Moldova, Republic of</option>
            <option value="Monaco">Monaco</option>
            <option value="Mongolia">Mongolia</option>
            <option value="Montenegro">Montenegro</option>
            <option value="Montserrat">Montserrat</option>
            <option value="Morocco">Morocco</option>
            <option value="Mozambique">Mozambique</option>
            <option value="Myanmar">Myanmar</option>
            <option value="Namibia">Namibia</option>
            <option value="Nauru">Nauru</option>
            <option value="Nepal">Nepal</option>
            <option value="Netherlands">Netherlands</option>
            <option value="Netherlands Antilles">Netherlands Antilles</option>
            <option value="New Caledonia">New Caledonia</option>
            <option value="New Zealand">New Zealand</option>
            <option value="Nicaragua">Nicaragua</option>
            <option value="Niger">Niger</option>
            <option value="Nigeria">Nigeria</option>
            <option value="Niue">Niue</option>
            <option value="Norfolk Island">Norfolk Island</option>
            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
            <option value="Norway">Norway</option>
            <option value="Oman">Oman</option>
            <option value="Pakistan">Pakistan</option>
            <option value="Palau">Palau</option>
            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
            <option value="Panama">Panama</option>
            <option value="Papua New Guinea">Papua New Guinea</option>
            <option value="Paraguay">Paraguay</option>
            <option value="Peru">Peru</option>
            <option value="Philippines">Philippines</option>
            <option value="Pitcairn">Pitcairn</option>
            <option value="Poland">Poland</option>
            <option value="Portugal">Portugal</option>
            <option value="Puerto Rico">Puerto Rico</option>
            <option value="Qatar">Qatar</option>
            <option value="Reunion">Reunion</option>
            <option value="Romania">Romania</option>
            <option value="Russian Federation">Russian Federation</option>
            <option value="Rwanda">Rwanda</option>
            <option value="Saint Barthelemy">Saint Barthelemy</option>
            <option value="Saint Helena">Saint Helena</option>
            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
            <option value="Saint Lucia">Saint Lucia</option>
            <option value="Saint Martin">Saint Martin</option>
            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
            <option value="Samoa">Samoa</option>
            <option value="San Marino">San Marino</option>
            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
            <option value="Saudi Arabia">Saudi Arabia</option>
            <option value="Senegal">Senegal</option>
            <option value="Serbia">Serbia</option>
            <option value="Seychelles">Seychelles</option>
            <option value="Sierra Leone">Sierra Leone</option>
            <option value="Singapore">Singapore</option>
            <option value="Slovakia">Slovakia</option>
            <option value="Slovenia">Slovenia</option>
            <option value="Solomon Islands">Solomon Islands</option>
            <option value="Somalia">Somalia</option>
            <option value="South Africa">South Africa</option>
            <option value="South Georgia and the South Sandwich Islands">South Georgia and the South
                Sandwich
                Islands
            </option>
            <option value="South Sudan">South Sudan</option>
            <option value="Spain">Spain</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="Sudan">Sudan</option>
            <option value="Suriname">Suriname</option>
            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
            <option value="Swaziland">Swaziland</option>
            <option value="Sweden">Sweden</option>
            <option value="Switzerland">Switzerland</option>
            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
            <option value="Taiwan, Province of China">Taiwan, Province of China</option>
            <option value="Tajikistan">Tajikistan</option>
            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
            <option value="Thailand">Thailand</option>
            <option value="Timor-Leste">Timor-Leste</option>
            <option value="Togo">Togo</option>
            <option value="Tokelau">Tokelau</option>
            <option value="Tonga">Tonga</option>
            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
            <option value="Tunisia">Tunisia</option>
            <option value="Turkey">Turkey</option>
            <option value="Turkmenistan">Turkmenistan</option>
            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
            <option value="Tuvalu">Tuvalu</option>
            <option value="Uganda">Uganda</option>
            <option value="Ukraine">Ukraine</option>
            <option value="United Arab Emirates">United Arab Emirates</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="United States">United States</option>
            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands
            </option>
            <option value="Uruguay">Uruguay</option>
            <option value="Uzbekistan">Uzbekistan</option>
            <option value="Vanuatu">Vanuatu</option>
            <option value="Venezuela">Venezuela</option>
            <option value="Viet Nam">Viet Nam</option>
            <option value="Virgin Islands, British">Virgin Islands, British</option>
            <option value="Virgin Islands, U.s.">Virgin Islands, U.s.</option>
            <option value="Wallis and Futuna">Wallis and Futuna</option>
            <option value="Western Sahara">Western Sahara</option>
            <option value="Yemen">Yemen</option>
            <option value="Zambia">Zambia</option>
            <option value="Zimbabwe">Zimbabwe</option>
        </select>
        <label for="job_location_country">Job Location - Country</label>
        @error('work_experiences.0.job_location_country')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 form-floating">
        <select id="location_type" name="work_experiences[0][location_type]"
                class="form-select @error('work_experiences.0.location_type') is-invalid @enderror" required>
            <option value="">Select Job Location</option>
            <option value="On-site">On-site</option>
            <option value="Hybrid">Hybrid</option>
            <option value="Remote">Remote</option>
        </select>
        <label for="institute_location">Location Type</label>
        @error('work_experiences.0.location_type')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <div class="col-12 col-md-12">
        <div class="form-floating">
                        <textarea rows="3" type="text" id="job_description" name="work_experiences[0][job_description]"
                                  class="form-control @error('work_experiences.0.job_description') is-invalid @enderror">{{ $workExperience ? $workExperience->job_description : old('job_description') }}</textarea>
            <label for="job_description">Job Description</label>
            @error('work_experiences.0.job_description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    {{--    <div class="form-group">--}}
    {{--        <label for="job_experience_files" class="form-label">Job Experience Files:</label>--}}
    {{--        <input class="form-control @error('work_experiences.0.job_experience_files') is-invalid @enderror" type="file"--}}
    {{--               name="work_experiences[0][job_experience_files][]"--}}
    {{--               id="job_experience_files" multiple/>--}}
    {{--        @error('work_experiences.0.job_experience_files')--}}
    {{--        <div class="invalid-feedback">{{ $message }}</div>--}}
    {{--        @enderror--}}
    {{--    </div>--}}


    <div class="text-center mt-4">
        <button type="button" id="addExperienceBtn" class="btn btn-primary">Add Another Work Experience</button>
    </div>


    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Next
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Submit Section 3</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to submit Section 3? Once you submit, all data entered in Section 3 will be
                    saved and cannot be edited or viewed.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Proceed</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    // -------------------------------------------------
    // START OF old value management for lists
    document.getElementById('employment_type').value = "{{ $workExperience ? $workExperience->employment_type : old('work_experiences.0.employment_type') }}";
    document.getElementById('job_location_country').value = "{{ $workExperience ? $workExperience->job_location_country : old('work_experiences.0.job_location_country') }}";
    document.getElementById('location_type').value = "{{ $workExperience ? $workExperience->location_type : old('work_experiences.0.location_type') }}";
    // END OF old value management for lists

    // -------------------------------------------------

    // Start of Checkbox Management

    function handleCheckboxChange() {
        var checkbox = document.getElementById('current_role');
        var endDateInput = document.getElementById('end_date_of_employment');
        var currentRoleInput = document.querySelector('input[name="work_experiences[0][current_role]"]');

        if (checkbox.checked) {
            endDateInput.value = ''
            currentRoleInput.value = '1';
            endDateInput.disabled = true;
        } else {
            endDateInput.disabled = false;
            currentRoleInput.value = '0';
        }
    }

    // END OF Checkbox Management

    // -------------------------------------------------
    //Start of New Section Adding


    document.addEventListener("DOMContentLoaded", function () {
        let workExperienceIndex = 1;

        document.getElementById("addExperienceBtn").addEventListener("click", function () {
            var newWorkExperience = document.createElement("div");
            newWorkExperience.innerHTML = `
  <hr class="hr hr-blurry"/>

    <div class="col-md-12">
        <h5 class="form-subtitle">Experience ${workExperienceIndex}:</h5>
    </div>

    <div class="col-md-4 form-floating">
        <input type="text" id="job_title" name="work_experiences[0][job_title]"
               placeholder="Enter Job Title"
               class="form-control @error('work_experiences.0.job_title') is-invalid @enderror"
               value="{{ $workExperience ? $workExperience->job_title : old('work_experiences.0.job_title') }}"
               required>
        <label for="degree_title">Job Title</label>
        @error('work_experiences.0.job_title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>


            <div class="col-md-4 form-floating">
                <input type="text" id="employer_name" name="work_experiences[0][employer_name]"
                       placeholder="Enter Employer Name"
                       class="form-control  @error('work_experiences.0.employer_name') is-invalid @enderror"
               value="{{ $workExperience ? $workExperience->employer_name : old('work_experiences.0.employer_name') }}"
               required>
        <label for="institute">Employer Name</label>
        @error('work_experiences.0.employer_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>

            <div class="col-md-4 form-floating">
                <select id="employment_type" name="work_experiences[0][employment_type]"
                        class="form-select @error('work_experiences.0.employment_type') is-invalid @enderror" required>
            <option value="">Select Employment Type</option>
            <option value="Full-time">Full-time</option>
            <option value="Part-time">Part-time</option>
            <option value="Self-employed">Self-employed</option>
            <option value="Fellowships">Fellowships</option>
            <option value="Residency">Residency</option>
            <option value="Specialized Training">Specialized Training</option>
            <option value="Research Experience">Research Experience</option>
            <option value="Freelance">Freelance</option>
            <option value="Contract">Contract</option>
            <option value="Internship">Internship</option>
            <option value="Apprenticeship">Apprenticeship</option>
            <option value="Seasonal">Seasonal</option>
        </select>
        <label for="employment_type">Employment Type</label>
        @error('work_experiences.0.employment_type')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>

            <div class="col-md-6 form-floating">
                <input type="date" id="start_date_of_employment" name="work_experiences[0][start_date_of_employment]"
                       class="form-control @error('work_experiences.0.start_date_of_employment') is-invalid @enderror"
               value="{{ $workExperience ? $workExperience->start_date_of_employment : old('work_experiences.0.start_date_of_employment') }}"
               required>

        <label for="year_of_graduation">Start Date of Employment</label>
        @error('work_experiences.0.start_date_of_employment')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>

            <div class="col-md-6 form-floating">
                <input type="date" id="end_date_of_employment" name="work_experiences[0][end_date_of_employment]"
                       class="form-control @error('work_experiences.0.end_date_of_employment') is-invalid @enderror"
               value="{{ $workExperience ? $workExperience->end_date_of_employment : old('work_experiences.0.end_date_of_employment') }}"
               required>
        <label for="end_date_of_employment">End Date of Employment</label>
        @error('work_experiences.0.end_date_of_employment')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror


            {{--        <div class="form-check">--}}
            {{--            <input type="checkbox" class="form-check-input" id="current_role" name="current_role"--}}
            {{--                   onchange="handleCheckboxChange()">--}}
            {{--            <label class="form-check-label" for="current_role">I am currently working in this role</label>--}}
            {{--            <input type="hidden" id="current_role" name="current_role"--}}
            {{--                   value="{{ $workExperience && $workExperience->current_role ? 1 : 0 }}">--}}

            {{--        </div>--}}


            <div class="form-group">
                <div class="form-check">
                    <input type="hidden" name="work_experiences[0][current_role]" value="0">
                    <input type="checkbox" class="form-check-input" id="current_role"
                           name="work_experiences[0][current_role]" value="1"
{{ $workExperience && $workExperience->current_role ? 'checked' : '' }} onchange="handleCheckboxChange()">
                <label class="form-check-label" for="current_role">I am currently working in this role</label>
            </div>
            @error('work_experiences.0.current_role')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>

        </div>

        <div class="col-md-4 form-floating">
            <input type="text" id="job_location_city" name="work_experiences[0][job_location_city]"
                   placeholder="Enter Job Location - City"
                   class="form-control  @error('work_experiences.0.job_location_city') is-invalid @enderror"
               value="{{ $workExperience ? $workExperience->job_location_city : old('work_experiences.0.job_location_city') }}"
               required>
        <label for="institute">Job Location - City</label>
        @error('work_experiences.0.job_location_city')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>

            <div class="col-md-4 form-floating">
                <select id="job_location_country" name="work_experiences[0][job_location_country]"
                        class="form-select @error('work_experiences.0.job_location_country') is-invalid @enderror" required>
            <option value="">Select Job Location</option>
            <option value="Afghanistan">Afghanistan</option>
            <option value="Aland Islands">Aland Islands</option>
            <option value="Albania">Albania</option>
            <option value="Algeria">Algeria</option>
            <option value="American Samoa">American Samoa</option>
            <option value="Andorra">Andorra</option>
            <option value="Angola">Angola</option>
            <option value="Anguilla">Anguilla</option>
            <option value="Antarctica">Antarctica</option>
            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
            <option value="Argentina">Argentina</option>
            <option value="Armenia">Armenia</option>
            <option value="Aruba">Aruba</option>
            <option value="Australia">Australia</option>
            <option value="Austria">Austria</option>
            <option value="Azerbaijan">Azerbaijan</option>
            <option value="Bahamas">Bahamas</option>
            <option value="Bahrain">Bahrain</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Barbados">Barbados</option>
            <option value="Belarus">Belarus</option>
            <option value="Belgium">Belgium</option>
            <option value="Belize">Belize</option>
            <option value="Benin">Benin</option>
            <option value="Bermuda">Bermuda</option>
            <option value="Bhutan">Bhutan</option>
            <option value="Bolivia">Bolivia</option>
            <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
            <option value="Botswana">Botswana</option>
            <option value="Bouvet Island">Bouvet Island</option>
            <option value="Brazil">Brazil</option>
            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
            <option value="Brunei Darussalam">Brunei Darussalam</option>
            <option value="Bulgaria">Bulgaria</option>
            <option value="Burkina Faso">Burkina Faso</option>
            <option value="Burundi">Burundi</option>
            <option value="Cambodia">Cambodia</option>
            <option value="Cameroon">Cameroon</option>
            <option value="Canada">Canada</option>
            <option value="Cape Verde">Cape Verde</option>
            <option value="Cayman Islands">Cayman Islands</option>
            <option value="Central African Republic">Central African Republic</option>
            <option value="Chad">Chad</option>
            <option value="Chile">Chile</option>
            <option value="China">China</option>
            <option value="Christmas Island">Christmas Island</option>
            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
            <option value="Colombia">Colombia</option>
            <option value="Comoros">Comoros</option>
            <option value="Congo">Congo</option>
            <option value="Congo, Democratic Republic of the Congo">Congo, Democratic Republic of the Congo
            </option>
            <option value="Cook Islands">Cook Islands</option>
            <option value="Costa Rica">Costa Rica</option>
            <option value="Cote D'Ivoire">Cote D'Ivoire</option>
            <option value="Croatia">Croatia</option>
            <option value="Cuba">Cuba</option>
            <option value="Curacao">Curacao</option>
            <option value="Cyprus">Cyprus</option>
            <option value="Czech Republic">Czech Republic</option>
            <option value="Denmark">Denmark</option>
            <option value="Djibouti">Djibouti</option>
            <option value="Dominica">Dominica</option>
            <option value="Dominican Republic">Dominican Republic</option>
            <option value="Ecuador">Ecuador</option>
            <option value="Egypt">Egypt</option>
            <option value="El Salvador">El Salvador</option>
            <option value="Equatorial Guinea">Equatorial Guinea</option>
            <option value="Eritrea">Eritrea</option>
            <option value="Estonia">Estonia</option>
            <option value="Ethiopia">Ethiopia</option>
            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
            <option value="Faroe Islands">Faroe Islands</option>
            <option value="Fiji">Fiji</option>
            <option value="Finland">Finland</option>
            <option value="France">France</option>
            <option value="French Guiana">French Guiana</option>
            <option value="French Polynesia">French Polynesia</option>
            <option value="French Southern Territories">French Southern Territories</option>
            <option value="Gabon">Gabon</option>
            <option value="Gambia">Gambia</option>
            <option value="Georgia">Georgia</option>
            <option value="Germany">Germany</option>
            <option value="Ghana">Ghana</option>
            <option value="Gibraltar">Gibraltar</option>
            <option value="Greece">Greece</option>
            <option value="Greenland">Greenland</option>
            <option value="Grenada">Grenada</option>
            <option value="Guadeloupe">Guadeloupe</option>
            <option value="Guam">Guam</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Guernsey">Guernsey</option>
            <option value="Guinea">Guinea</option>
            <option value="Guinea-Bissau">Guinea-Bissau</option>
            <option value="Guyana">Guyana</option>
            <option value="Haiti">Haiti</option>
            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
            <option value="Honduras">Honduras</option>
            <option value="Hong Kong">Hong Kong</option>
            <option value="Hungary">Hungary</option>
            <option value="Iceland">Iceland</option>
            <option value="India">India</option>
            <option value="Indonesia">Indonesia</option>
            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
            <option value="Iraq">Iraq</option>
            <option value="Ireland">Ireland</option>
            <option value="Isle of Man">Isle of Man</option>
            <option value="Israel">Israel</option>
            <option value="Italy">Italy</option>
            <option value="Jamaica">Jamaica</option>
            <option value="Japan">Japan</option>
            <option value="Jersey">Jersey</option>
            <option value="Jordan">Jordan</option>
            <option value="Kazakhstan">Kazakhstan</option>
            <option value="Kenya">Kenya</option>
            <option value="Kiribati">Kiribati</option>
            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of
            </option>
            <option value="Korea, Republic of">Korea, Republic of</option>
            <option value="Kosovo">Kosovo</option>
            <option value="Kuwait">Kuwait</option>
            <option value="Kyrgyzstan">Kyrgyzstan</option>
            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
            <option value="Latvia">Latvia</option>
            <option value="Lebanon">Lebanon</option>
            <option value="Lesotho">Lesotho</option>
            <option value="Liberia">Liberia</option>
            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
            <option value="Liechtenstein">Liechtenstein</option>
            <option value="Lithuania">Lithuania</option>
            <option value="Luxembourg">Luxembourg</option>
            <option value="Macao">Macao</option>
            <option value="Macedonia, the Former Yugoslav Republic of">Macedonia, the Former Yugoslav
                Republic
                of
            </option>
            <option value="Madagascar">Madagascar</option>
            <option value="Malawi">Malawi</option>
            <option value="Malaysia">Malaysia</option>
            <option value="Maldives">Maldives</option>
            <option value="Mali">Mali</option>
            <option value="Malta">Malta</option>
            <option value="Marshall Islands">Marshall Islands</option>
            <option value="Martinique">Martinique</option>
            <option value="Mauritania">Mauritania</option>
            <option value="Mauritius">Mauritius</option>
            <option value="Mayotte">Mayotte</option>
            <option value="Mexico">Mexico</option>
            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
            <option value="Moldova, Republic of">Moldova, Republic of</option>
            <option value="Monaco">Monaco</option>
            <option value="Mongolia">Mongolia</option>
            <option value="Montenegro">Montenegro</option>
            <option value="Montserrat">Montserrat</option>
            <option value="Morocco">Morocco</option>
            <option value="Mozambique">Mozambique</option>
            <option value="Myanmar">Myanmar</option>
            <option value="Namibia">Namibia</option>
            <option value="Nauru">Nauru</option>
            <option value="Nepal">Nepal</option>
            <option value="Netherlands">Netherlands</option>
            <option value="Netherlands Antilles">Netherlands Antilles</option>
            <option value="New Caledonia">New Caledonia</option>
            <option value="New Zealand">New Zealand</option>
            <option value="Nicaragua">Nicaragua</option>
            <option value="Niger">Niger</option>
            <option value="Nigeria">Nigeria</option>
            <option value="Niue">Niue</option>
            <option value="Norfolk Island">Norfolk Island</option>
            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
            <option value="Norway">Norway</option>
            <option value="Oman">Oman</option>
            <option value="Pakistan">Pakistan</option>
            <option value="Palau">Palau</option>
            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
            <option value="Panama">Panama</option>
            <option value="Papua New Guinea">Papua New Guinea</option>
            <option value="Paraguay">Paraguay</option>
            <option value="Peru">Peru</option>
            <option value="Philippines">Philippines</option>
            <option value="Pitcairn">Pitcairn</option>
            <option value="Poland">Poland</option>
            <option value="Portugal">Portugal</option>
            <option value="Puerto Rico">Puerto Rico</option>
            <option value="Qatar">Qatar</option>
            <option value="Reunion">Reunion</option>
            <option value="Romania">Romania</option>
            <option value="Russian Federation">Russian Federation</option>
            <option value="Rwanda">Rwanda</option>
            <option value="Saint Barthelemy">Saint Barthelemy</option>
            <option value="Saint Helena">Saint Helena</option>
            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
            <option value="Saint Lucia">Saint Lucia</option>
            <option value="Saint Martin">Saint Martin</option>
            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
            <option value="Samoa">Samoa</option>
            <option value="San Marino">San Marino</option>
            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
            <option value="Saudi Arabia">Saudi Arabia</option>
            <option value="Senegal">Senegal</option>
            <option value="Serbia">Serbia</option>
            <option value="Seychelles">Seychelles</option>
            <option value="Sierra Leone">Sierra Leone</option>
            <option value="Singapore">Singapore</option>
            <option value="Slovakia">Slovakia</option>
            <option value="Slovenia">Slovenia</option>
            <option value="Solomon Islands">Solomon Islands</option>
            <option value="Somalia">Somalia</option>
            <option value="South Africa">South Africa</option>
            <option value="South Georgia and the South Sandwich Islands">South Georgia and the South
                Sandwich
                Islands
            </option>
            <option value="South Sudan">South Sudan</option>
            <option value="Spain">Spain</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="Sudan">Sudan</option>
            <option value="Suriname">Suriname</option>
            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
            <option value="Swaziland">Swaziland</option>
            <option value="Sweden">Sweden</option>
            <option value="Switzerland">Switzerland</option>
            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
            <option value="Taiwan, Province of China">Taiwan, Province of China</option>
            <option value="Tajikistan">Tajikistan</option>
            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
            <option value="Thailand">Thailand</option>
            <option value="Timor-Leste">Timor-Leste</option>
            <option value="Togo">Togo</option>
            <option value="Tokelau">Tokelau</option>
            <option value="Tonga">Tonga</option>
            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
            <option value="Tunisia">Tunisia</option>
            <option value="Turkey">Turkey</option>
            <option value="Turkmenistan">Turkmenistan</option>
            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
            <option value="Tuvalu">Tuvalu</option>
            <option value="Uganda">Uganda</option>
            <option value="Ukraine">Ukraine</option>
            <option value="United Arab Emirates">United Arab Emirates</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="United States">United States</option>
            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands
            </option>
            <option value="Uruguay">Uruguay</option>
            <option value="Uzbekistan">Uzbekistan</option>
            <option value="Vanuatu">Vanuatu</option>
            <option value="Venezuela">Venezuela</option>
            <option value="Viet Nam">Viet Nam</option>
            <option value="Virgin Islands, British">Virgin Islands, British</option>
            <option value="Virgin Islands, U.s.">Virgin Islands, U.s.</option>
            <option value="Wallis and Futuna">Wallis and Futuna</option>
            <option value="Western Sahara">Western Sahara</option>
            <option value="Yemen">Yemen</option>
            <option value="Zambia">Zambia</option>
            <option value="Zimbabwe">Zimbabwe</option>
        </select>
        <label for="job_location_country">Job Location - Country</label>
        @error('work_experiences.0.job_location_country')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>

            <div class="col-md-4 form-floating">
                <select id="location_type" name="work_experiences[0][location_type]"
                        class="form-select @error('work_experiences.0.location_type') is-invalid @enderror" required>
            <option value="">Select Job Location</option>
            <option value="On-site">On-site</option>
            <option value="Hybrid">Hybrid</option>
            <option value="Remote">Remote</option>
        </select>
        <label for="institute_location">Location Type</label>
        @error('work_experiences.0.location_type')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            </div>


            <div class="col-12 col-md-12">
                <div class="form-floating">
                                <textarea rows="3" type="text" id="job_description" name="work_experiences[0][job_description]"
                                          class="form-control @error('work_experiences.0.job_description') is-invalid @enderror">{{ $workExperience ? $workExperience->job_description : old('job_description') }}</textarea>
            <label for="job_description">Job Description</label>
            @error('work_experiences.0.job_description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
        </div>`;
            workExperienceIndex++;

            this.parentNode.insertBefore(newWorkExperience, this);
        });
    });

</script>
