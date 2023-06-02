@extends('layouts.admin_layout')


@section('content')

    <div class="container">
        <h2 class="form-title">Physician Registration Form: <small
                class="text-muted">{{$physician->personalInformation->full_name}}
                , {{ $physician->personalInformation->designation}}</small></h2>

        <div class="container">
            {{--Section 1--}}
            <h4 class="form-subtitle">Section 1: Personal Information</h4>
            <table class="table table-bordered" style="background-color: #ffffff">
                <tbody>
                <tr>
                    <th colspan="2" class="table-primary"><h5>Personal Information</h5></th>
                </tr>
                <tr>
                    <th style="width: 25%;">Full Name</th>
                    <td style="width: 75%;">{{ $physician->personalInformation->full_name ?: 'N/A'}}</td>
                </tr>
                <tr>
                    <th>Designation</th>
                    <td>{{ $physician->personalInformation->designation ?: 'N/A'}}</td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>{{ $physician->personalInformation->date_of_birth ?: 'N/A'}}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{ $physician->personalInformation->gender ?: 'N/A'}}</td>
                </tr>
                <tr>
                    <th>Email Address</th>
                    <td>{{ $physician->personalInformation->email_address ?: 'N/A'}}</td>
                </tr>
                <tr>
                    <th>Alternative Email Address</th>
                    <td>{{ $physician->personalInformation->alternative_email_address ?: 'N/A'}}</td>
                </tr>
                <tr>
                    <th>Nationality</th>
                    <td>{{ $physician->personalInformation->nationality ?: 'N/A'}}</td>
                </tr>
                <tr>
                    <th>Mobile Number</th>
                    <td>+{{ $physician->personalInformation->country_code ?: 'N/A'}}-{{ $physician->personalInformation->mobile_number ?: 'N/A'}}</td>
                </tr>
                <tr>
                    <th>Telephone Number</th>
                    <td>{{ $physician->personalInformation->telephone_number ?: 'N/A'}}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $physician->personalInformation->address_line_1 ?: 'N/A'}} <br>
                        {{ $physician->personalInformation->address_line_2 ?: 'N/A'}} <br>
                        {{ $physician->personalInformation->postal_code ?: 'N/A'}} {{ $physician->personalInformation->city ?: 'N/A'}}, {{ $physician->personalInformation->state ?: 'N/A'}}, {{ $physician->personalInformation->country ?: 'N/A'}}
                    </td>
                </tr>
                <tr>
                    <th>Identity Verification Files</th>

                    <td>
                        <ol class="list-group list-group-numbered">
                            @if (!empty($physician->personalInformation->identity_verification_files))
                                @foreach(json_decode($physician->personalInformation->identity_verification_files) as $file)
                                    <li class="list-group-item"><a href="{{ asset('storage/'. $file) }}"
                                                                   target="_blank">{{ $file }}</a></li>
                                @endforeach
                            @else
                                N/A
                            @endif
                        </ol>
                    </td>
                </tr>
                </tbody>
            </table>


            {{--Section 2--}}
            <h4 class="form-subtitle">Section 2: Educational Qualifications</h4>
            @foreach($physician->educationalQualification as $index => $eduQualification)

                <table class="table table-bordered" style="background-color: #ffffff">
                    <tbody>
                    <tr>
                        <th colspan="2" class="table-primary"><h5>Educational Qualification #1</h5></th>
                    </tr>
                    <tr>
                        <th style="width: 25%;">Degree Level</th>
                        <td style="width: 75%;">{{ $eduQualification->degree_level  ?: 'N/A'}}</td>
                    </tr>
                    <tr>
                        <th>Degree Title</th>
                        <td>{{ $eduQualification->degree_title  ?: 'N/A'}}</td>
                    </tr>
                    <tr>
                        <th>Institute</th>
                        <td>{{ $eduQualification->institute  ?: 'N/A'}}</td>
                    </tr>
                    <tr>
                        <th>Institute Location</th>
                        <td>{{ $eduQualification->institute_location  ?: 'N/A'}}</td>
                    </tr>
                    <tr>
                        <th>Year of Graduation</th>
                        <td>{{ $eduQualification->year_of_graduation  ?: 'N/A'}}</td>
                    </tr>
                    <tr>
                        <th>Degree Files</th>

                        <td>
                            <ol class="list-group list-group-numbered">
                                @if (!empty($eduQualification->medical_degree_files))
                                    @foreach(json_decode($eduQualification->medical_degree_files) as $file)
                                        <li class="list-group-item"><a href="{{ asset('storage/'. $file) }}"
                                                                       target="_blank">{{ $file }}</a></li>
                                    @endforeach
                                @else
                                    N/A
                                @endif
                            </ol>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2" class="table-secondary"><h6>Honors & Awards for Educational Qualification #1</h6>
                        </th>
                    </tr>
                    <tr>
                        <th>Award Type</th>
                        <td>{{ $eduQualification->award_type  ?: 'N/A'}}</td>
                    </tr>
                    <tr>
                        <th>Award Title</th>
                        <td>{{ $eduQualification->award_title  ?: 'N/A'}}</td>
                    </tr>
                    <tr>
                        <th>Date of Award</th>
                        <td>{{ $eduQualification->date_of_award  ?: 'N/A'}}</td>
                    </tr>
                    <tr>
                        <th>Award Description</th>
                        <td>{{ $eduQualification->award_description  ?: 'N/A'}}</td>
                    </tr>
                    </tbody>
                </table>
            @endforeach

            {{--Section 3--}}
            <h4 class="form-subtitle">Section 3: Work Experience</h4>
            <table class="table table-bordered" style="background-color: #ffffff">
                <tbody>
                @if ($physician->workExperience)
                    <tr>
                        <th colspan="2" class="table-light"><h5>Work Experience #1</h5></th>
                    </tr>
                    <tr>
                        <th style="width: 25%;">Job Title</th>
                        <td style="width: 75%;">{{ $physician->workExperience->job_title ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Employer Name</th>
                        <td>{{ $physician->workExperience->employer_name ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Employment Type</th>
                        <td>{{ $physician->workExperience->employment_type ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Start Date of Employment</th>
                        <td>{{ $physician->workExperience->start_date_of_employment ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>End Date of Employment</th>
                        <td>{{ $physician->workExperience->end_date_of_employment ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Job Location</th>
                        <td>{{ $physician->workExperience->job_location_city ?: 'N/A' }}, {{ $physician->workExperience->job_location_country ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Location Type</th>
                        <td>{{ $physician->workExperience->location_type ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Job Description</th>
                        <td>{{ $physician->workExperience->job_description ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Job Experience Files</th>
                        <td>
                            <ol class="list-group list-group-numbered">
                                @if (!empty($physician->workExperience->job_experience_files))
                                    @foreach(json_decode($physician->workExperience->job_experience_files) as $file)
                                        <li class="list-group-item"><a href="{{ asset('storage/'. $file) }}" target="_blank">{{ $file }}</a></li>
                                    @endforeach
                                @else
                                    N/A
                                @endif
                            </ol>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="2">No work experience found.</td>
                    </tr>
                @endif
                </tbody>
            </table>


            {{--Section 4--}}
            <h4 class="form-subtitle">Section 4: Board Certifications</h4>
            <table class="table table-bordered" style="background-color: #ffffff">
                <tbody>
                @if ($physician->boardCertification)
                    <tr>
                        <th colspan="2" class="table-primary"><h5>Board Certification #1</h5></th>
                    </tr>
                    <tr>
                        <th style="width: 25%;">Certification Type</th>
                        <td style="width: 75%;">{{ $physician->boardCertification->certification_type ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Certification Title</th>
                        <td>{{ $physician->boardCertification->certification_title ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Certification Issuing Board</th>
                        <td>{{ $physician->boardCertification->certification_issuing_board ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Certification Issue Date</th>
                        <td>{{ $physician->boardCertification->certification_issue_date ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Certification Expiry Date</th>
                        <td>{{ $physician->boardCertification->certification_expiry_date ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Certification Credential ID</th>
                        <td>{{ $physician->boardCertification->certification_credential_id ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Certification Credential URL</th>
                        <td>
                            @if ($physician->boardCertification->certification_credential_url)
                                <a href="{{ $physician->boardCertification->certification_credential_url }}">Certification Credential URL</a>
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Certification Files</th>
                        <td>
                            <ol class="list-group list-group-numbered">
                                @if (!empty($physician->boardCertification->certification_files))
                                    @foreach(json_decode($physician->boardCertification->certification_files) as $file)
                                        <li class="list-group-item"><a href="{{ asset('storage/'. $file) }}" target="_blank">{{ $file }}</a></li>
                                    @endforeach
                                @else
                                    N/A
                                @endif
                            </ol>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="2">No board certification found.</td>
                    </tr>
                @endif
                </tbody>
            </table>


            <h4 class="form-subtitle">Section 5: Professional Registrations</h4>
            <table class="table table-bordered" style="background-color: #ffffff">
                <tbody>
                @if ($physician->professionalRegistration)
                    <tr>
                        <th colspan="2" class="table-primary"><h5>Board Certification #1</h5></th>
                    </tr>
                    <tr>
                        <th style="width: 25%;">Registration Type</th>
                        <td style="width: 75%;">{{ $physician->professionalRegistration->registration_type ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Registration Title</th>
                        <td>{{ $physician->professionalRegistration->registration_title ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Registration Number</th>
                        <td>{{ $physician->professionalRegistration->registration_number ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Registration Issue Date</th>
                        <td>{{ $physician->professionalRegistration->registration_issue_date ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Registration Expiry Date</th>
                        <td>{{ $physician->professionalRegistration->registration_expiry_date ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Registration Files</th>
                        <td>
                            <ol class="list-group list-group-numbered">
                                @if (!empty($physician->professionalRegistration->registration_files))
                                    @foreach(json_decode($physician->professionalRegistration->registration_files) as $file)
                                        <li class="list-group-item"><a href="{{ asset('storage/'. $file) }}" target="_blank">{{ $file }}</a></li>
                                    @endforeach
                                @else
                                    N/A
                                @endif
                            </ol>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="2">No professional registration found.</td>
                    </tr>
                @endif
                </tbody>
            </table>


            {{--Section 6--}}
            <h4 class="form-subtitle">Section 6: Physician References</h4>
            <table class="table table-bordered" style="background-color: #ffffff">
                <tbody>
                @if ($physician->physicianReference)
                    <tr>
                        <th colspan="2" class="table-primary"><h5>Reference #1</h5></th>
                    </tr>
                    <tr>
                        <th style="width: 25%;">Reference Title</th>
                        <td style="width: 75%;">{{ $physician->physicianReference->reference_title ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Reference Full Name</th>
                        <td>{{ $physician->physicianReference->reference_full_name ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Reference Relationship</th>
                        <td>{{ $physician->physicianReference->reference_relationship ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Reference Email Address</th>
                        <td>{{ $physician->physicianReference->reference_email_address ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Reference Mobile Number</th>
                        <td>+{{ $physician->physicianReference->country_code ?: 'N/A' }}-{{ $physician->physicianReference->mobile_number ?: 'N/A' }}</td>
                    </tr>
                @else
                    <tr>
                        <td colspan="2">No physician reference found.</td>
                    </tr>
                @endif
                </tbody>
            </table>


            {{-- Section 7 --}}
            <h4 class="form-subtitle">Section 7: Language Qualifications</h4>
            <table class="table table-bordered" style="background-color: #ffffff">
                <tbody>
                @if ($physician->langaugeQualification)
                    <tr>
                        <th colspan="2" class="table-primary"><h5>Language Qualification #1</h5></th>
                    </tr>
                    <tr>
                        <th style="width: 25%;">Language Qualification Type</th>
                        <td style="width: 75%;">{{ $physician->langaugeQualification->qualification_type ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Language Qualification Title</th>
                        <td>{{ $physician->langaugeQualification->qualification_title ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Language Qualification Issuing Board</th>
                        <td>{{ $physician->langaugeQualification->qualification_issuing_board ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Language Qualification Issuing Board</th>
                        <td>{{ $physician->langaugeQualification->qualification_issue_date ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Language Qualification Expiry Date</th>
                        <td>{{ $physician->langaugeQualification->qualification_expiry_date ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Language Qualification Files</th>
                        <td>
                            <ol class="list-group list-group-numbered">
                                @if (!empty($physician->langaugeQualification->qualification_files))
                                    @foreach(json_decode($physician->langaugeQualification->qualification_files) as $file)
                                        <li class="list-group-item"><a href="{{ asset('storage/'. $file) }}" target="_blank">{{ $file }}</a></li>
                                    @endforeach
                                @else
                                    N/A
                                @endif
                            </ol>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="2">No language qualifications found.</td>
                    </tr>
                @endif
                </tbody>
            </table>

            {{-- Section 8 --}}
            <h4 class="form-subtitle">Section 8: Insurances</h4>
            <table class="table table-bordered" style="background-color: #ffffff">
                <tbody>
                @if ($physician->insurance)
                    <tr>
                        <th colspan="2" class="table-primary"><h5>Insurance #1</h5></th>
                    </tr>
                    <tr>
                        <th style="width: 25%;">Insurance Type</th>
                        <td style="width: 75%;">{{ $physician->insurance->insurance_type ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Insurance Title</th>
                        <td>{{ $physician->insurance->insurance_title ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Insurance Number</th>
                        <td>{{ $physician->insurance->insurance_number ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Insurance Issue Date</th>
                        <td>{{ $physician->insurance->insurance_issue_date ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Insurance Expiry Date</th>
                        <td>{{ $physician->insurance->insurance_expiry_date ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Insurance Provider</th>
                        <td>{{ $physician->insurance->insurance_provider ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Insurance Files</th>
                        <td>
                            <ol class="list-group list-group-numbered">
                                @if (!empty($physician->insurance->qualification_files))
                                    @foreach(json_decode($physician->insurance->qualification_files) as $file)
                                        <li class="list-group-item"><a href="{{ asset('storage/'. $file) }}" target="_blank">{{ $file }}</a></li>
                                    @endforeach
                                @else
                                    N/A
                                @endif
                            </ol>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="2">No insurances found.</td>
                    </tr>
                @endif
                </tbody>
            </table>

        </div>
    </div>

@endsection
