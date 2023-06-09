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
            <option value="DO">Master's Degree</option>
            <option value="MBBS">Doctor of Medicine (MD)</option>
            <option value="BSc">Doctor of Osteopathic Medicine (DO)</option>
            <option value="MSc">Doctor of Philosophy (PhD)</option>
            <option value="RN">Doctorate in Medicine (DM)</option>
            <option value="NP">Postgraduate Diploma</option>
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
                                <option value="Honor Roll">Honor Roll</option>
                                <option value="Distinguished Scholar">Distinguished Scholar</option>
                                <option value="Academic Excellence Award">Academic Excellence Award</option>
                                <option value="Cum Laude">Cum Laude</option>
                                <option value="Magna Cum Laude">Magna Cum Laude</option>
                                <option value="Summa Cum Laude">Summa Cum Laude</option>
                            </optgroup>
                            <optgroup label="2. Scholarships and Grants">
                                <option value="Merit-based Scholarship">Merit-based Scholarship</option>
                                <option value="Need-based Scholarship">Need-based Scholarship</option>
                                <option value="Athletic Scholarship">Athletic Scholarship</option>
                                <option value="Research Grant">Research Grant</option>
                                <option value="Study Abroad Grant">Study Abroad Grant</option>
                            </optgroup>
                            <optgroup label="3. Subject-Specific Awards">
                                <option value="Subject Excellence Award">Subject Excellence Award</option>
                                <option value="Science Fair Award">Science Fair Award</option>
                                <option value="Writing/English Award">Writing/English Award</option>
                                <option value="History Award">History Award</option>
                                <option value="Art/Music/Drama Award">Art/Music/Drama Award</option>
                            </optgroup>
                            <optgroup label="4. Leadership and Service Awards">
                                <option value="Student Council President/Vice President">Student Council President/Vice
                                    President
                                </option>
                                <option value="Class President">Class President</option>
                                <option value="Community Service Award">Community Service Award</option>
                                <option value="Volunteer of the Year">Volunteer of the Year</option>
                            </optgroup>
                            <optgroup label="5. Sports and Athletics Awards">
                                <option value="Most Valuable Player (MVP)">Most Valuable Player (MVP)</option>
                                <option value="Team Captain">Team Captain</option>
                                <option value="Sportsmanship Award">Sportsmanship Award</option>
                                <option value="All-Conference/All-District/All-State Team">
                                    All-Conference/All-District/All-State Team
                                </option>
                            </optgroup>
                            <optgroup label="6. Research and Innovation Awards">
                                <option value="Science Fair Winner">Science Fair Winner</option>
                                <option value="Research Presentation Award">Research Presentation Award</option>
                                <option value="Innovation Challenge Winner">Innovation Challenge Winner</option>
                                <option value="Best Poster/Presentation Award">Best Poster/Presentation Award</option>
                            </optgroup>
                            <optgroup label="7. Professional Society Awards">
                                <option value="Society Membership Award">Society Membership Award</option>
                                <option value="Phi Beta Kappa">Phi Beta Kappa</option>
                                <option value="National Honor Society">National Honor Society</option>
                                <option value="Outstanding Student Chapter Award">Outstanding Student Chapter Award
                                </option>
                            </optgroup>
                            <optgroup label="8. Special Recognition Awards">
                                <option value="Outstanding Achievement Award">Outstanding Achievement Award</option>
                                <option value="Leadership Excellence Award">Leadership Excellence Award</option>
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

</form>
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


        // -------------------------------------------------
        // Start of New Sections

        //1. Section 1: Add New Award

        const addAwardBtn = document.getElementById('addAwardBtn');
        addAwardBtn.addEventListener('click', function () {

            newAwardSection = `
       <li class="list-group-item">
            <div class="row align-items-center">
                <div class="col-12 col-md-2">
                    <div class="form-floating">
                        <select id="award_type"
                                class="form-select @error('award_type') is-invalid @enderror">
                            <option disabled selected>Select Award</option>
                            <optgroup label="1. Academic Honors">
                                <option value="Dean's List">Dean's List</option>
                                <option value="Honor Roll">Honor Roll</option>
                                <option value="Distinguished Scholar">Distinguished Scholar</option>
                                <option value="Academic Excellence Award">Academic Excellence Award</option>
                                <option value="Cum Laude">Cum Laude</option>
                                <option value="Magna Cum Laude">Magna Cum Laude</option>
                                <option value="Summa Cum Laude">Summa Cum Laude</option>
                            </optgroup>
                            <optgroup label="2. Scholarships and Grants">
                                <option value="Merit-based Scholarship">Merit-based Scholarship</option>
                                <option value="Need-based Scholarship">Need-based Scholarship</option>
                                <option value="Athletic Scholarship">Athletic Scholarship</option>
                                <option value="Research Grant">Research Grant</option>
                                <option value="Study Abroad Grant">Study Abroad Grant</option>
                            </optgroup>
                            <optgroup label="3. Subject-Specific Awards">
                                <option value="Subject Excellence Award">Subject Excellence Award</option>
                                <option value="Science Fair Award">Science Fair Award</option>
                                <option value="Writing/English Award">Writing/English Award</option>
                                <option value="History Award">History Award</option>
                                <option value="Art/Music/Drama Award">Art/Music/Drama Award</option>
                            </optgroup>
                            <optgroup label="4. Leadership and Service Awards">
                                <option value="Student Council President/Vice President">Student Council President/Vice
                                    President
                                </option>
                                <option value="Class President">Class President</option>
                                <option value="Community Service Award">Community Service Award</option>
                                <option value="Volunteer of the Year">Volunteer of the Year</option>
                            </optgroup>
                            <optgroup label="5. Sports and Athletics Awards">
                                <option value="Most Valuable Player (MVP)">Most Valuable Player (MVP)</option>
                                <option value="Team Captain">Team Captain</option>
                                <option value="Sportsmanship Award">Sportsmanship Award</option>
                                <option value="All-Conference/All-District/All-State Team">
                                    All-Conference/All-District/All-State Team
                                </option>
                            </optgroup>
                            <optgroup label="6. Research and Innovation Awards">
                                <option value="Science Fair Winner">Science Fair Winner</option>
                                <option value="Research Presentation Award">Research Presentation Award</option>
                                <option value="Innovation Challenge Winner">Innovation Challenge Winner</option>
                                <option value="Best Poster/Presentation Award">Best Poster/Presentation Award</option>
                            </optgroup>
                            <optgroup label="7. Professional Society Awards">
                                <option value="Society Membership Award">Society Membership Award</option>
                                <option value="Phi Beta Kappa">Phi Beta Kappa</option>
                                <option value="National Honor Society">National Honor Society</option>
                                <option value="Outstanding Student Chapter Award">Outstanding Student Chapter Award
                                </option>
                            </optgroup>
                            <optgroup label="8. Special Recognition Awards">
                                <option value="Outstanding Achievement Award">Outstanding Achievement Award</option>
                                <option value="Leadership Excellence Award">Leadership Excellence Award</option>
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
            <input type="text" placeholder="Other Award Type" id="otherAwardType"
                   class="form-control"
                   value="{{ $educationalQualification ? $educationalQualification->otherAwardType : old('otherAwardType') }}">
                    <label for="otherTitle">Other Award Type</label>
                    @error('award_type')
            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
            </div>

            <div class="col-12 col-md-4">
                <div class="form-floating">
                    <input type="text" id="award_title"
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
                <input type="date" id="date_of_award"
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
                <textarea rows="3" type="text" id="award_description"
                          class="form-control @error('award_description') is-invalid @enderror">{{ $educationalQualification ? $educationalQualification->award_description : old('award_description') }}</textarea>
                        <label for="award_description">Award Description</label>
                        @error('award_description')
            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
            </div>
        </div>
    </div>
</li>
`;
            const buttonDiv = addAwardBtn.parentNode;
            buttonDiv.insertAdjacentHTML('beforebegin', newAwardSection);
        });


        //2. Section 2: Add New Qualification
        let qualificationCount = 1;

        const addQualificationBtn = document.getElementById('addQualificationBtn');
        // const qualificationsContainer = document.querySelector('.qualificationsContainer');

        addQualificationBtn.addEventListener('click', function () {
            qualificationCount++;

            newQualificationSection = `
    <hr class="hr hr-blurry"/>
            <div class="col-md-12">
            <h5 class="form-subtitle">Qualification ${qualificationCount}:</h5>
        </div>
<div class="col-md-3 form-floating">
        <select id="degree_level"
                class="form-select"
                >
            <option value="">Select degree</option>
            <option value="Dr">Diploma</option>
            <option value="Prof">Associate Degree</option>
            <option value="MD">Bachelor's Degree</option>
            <option value="DO">Master's Degree</option>
            <option value="MBBS">Doctor of Medicine (MD)</option>
            <option value="BSc">Doctor of Osteopathic Medicine (DO)</option>
            <option value="MSc">Doctor of Philosophy (PhD)</option>
            <option value="RN">Doctorate in Medicine (DM)</option>
            <option value="NP">Postgraduate Diploma</option>
            <option value="Other">Other</option>
        </select>

        <label for="title">Degree Level</label>
            </div>

            <div id="otherDegreeContainer" class="form-floating col-md-3" style="display: none;">
                <input type="text" placeholder="Other Degree Level" id="otherDegree"
                       class="form-control">
        <label for="otherDegree">Other Degree Level</label>
            </div>


            <div class="col-md-6 form-floating">
                <input type="text" id="degree_title"
                       placeholder="Enter Degree Title"
                       class="form-control"
               >
        <label for="degree_title">Degree Title</label>
            </div>

            <div class="col-md-4 form-floating">
                <input type="text" id="institute"
                       placeholder="Enter Institute Title"
                       class="form-control"
               value=""
               >
        <label for="institute">Institute/University Name</label>
            </div>

            <div class="col-md-4 form-floating">
                <select id="institute_location"
                        class="form-select" >
            <option value="">Select Institute Location</option>
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
        <label for="institute_location">Institute/University Location</label>
            </div>

            <div class="col-md-4 form-floating">
                <input type="date" id="year_of_graduation"
                       class="form-control"
               >

        <label for="year_of_graduation">Year of Graduation</label>
            </div>

{{--    ORIGINAL--}}
            <div class="form-group">
                <label for="medical_degree_files" class="form-label">Medical Degree Files (e.g., Certificate, Academic
                    Transcript, etc.):</label>
                <input class="form-control" type="file"
               id="medical_degree_files" multiple/>



            </div>


             <div class="col-md-12">
        <h5 class="form-subtitle">Honors, Awards, Recognitions and Distinctions:</h5>
    </div>

    <ol class="list-group list-group-numbered">
        <li class="list-group-item">
            <div class="row align-items-center">
                <div class="col-12 col-md-2">
                    <div class="form-floating">
                        <select id="award_type"
                                class="form-select @error('award_type') is-invalid @enderror">
                            <option disabled selected>Select Award</option>
                            <optgroup label="1. Academic Honors">
                                <option value="Dean's List">Dean's List</option>
                                <option value="Honor Roll">Honor Roll</option>
                                <option value="Distinguished Scholar">Distinguished Scholar</option>
                                <option value="Academic Excellence Award">Academic Excellence Award</option>
                                <option value="Cum Laude">Cum Laude</option>
                                <option value="Magna Cum Laude">Magna Cum Laude</option>
                                <option value="Summa Cum Laude">Summa Cum Laude</option>
                            </optgroup>
                            <optgroup label="2. Scholarships and Grants">
                                <option value="Merit-based Scholarship">Merit-based Scholarship</option>
                                <option value="Need-based Scholarship">Need-based Scholarship</option>
                                <option value="Athletic Scholarship">Athletic Scholarship</option>
                                <option value="Research Grant">Research Grant</option>
                                <option value="Study Abroad Grant">Study Abroad Grant</option>
                            </optgroup>
                            <optgroup label="3. Subject-Specific Awards">
                                <option value="Subject Excellence Award">Subject Excellence Award</option>
                                <option value="Science Fair Award">Science Fair Award</option>
                                <option value="Writing/English Award">Writing/English Award</option>
                                <option value="History Award">History Award</option>
                                <option value="Art/Music/Drama Award">Art/Music/Drama Award</option>
                            </optgroup>
                            <optgroup label="4. Leadership and Service Awards">
                                <option value="Student Council President/Vice President">Student Council President/Vice
                                    President
                                </option>
                                <option value="Class President">Class President</option>
                                <option value="Community Service Award">Community Service Award</option>
                                <option value="Volunteer of the Year">Volunteer of the Year</option>
                            </optgroup>
                            <optgroup label="5. Sports and Athletics Awards">
                                <option value="Most Valuable Player (MVP)">Most Valuable Player (MVP)</option>
                                <option value="Team Captain">Team Captain</option>
                                <option value="Sportsmanship Award">Sportsmanship Award</option>
                                <option value="All-Conference/All-District/All-State Team">
                                    All-Conference/All-District/All-State Team
                                </option>
                            </optgroup>
                            <optgroup label="6. Research and Innovation Awards">
                                <option value="Science Fair Winner">Science Fair Winner</option>
                                <option value="Research Presentation Award">Research Presentation Award</option>
                                <option value="Innovation Challenge Winner">Innovation Challenge Winner</option>
                                <option value="Best Poster/Presentation Award">Best Poster/Presentation Award</option>
                            </optgroup>
                            <optgroup label="7. Professional Society Awards">
                                <option value="Society Membership Award">Society Membership Award</option>
                                <option value="Phi Beta Kappa">Phi Beta Kappa</option>
                                <option value="National Honor Society">National Honor Society</option>
                                <option value="Outstanding Student Chapter Award">Outstanding Student Chapter Award
                                </option>
                            </optgroup>
                            <optgroup label="8. Special Recognition Awards">
                                <option value="Outstanding Achievement Award">Outstanding Achievement Award</option>
                                <option value="Leadership Excellence Award">Leadership Excellence Award</option>
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
            <input type="text" placeholder="Other Award Type" id="otherAwardType"
                   class="form-control"
                   value="{{ $educationalQualification ? $educationalQualification->otherAwardType : old('otherAwardType') }}">
                    <label for="otherTitle">Other Award Type</label>
                    @error('award_type')
            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
            </div>

            <div class="col-12 col-md-4">
                <div class="form-floating">
                    <input type="text" id="award_title"
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
                <input type="date" id="date_of_award"
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
                <textarea rows="3" type="text" id="award_description"
                          class="form-control @error('award_description') is-invalid @enderror">{{ $educationalQualification ? $educationalQualification->award_description : old('award_description') }}</textarea>
                        <label for="award_description">Award Description</label>
        </div>
    </div>
</li>
<div class="d-grid gap-2 col-3 mx-auto">
    <button class="btn btn-secondary" id="addAwardBtn" type="button">Add Another Award</button>
</div>
</ol>
`;

            const buttonDiv = addQualificationBtn.parentNode;
            buttonDiv.insertAdjacentHTML('beforebegin', newQualificationSection);
        });


    </script>


