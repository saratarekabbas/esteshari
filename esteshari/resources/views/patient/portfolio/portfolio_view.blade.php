@extends('layouts.patient_layout')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="container">
        <h2 class="form-title">Physician Portfolio</h2>
        <section class="h-100 gradient-custom-2">
            <div class="container  h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="rounded-top text-white d-flex flex-row"
                                 style="background-color: gray; height:200px;">
                                <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                    <img
                                        src="{{asset('assets/profile_dr_4.jpg')}}"
                                        alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                                        style="width: 150px; z-index: 1">
{{--                                    <a href="{{route('physician.portfolio.manage')}}" type="button"--}}
{{--                                       class="btn btn-outline-dark" data-mdb-ripple-color="dark"--}}
{{--                                       style="z-index: 1;">--}}
{{--                                        Edit profile--}}
{{--                                    </a>--}}
                                </div>
                                <div class="ms-3" style="margin-top: 130px;">
                                    <h5>{{$physician->name}}
                                        , {{ $physician->personalInformation->designation ?: ''}}</h5>
                                    <p>{{$physician->workExperience->job_title }} (17 years of experience)</p>
                                </div>
                            </div>
                            <div class="p-4 text-black" style="background-color: #f8f9fa;">
                                <div class="d-flex justify-content-end text-center py-1">
                                    <div>
                                        <p class="mb-1 h5">
                                            @if(isset($physician))
                                                @if(!is_null($physician->pricing))
                                                    {{$physician->pricing->discountedCost ?: $physician->pricing->cost}} {{$physician->pricing->currency ?: 'MYR'}}
                                                @else
                                                    N/A
                                        @endif
                                        @endif

                                        <p class="small text-muted mb-0 text-end">/session</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4 text-black">
                                <div class="mb-5">
                                    <p class="lead fw-normal mb-1">About</p>
                                    <div class="p-4" style="background-color: #f8f9fa;">
                                        @if(isset($physician))
                                            @if(!is_null($physician->workExperience))
                                                <p class="font-italic mb-1">As a highly skilled medical surgeon, I have
                                                    accumulated extensive work experience in the field of surgical
                                                    medicine. With a focus on providing exceptional patient care and
                                                    achieving optimal surgical outcomes, I have dedicated my career to
                                                    enhancing the health and well-being of individuals through advanced
                                                    surgical interventions.
                                                    <br> <br>
                                                    Throughout my professional journey, I have successfully performed a
                                                    wide range of surgical procedures, demonstrating proficiency in
                                                    various surgical techniques and technologies. My expertise spans
                                                    across areas such as general surgery, specialized surgical
                                                    procedures, and minimally invasive techniques.
                                                    <br> <br>
                                                    I have had the privilege of collaborating with esteemed medical
                                                    teams in renowned healthcare institutions, working closely with
                                                    fellow surgeons, nurses, and support staff to ensure seamless
                                                    surgical procedures and post-operative care. Through effective
                                                    communication and a patient-centered approach, I strive to alleviate
                                                    patients' concerns and create a comfortable environment throughout
                                                    their surgical journey.
                                                    <br> <br>
                                                    My experience extends to managing complex cases, including
                                                    diagnosing surgical conditions, developing comprehensive treatment
                                                    plans, and performing intricate surgical procedures with precision
                                                    and utmost attention to detail. I am well-versed in utilizing the
                                                    latest advancements in surgical technology and staying updated on
                                                    emerging trends in the field.
                                                    <br> <br>
                                                    Beyond my technical expertise, I am deeply committed to maintaining
                                                    the highest ethical standards in my practice. I prioritize patient
                                                    safety, informed decision-making, and transparent communication,
                                                    fostering trust and establishing enduring relationships with my
                                                    patients.
                                                    <br> <br>
                                                    I am proud to have contributed to the advancement of surgical
                                                    knowledge through active participation in medical conferences,
                                                    research endeavors, and continuous professional development. By
                                                    staying at the forefront of medical advancements, I strive to
                                                    provide my patients with the best possible care and outcomes.
                                                    <br> <br>
                                                    With a passion for excellence and a dedication to lifelong learning,
                                                    I continue to evolve as a medical surgeon, embracing new challenges
                                                    and opportunities to make a positive impact on the lives of my
                                                    patients. It is my unwavering commitment to delivering exceptional
                                                    surgical care that drives me to excel in this noble profession.</p>
                                            @else
                                                <p class="font-italic mb-1"><b>Designation: </b>N/A</p>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <p class="lead fw-normal mb-1">Personal Information</p>
                                    <div class="p-4" style="background-color: #f8f9fa;">
                                        @if(isset($physician))
                                            @if(!is_null($physician->workExperience))
                                                <p class="font-italic mb-1"><span
                                                        style="font-weight: 600">Gender: </span>{{$physician->personalInformation->gender}}
                                                </p>
                                                <p class="font-italic mb-0"><span style="font-weight: 600">Date of Birth: </span>21/05/1788
                                                </p>
                                                <p class="font-italic mb-0"><span
                                                        style="font-weight: 600">Nationality: </span>Egyptian</p>
                                                <p class="font-italic mb-0"><span style="font-weight: 600">Mobile Number: </span>+60-1165043455
                                                </p>
                                                <p class="font-italic mb-0"><span
                                                        style="font-weight: 600">Languages: </span>English, Arabic and
                                                    Malay</p>
                                                <p class="font-italic mb-0"><span style="font-weight: 600">Preferred Language for Communication: </span>English
                                                </p>
                                            @else
                                                <p class="font-italic mb-1"><b>Designation: </b>N/A</p>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <p class="lead fw-normal mb-1">Educational Qualifications</p>
                                    <div class="p-4" style="background-color: #f8f9fa;">
                                        @if(isset($physician))
                                            @if(!is_null($physician->workExperience))
                                                <p class="font-italic mb-1"><span
                                                        style="font-weight: 600">Degree(s): </span>Doctorate of
                                                    Medicine, Oxford University, United Kingdom (2010-2016), Master's of
                                                    Endocrinology, Cairo University, Egypt (2006-2009), Bachelor's of
                                                    Medicine, Universiti teknologi Malaysia, Malaysia (1993-1999)</p>
                                                <p class="font-italic mb-1"><span style="font-weight: 600">Honors and Awards: </span>National
                                                    merit Award, Dean's Award, and Society Honor</p>
                                            @else
                                                <p class="font-italic mb-1">N/A</p>
                                            @endif
                                        @endif

                                    </div>
                                </div>

                                <div class="mb-5">
                                    <p class="lead fw-normal mb-1">Work Experience</p>
                                    <div class="p-4" style="background-color: #f8f9fa;">
                                        @if(isset($physician))
                                            @if(!is_null($physician->workExperience))
                                                <span class="font-italic mb-1"><span
                                                        style="font-weight: 600"> {{$physician->workExperience->employment_type}} {{$physician->workExperience->job_title }} at {{$physician->workExperience->employer_name}}, United Kingdom (2001-Present)</span>
                                                <p class="font-italic mb-1">I have had the privilege of collaborating with esteemed medical teams in renowned healthcare institutions. Through effective communication and a patient-centered approach, I strive to alleviate patients' concerns and create a comfortable environment throughout their surgical journey.

                                                </p>
                                                    <br>
                                                    <span class="font-italic mb-1"><span style="font-weight: 600"> Part-time Medical Resident at Alh-Huda Hospital, Egypt (1998-2001)</span>
                                                <p class="font-italic mb-1">I have had the privilege of collaborating with esteemed medical teams in renowned healthcare institutions, working closely with fellow surgeons, nurses, and support staff to ensure seamless surgical procedures and post-operative care. Through effective communication and a patient-centered approach, I strive to alleviate patients' concerns and create a comfortable environment throughout their surgical journey.

                                                </p>
                                            @else
                                                            <p class="font-italic mb-1">N/A</p>
                                            @endif
                                        @endif

                                    </div>
                                </div>

                                <div class="mb-5">
                                    <p class="lead fw-normal mb-1">Research and Publications</p>
                                    <div class="p-4" style="background-color: #f8f9fa;">
                                        @if(isset($physician))
                                            @if(!is_null($physician->workExperience))
                                                <p class="font-italic mb-1">
                                                    <span style="font-weight: 600">Research Projects Conducted: </span>
                                                    <br>- Investigating the Efficacy of Novel Surgical Techniques in
                                                    Treating Cardiovascular Diseases (UTM).
                                                    <br>- Assessing the Impact of Early Intervention Programs on
                                                    Neurodevelopmental Outcomes in Premature Infants.

                                                </p>
                                                <br>
                                                <p class="font-italic mb-1"><span
                                                        style="font-weight: 600">Publications: </span>
                                                    <br>- Smith, J.,
                                                    Johnson, A., Anderson, B., et al. (2022). "A Comprehensive Review of
                                                    Surgical Approaches in Treating Coronary Artery Disease." Journal of
                                                    Cardiovascular Surgery, 45(3), 120-135
                                                    <br>- Brown, S., Roberts, L.,
                                                    Thompson, M., et al. (2021). "Long-term Neurodevelopmental Outcomes
                                                    in Children Born Preterm: A Prospective Cohort Study." Pediatrics,
                                                    138(5), e20210123.</p>
                                                <br>
                                                <p class="font-italic mb-1"><span style="font-weight: 600">Contributions: </span>
                                                    <br>- Presenter and Speaker, Annual Cardiology Conference, 2022:
                                                    "Advancements in Minimally Invasive Cardiac Surgery: A Comparative
                                                    Study"
                                                    <br>- Panelist, Robotic Surgery Symposium, 2020: "Robotic-Assisted
                                                    Orthopedic Surgeries: Current Trends and Future Directions"
                                                    <br>- Poster Presentation, American Society of Clinical Oncology
                                                    Annual Meeting, 2019: "Genetic Markers as Predictors of Treatment
                                                    Response in Breast Cancer"
                                                    <br>- Keynote Speaker, Pain Management Conference, 2018:
                                                    "Pharmacological Interventions in Chronic Pain Management: An
                                                    Evidence-based Approach"</p>

                                            @else
                                                <p class="font-italic mb-1">N/A</p>
                                            @endif
                                        @endif

                                    </div>
                                </div>


                                <div class="mb-5">
                                    <p class="lead fw-normal mb-1">Board Certifications</p>
                                    <div class="p-4" style="background-color: #f8f9fa;">
                                        @if(isset($physician))
                                            @if(!is_null($physician->workExperience))
                                                <p class="font-italic mb-1">
                                                    - General Surgery Certification by American Board of Medical
                                                    Specialties (May 2019)
                                                    <br>- Internal Medicine Certification by Malaysian medical
                                                    Specialization Board (June 2010)
                                                </p>
                                            @else
                                                <p class="font-italic mb-1">N/A</p>
                                            @endif
                                        @endif

                                    </div>
                                </div>

                                <div class="mb-5">
                                    <p class="lead fw-normal mb-1">Professional Affiliations</p>
                                    <div class="p-4" style="background-color: #f8f9fa;">
                                        @if(isset($physician))
                                            @if(!is_null($physician->workExperience))

                                                <p class="font-italic mb-1">
                                                    - American Medical Association (AMA)
                                                    <br>- Chairperson, Surgical Quality Improvement Committee, Ain Shams
                                                    Hospital.
                                                    <br>- Chairperson, Surgical Quality Improvement Committee, American
                                                    College of Surgeons (ACS).
                                            @else
                                                <p class="font-italic mb-1">N/A</p>
                                            @endif
                                        @endif

                                    </div>
                                </div>

                                <div class="mb-5">
                                    <p class="lead fw-normal mb-1">Healthcare Volunteering/Community Service Activities</p>
                                    <div class="p-4" style="background-color: #f8f9fa;">
                                        @if(isset($physician))
                                            @if(!is_null($physician->workExperience))
                                                <p class="font-italic mb-1">
                                                    - Volunteer Surgeon, Medical Missions Abroad, providing free
                                                    surgical care to underserved communities.
                                                    <br>- Organizer, Annual Health Fair, offering health screenings and
                                                    educational sessions to the local community.
                                                    <br>- Speaker, Breast Cancer Awareness Campaign, delivering
                                                    presentations on early detection and treatment options.
                                                    <br>- Advocate, Tobacco Control Initiative, promoting smoking
                                                    cessation and raising awareness about the harmful effects of
                                                    smoking.
                                                </p>

                                            @else
                                                <p class="font-italic mb-1">N/A</p>
                                            @endif
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

