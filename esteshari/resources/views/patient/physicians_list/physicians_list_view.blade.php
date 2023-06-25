@extends('layouts.patient_layout')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="container">
        <h2 class="form-title">Physicians List</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col-md-12">
                <div class="input-group mb-3">
                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    <button class="btn btn-primary" type="button">Search</button>
                </div>
                <a href="#" style="text-align: right; text-decoration: none" data-bs-toggle="modal"
                   data-bs-target="#exampleModal">Advanced Filtering</a>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Advanced Search and Filter</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3">
                                        <h6 class="mb-2">Session Timing</h6>
                                        <div class="btn-group col-sm-12" role="group" aria-label="Basic example"
                                             style="width: 100%">
                                            <button type="button" class="btn btn-light">Specific Date</button>
                                            <button type="button" class="btn btn-light">After</button>
                                            <button type="button" class="btn btn-light">Before</button>
                                            <button type="button" class="btn btn-secondary">Between</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-2">
                                        <input type="date" class="form-control " id="inputPassword4"
                                               placeholder="Start">
                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <input type="date" class="form-control col-sm-5 mb-2" id="inputPassword4"
                                               placeholder="End Date">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-6 mb-2">
                                        <input type="time" class="form-control " id="inputPassword4"
                                               placeholder="Start">
                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <input type="time" class="form-control col-sm-5 mb-2" id="inputPassword4"
                                               placeholder="End Date">
                                    </div>
                                </div>

                                <hr>
                                <h6 class="mt-3">Session Price</h6>

                                <div data-role="rangeslider">
                                    <label for="price-max">Session Price (From): MYR<span
                                            id="price-display">0</span></label>
                                    <input type="range" name="price-max" id="price-max" value="0" min="0" max="1000"
                                           style="width: 100%" oninput="updatePrice(this.value)">
                                </div>

                                <script>
                                    function updatePrice(value) {
                                        document.getElementById("price-display").textContent = value;
                                    }
                                </script>

                                <div data-role="rangeslider">
                                    <label for="price-max">Session Price (To): MYR <span
                                            id="price-display2">0</span></label>
                                    <input type="range" name="price-max" id="price-max" value="0" min="0" max="1000"
                                           style="width: 100%" oninput="updatePrice(this.value)">
                                </div>

                                <script>
                                    function updatePrice(value) {
                                        document.getElementById("price-display2").textContent = value;
                                    }
                                </script>


                                <hr>


                                <div class="form-group row mt-3">
                                    <h6>Physician Filters</h6>
                                    <div class="col-sm-6 mb-2">
                                        <h6>Specialization</h6>
                                        <select class="select form-select">
                                            <option value="">Select</option>

                                            <option value="Allergy and Immunology">Allergy and Immunology</option>
                                            <option value="Anesthesiology">Anesthesiology</option>
                                            <option value="Cardiology">Cardiology</option>
                                            <option value="Dermatology">Dermatology</option>
                                            <option value="Emergency Medicine">Emergency Medicine</option>
                                            <option value="Endocrinology">Endocrinology</option>
                                            <option value="Family Medicine">Family Medicine</option>
                                            <option value="Gastroenterology">Gastroenterology</option>
                                            <option value="Geriatric Medicine">Geriatric Medicine</option>
                                            <option value="Hematology">Hematology</option>
                                            <option value="Infectious Diseases">Infectious Diseases</option>
                                            <option value="Internal Medicine">Internal Medicine</option>
                                            <option value="Medical Genetics">Medical Genetics</option>
                                            <option value="Neonatology">Neonatology</option>
                                            <option value="Nephrology">Nephrology</option>
                                            <option value="Neurology">Neurology</option>
                                            <option value="Neurosurgery">Neurosurgery</option>
                                            <option value="Obstetrics and Gynecology">Obstetrics and Gynecology</option>
                                            <option value="Oncology">Oncology</option>
                                            <option value="Ophthalmology">Ophthalmology</option>
                                            <option value="Orthopedic Surgery">Orthopedic Surgery</option>
                                            <option value="Otolaryngology">Otolaryngology</option>
                                            <option value="Pathology">Pathology</option>
                                            <option value="Pediatrics">Pediatrics</option>
                                            <option value="Physical Medicine and Rehabilitation">Physical Medicine and
                                                Rehabilitation
                                            </option>
                                            <option value="Plastic Surgery">Plastic Surgery</option>
                                            <option value="Psychiatry">Psychiatry</option>
                                            <option value="Pulmonology">Pulmonology</option>
                                            <option value="Radiology">Radiology</option>
                                            <option value="Rheumatology">Rheumatology</option>
                                            <option value="Thoracic Surgery">Thoracic Surgery</option>
                                            <option value="Urology">Urology</option>
                                        </select>

                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <h6>Gender</h6>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                   id="inlineRadio1" value="option1">
                                            <label class="form-check-label" for="inlineRadio1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                   id="inlineRadio2" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">Female</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-2">
                                        <h6>Language</h6>
                                        <select class="select form-select">
                                            <option value="">Select</option>

                                            <option value="English">English</option>
                                            <option value="Spanish">Spanish</option>
                                            <option value="French">French</option>
                                            <option value="German">German</option>
                                            <option value="Italian">Italian</option>
                                            <option value="Chinese">Chinese</option>
                                            <option value="Japanese">Japanese</option>
                                            <option value="Korean">Korean</option>
                                            <option value="Arabic">Arabic</option>
                                            <option value="Portuguese">Portuguese</option>
                                            <option value="Russian">Russian</option>
                                            <option value="Hindi">Hindi</option>
                                            <option value="Bengali">Bengali</option>
                                            <option value="Punjabi">Punjabi</option>
                                            <option value="Dutch">Dutch</option>
                                            <option value="Swedish">Swedish</option>
                                            <option value="Norwegian">Norwegian</option>
                                            <option value="Finnish">Finnish</option>
                                            <option value="Danish">Danish</option>
                                            <option value="Greek">Greek</option>
                                            <option value="Polish">Polish</option>
                                            <option value="Turkish">Turkish</option>
                                            <option value="Thai">Thai</option>
                                            <option value="Indonesian">Indonesian</option>
                                            <option value="Malay">Malay</option>
                                            <option value="Vietnamese">Vietnamese</option>
                                        </select>


                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <h6>Nationality</h6>
                                        <select class="select form-select">
                                            <option value="">Select</option>

                                            <option value="afghan">Afghan</option>
                                            <option value="albanian">Albanian</option>
                                            <option value="algerian">Algerian</option>
                                            <option value="american">American</option>
                                            <option value="andorran">Andorran</option>
                                            <option value="angolan">Angolan</option>
                                            <option value="antiguans">Antiguans</option>
                                            <option value="argentinean">Argentinean</option>
                                            <option value="armenian">Armenian</option>
                                            <option value="australian">Australian</option>
                                            <option value="austrian">Austrian</option>
                                            <option value="azerbaijani">Azerbaijani</option>
                                            <option value="bahamian">Bahamian</option>
                                            <option value="bahraini">Bahraini</option>
                                            <option value="bangladeshi">Bangladeshi</option>
                                            <option value="barbadian">Barbadian</option>
                                            <option value="barbudans">Barbudans</option>
                                            <option value="batswana">Batswana</option>
                                            <option value="belarusian">Belarusian</option>
                                            <option value="belgian">Belgian</option>
                                            <option value="belizean">Belizean</option>
                                            <option value="beninese">Beninese</option>
                                            <option value="bhutanese">Bhutanese</option>
                                            <option value="bolivian">Bolivian</option>
                                            <option value="bosnian">Bosnian</option>
                                            <option value="brazilian">Brazilian</option>
                                            <option value="british">British</option>
                                            <option value="bruneian">Bruneian</option>
                                            <option value="bulgarian">Bulgarian</option>
                                            <option value="burkinabe">Burkinabe</option>
                                            <option value="burmese">Burmese</option>
                                            <option value="burundian">Burundian</option>
                                            <option value="cambodian">Cambodian</option>
                                            <option value="cameroonian">Cameroonian</option>
                                            <option value="canadian">Canadian</option>
                                            <option value="cape verdean">Cape Verdean</option>
                                            <option value="central african">Central African</option>
                                            <option value="chadian">Chadian</option>
                                            <option value="chilean">Chilean</option>
                                            <option value="chinese">Chinese</option>
                                            <option value="colombian">Colombian</option>
                                            <option value="comoran">Comoran</option>
                                            <option value="congolese">Congolese</option>
                                            <option value="costa rican">Costa Rican</option>
                                            <option value="croatian">Croatian</option>
                                            <option value="cuban">Cuban</option>
                                            <option value="cypriot">Cypriot</option>
                                            <option value="czech">Czech</option>
                                            <option value="danish">Danish</option>
                                            <option value="djibouti">Djibouti</option>
                                            <option value="dominican">Dominican</option>
                                            <option value="dutch">Dutch</option>
                                            <option value="east timorese">East Timorese</option>
                                            <option value="ecuadorean">Ecuadorean</option>
                                            <option value="egyptian">Egyptian</option>
                                            <option value="emirian">Emirian</option>
                                            <option value="equatorial guinean">Equatorial Guinean</option>
                                            <option value="eritrean">Eritrean</option>
                                            <option value="estonian">Estonian</option>
                                            <option value="ethiopian">Ethiopian</option>
                                            <option value="fijian">Fijian</option>
                                            <option value="filipino">Filipino</option>
                                            <option value="finnish">Finnish</option>
                                            <option value="french">French</option>
                                            <option value="gabonese">Gabonese</option>
                                            <option value="gambian">Gambian</option>
                                            <option value="georgian">Georgian</option>
                                            <option value="german">German</option>
                                            <option value="ghanaian">Ghanaian</option>
                                            <option value="greek">Greek</option>
                                            <option value="grenadian">Grenadian</option>
                                            <option value="guatemalan">Guatemalan</option>
                                            <option value="guinea-bissauan">Guinea-Bissauan</option>
                                            <option value="guinean">Guinean</option>
                                            <option value="guyanese">Guyanese</option>
                                            <option value="haitian">Haitian</option>
                                            <option value="herzegovinian">Herzegovinian</option>
                                            <option value="honduran">Honduran</option>
                                            <option value="hungarian">Hungarian</option>
                                            <option value="icelander">Icelander</option>
                                            <option value="indian">Indian</option>
                                            <option value="indonesian">Indonesian</option>
                                            <option value="iranian">Iranian</option>
                                            <option value="iraqi">Iraqi</option>
                                            <option value="irish">Irish</option>
                                            <option value="israeli">Israeli</option>
                                            <option value="italian">Italian</option>
                                            <option value="ivorian">Ivorian</option>
                                            <option value="jamaican">Jamaican</option>
                                            <option value="japanese">Japanese</option>
                                            <option value="jordanian">Jordanian</option>
                                            <option value="kazakhstani">Kazakhstani</option>
                                            <option value="kenyan">Kenyan</option>
                                            <option value="kittian and nevisian">Kittian and Nevisian</option>
                                            <option value="kuwaiti">Kuwaiti</option>
                                            <option value="kyrgyz">Kyrgyz</option>
                                            <option value="laotian">Laotian</option>
                                            <option value="latvian">Latvian</option>
                                            <option value="lebanese">Lebanese</option>
                                            <option value="liberian">Liberian</option>
                                            <option value="libyan">Libyan</option>
                                            <option value="liechtensteiner">Liechtensteiner</option>
                                            <option value="lithuanian">Lithuanian</option>
                                            <option value="luxembourger">Luxembourger</option>
                                            <option value="macedonian">Macedonian</option>
                                            <option value="malagasy">Malagasy</option>
                                            <option value="malawian">Malawian</option>
                                            <option value="malaysian">Malaysian</option>
                                            <option value="maldivan">Maldivan</option>
                                            <option value="malian">Malian</option>
                                            <option value="maltese">Maltese</option>
                                            <option value="marshallese">Marshallese</option>
                                            <option value="mauritanian">Mauritanian</option>
                                            <option value="mauritian">Mauritian</option>
                                            <option value="mexican">Mexican</option>
                                            <option value="micronesian">Micronesian</option>
                                            <option value="moldovan">Moldovan</option>
                                            <option value="monacan">Monacan</option>
                                            <option value="mongolian">Mongolian</option>
                                            <option value="moroccan">Moroccan</option>
                                            <option value="mosotho">Mosotho</option>
                                            <option value="motswana">Motswana</option>
                                            <option value="mozambican">Mozambican</option>
                                            <option value="namibian">Namibian</option>
                                            <option value="nauruan">Nauruan</option>
                                            <option value="nepalese">Nepalese</option>
                                            <option value="new zealander">New Zealander</option>
                                            <option value="ni-vanuatu">Ni-Vanuatu</option>
                                            <option value="nicaraguan">Nicaraguan</option>
                                            <option value="nigerien">Nigerien</option>
                                            <option value="north korean">North Korean</option>
                                            <option value="northern irish">Northern Irish</option>
                                            <option value="norwegian">Norwegian</option>
                                            <option value="omani">Omani</option>
                                            <option value="pakistani">Pakistani</option>
                                            <option value="palauan">Palauan</option>
                                            <option value="panamanian">Panamanian</option>
                                            <option value="papua new guinean">Papua New Guinean</option>
                                            <option value="paraguayan">Paraguayan</option>
                                            <option value="peruvian">Peruvian</option>
                                            <option value="polish">Polish</option>
                                            <option value="portuguese">Portuguese</option>
                                            <option value="qatari">Qatari</option>
                                            <option value="romanian">Romanian</option>
                                            <option value="russian">Russian</option>
                                            <option value="rwandan">Rwandan</option>
                                            <option value="saint lucian">Saint Lucian</option>
                                            <option value="salvadoran">Salvadoran</option>
                                            <option value="samoan">Samoan</option>
                                            <option value="san marinese">San Marinese</option>
                                            <option value="sao tomean">Sao Tomean</option>
                                            <option value="saudi">Saudi</option>
                                            <option value="scottish">Scottish</option>
                                            <option value="senegalese">Senegalese</option>
                                            <option value="serbian">Serbian</option>
                                            <option value="seychellois">Seychellois</option>
                                            <option value="sierra leonean">Sierra Leonean</option>
                                            <option value="singaporean">Singaporean</option>
                                            <option value="slovakian">Slovakian</option>
                                            <option value="slovenian">Slovenian</option>
                                            <option value="solomon islander">Solomon Islander</option>
                                            <option value="somali">Somali</option>
                                            <option value="south african">South African</option>
                                            <option value="south korean">South Korean</option>
                                            <option value="spanish">Spanish</option>
                                            <option value="sri lankan">Sri Lankan</option>
                                            <option value="sudanese">Sudanese</option>
                                            <option value="surinamer">Surinamer</option>
                                            <option value="swazi">Swazi</option>
                                            <option value="swedish">Swedish</option>
                                            <option value="swiss">Swiss</option>
                                            <option value="syrian">Syrian</option>
                                            <option value="taiwanese">Taiwanese</option>
                                            <option value="tajik">Tajik</option>
                                            <option value="tanzanian">Tanzanian</option>
                                            <option value="thai">Thai</option>
                                            <option value="togolese">Togolese</option>
                                            <option value="tongan">Tongan</option>
                                            <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                                            <option value="tunisian">Tunisian</option>
                                            <option value="turkish">Turkish</option>
                                            <option value="tuvaluan">Tuvaluan</option>
                                            <option value="ugandan">Ugandan</option>
                                            <option value="ukrainian">Ukrainian</option>
                                            <option value="uruguayan">Uruguayan</option>
                                            <option value="uzbekistani">Uzbekistani</option>
                                            <option value="venezuelan">Venezuelan</option>
                                            <option value="vietnamese">Vietnamese</option>
                                            <option value="welsh">Welsh</option>
                                            <option value="yemenite">Yemenite</option>
                                            <option value="zambian">Zambian</option>
                                            <option value="zimbabwean">Zimbabwean</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-6 mb-2">
                                        <h6>Highest Education</h6>
                                        <select class="select form-select">
                                            <option value="">Select</option>
                                            <option value="Dr">Diploma</option>
                                            <option value="Prof">Associate Degree</option>
                                            <option value="MD">Bachelor's Degree</option>
                                            <option value="DO">Master's Degree</option>
                                            <option value="MBBS">Doctor of Medicine (MD)</option>
                                            <option value="BSc">Doctor of Osteopathic Medicine (DO)</option>
                                            <option value="MSc">Doctor of Philosophy (PhD)</option>
                                            <option value="RN">Doctorate in Medicine (DM)</option>
                                            <option value="NP">Postgraduate Diploma</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <h6>Designation</h6>
                                        <select class="select form-select">
                                            <option value="">Select</option>
                                            <option value="Dr">Dr (Doctor)</option>
                                            <option value="Prof">Prof (Professor)</option>
                                            <option value="MD">MD (Medical Doctor)</option>
                                            <option value="DO">DO (Doctor of Osteopathic Medicine)</option>
                                            <option value="MBBS">MBBS (Bachelor of Medicine, Bachelor of Surgery)</option>
                                            <option value="BSc">BSc (Bachelor of Science in Medicine)</option>
                                            <option value="MSc">MSc (Master of Science in Medicine)</option>
                                            <option value="RN">RN (Registered Nurse)</option>
                                            <option value="NP">NP (Nurse Practitioner)</option>
                                            <option value="PA">PA (Physician Assistant)</option>
                                            <option value="PharmD">PharmD (Doctor of Pharmacy)</option>
                                            <option value="RD">RD (Registered Dietitian)</option>
                                            <option value="PT">PT (Physical Therapist)</option>
                                            <option value="OT">OT (Occupational Therapist)</option>
                                            <option value="RT">RT (Respiratory Therapist)</option>
                                            <option value="Psych">Psych (Psychologist)</option>
                                            <option value="Pharmacist">Pharmacist</option>
                                            <option value="Chiro">Chiro (Chiropractor)</option>
                                            <option value="DPM">DPM (Doctor of Podiatric Medicine)</option>
                                            <option value="DDS">DDS (Doctor of Dental Surgery)</option>
                                        </select>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Apply Filters</button>
                        </div>
                    </div>
                </div>
            </div>

            @if ($physicians->isEmpty())
                <tr>
                    <td colspan="5">
                        <div class="text-center">No physicians exist.</div>
                    </td>
                </tr>
            @else
                @foreach($physicians as $physician)
                    @php
                        $slots = $physician->physicianSchedule()->where('status', 'available')->get();
                    @endphp
                    @php
                        $slot = $physician->physicianSchedule()
                            ->where('status', 'available')
                            ->whereDate('slot_date', '>=', date('Y-m-d'))
                            ->orderBy('slot_date')
                            ->orderBy('slot_time')
                            ->first();
                    @endphp
                    <form action="{{ route('patient.physicians_list.book') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $physician->id }}">
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{asset('assets/profile_dr_4.jpg')}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$physician->personalInformation->designation}} {{ $physician->name }}</h5>
                                    <p class="card-text">{{$physician->workExperience->job_title}}</p>
                                    <p class="card-text"
                                       style="font-weight: lighter; font-size: small">{{$physician->personalInformation->designation}} {{ $physician->name }}
                                        is a
                                        {{$physician->workExperience->job_title}}
                                        at {{$physician->workExperience->employer_name}}.
                                        Previously worked at the...
                                        <a href="#" class="card-link">See More</a></p>
                                    @if($slot)
                                        <p class="card-text text-muted">Available
                                            next {{ date('l, jS F Y', strtotime($slot->slot_date)) }}
                                            , {{substr($slot->slot_time, 0, 5) }}</p>
                                    @else
                                        <p class="card-text text-muted">No Available Sessions</p>

                                    @endif

                                    @if($physician->physicianPricing)
                                        @if($physician->physicianPricing->discountedCost)
                                            <h3 class="mb-0 font-weight-semibold">
                                                <s>{{$physician->physicianPricing->currency}} {{$physician->physicianPricing->cost}}</s>
                                                <strong
                                                    class="ms-2 text-danger">{{$physician->physicianPricing->currency}} {{$physician->physicianPricing->discountedCost}}</strong>
                                            </h3>
                                        @else
                                            <h3 class="mb-0 font-weight-semibold">
                                                {{$physician->physicianPricing->currency}} {{$physician->physicianPricing->cost}}
                                            </h3>
                                        @endif
                                    @else
                                        <h3 class="mb-0 font-weight-semibold">MYR 0.00
                                        </h3>
                                    @endif
                                    <div>
                                        <i class="fa fa-star star" style="color: #f1b701"></i>
                                        <i class="fa fa-star star" style="color: #f1b701"></i>
                                        <i class="fa fa-star star" style="color: #f1b701"></i>
                                        <i class="fa fa-star star" style="color: #f1b701"></i>
                                    </div>

                                    <div class="text-muted mb-3">34 reviews</div>

                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary" type="submit">Book Session</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach
            @endif

        </div>

    </div>
@endsection
