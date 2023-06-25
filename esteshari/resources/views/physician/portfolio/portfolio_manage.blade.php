@extends('layouts.physician_layout')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="container">
        <h2 class="form-title">Manage Portfolio</h2>
        <hr class="hr hr-blurry"/>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            Please note that all portfolio details are displayed and can be viewed by the patient. Therefore, it is
            important to avoid sharing any personal or private information that you do not wish to disclose or have your
            patient see. We kindly remind you to keep your portfolio content strictly professional and relevant to your
            practice.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="row">
            <div class="col-lg-4 ">
                <div class="card mb-4" style="height: 300px">
                    <div class="card-body text-center mt-3">
                        <img src="{{asset('assets/profile_dr_4.jpg')}}"
                             alt="avatar"
                             class="rounded-circle img-fluid" style="width: 150px; height: 150px; object-fit: cover">
                        <div class="d-flex justify-content-center mb-2 mt-4">
                            <button type="button" class="btn btn-primary">Change Photo</button>
                            <button type="button" class="btn btn-outline-primary ms-1">Remove</button>
                        </div>
                        {{--                        ELSE if user does not have any photos--}}
                        {{--                        <div class="d-flex justify-content-center mb-2 mt-4">--}}
                        {{--                            <button type="button" class="btn btn-primary">Upload Photo</button>--}}
                        {{--                        </div>--}}

                    </div>
                </div>

            </div>
            <div class="col-lg-8">
                <div class="card mb-4" style="height: 300px">
                    <div class="card-body">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{asset('assets/profile_h_5.jpg')}}" class="d-block w-100" alt="..."
                                         style="object-fit: cover; max-height: 270px ">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('assets/profile_h_4.jpg')}}" class="d-block w-100" alt="..."
                                         style="object-fit: cover; max-height: 270px">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('assets/profile_h_3.jpg')}}" class="d-block w-100" alt="..."
                                         style="object-fit: cover; max-height: 270px">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators"
                                    data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators"
                                    data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <h4 class="form-title">Portfolio Details</h4>
            </div>
        </div>
        <form>
            <div class="card-body p-4 text-black">
                <div class="mb-5">
                    <p class="lead fw-normal mb-1">About</p>
                    <div class="p-4" style="background-color: #f8f9fa;">
                       <textarea class="form-control" rows="10">
As a highly skilled medical surgeon, I have accumulated extensive work experience in the field of surgical medicine. With a focus on providing exceptional patient care and achieving optimal surgical outcomes, I have dedicated my career to enhancing the health and well-being of individuals through advanced surgical interventions.
Throughout my professional journey, I have successfully performed a wide range of surgical procedures, demonstrating proficiency in various surgical techniques and technologies. My expertise spans across areas such as general surgery, specialized surgical procedures, and minimally invasive techniques. I have had the privilege of collaborating with esteemed medical teams in renowned healthcare institutions, working closely with fellow surgeons, nurses, and support staff to ensure seamless surgical procedures and post-operative care.
Through effective communication and a patient-centered approach, I strive to alleviate patients' concerns and create a comfortable environment throughout their surgical journey. My experience extends to managing complex cases, including diagnosing surgical conditions, developing comprehensive treatment plans, and performing intricate surgical procedures with precision and utmost attention to detail. I am well-versed in utilizing the latest advancements in surgical technology and staying updated on emerging trends in the field. Beyond my technical expertise, I am deeply committed to maintaining the highest ethical standards in my practice. I prioritize patient safety, informed decision-making, and transparent communication, fostering trust and establishing enduring relationships with my patients. I am proud to have contributed to the advancement of surgical knowledge through active participation in medical conferences, research endeavors, and continuous professional development. By staying at the forefront of medical advancements, I strive to provide my patients with the best possible care and outcomes. With a passion for excellence and a dedication to lifelong learning, I continue to evolve as a medical surgeon, embracing new challenges and opportunities to make a positive impact on the lives of my patients. It is my unwavering commitment to delivering exceptional surgical care that drives me to excel in this noble profession.</textarea>
                    </div>
                </div>
                <div class="mb-5">
                    <p class="lead fw-normal mb-1">Personal Information</p>
                    <div class="p-4" style="background-color: #f8f9fa;">
                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="Female">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Nationality</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="Egyptian">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Mobile Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="+60-1165043455">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Languages</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="English, Arabic and Malay">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Preferred Language for Communication</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="English">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mb-5">
                    <p class="lead fw-normal mb-1">Educational Qualifications</p>
                    <div class="p-4" style="background-color: #f8f9fa;">
                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Degree Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="Doctorate of Medicine">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Institute/University</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="Oxford University">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Start Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" value="United Kingdom">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">End Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" value="Female">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Honor</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="National merit Award">
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary me-md-2" type="button">Add Another Honor</button>
                            <button class="btn btn-primary" type="button">Add Another Educational Qualification</button>
                        </div>
                    </div>
                </div>


                <div class="mb-5">
                    <p class="lead fw-normal mb-1">Research and Publications                    </p>
                    <div class="p-4" style="background-color: #f8f9fa;">
                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Research Projects Conducted</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="Doctorate of Medicine">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Institute/Research Center</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="Oxford University">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Publications</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="Smith, J., Johnson, A., Anderson, B., et al. (2022). A Comprehensive Review of Surgical Approaches in Treating Coronary Artery Disease. Journal of Cardiovascular Surgery, 45(3), 120-135">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Contributions</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="Presenter and Speaker, Annual Cardiology Conference, 2022: Advancements in Minimally Invasive Cardiac Surgery: A Comparative Study">
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary me-md-2" type="button">Add Another Research Project</button>
                            <button class="btn btn-primary me-md-2" type="button">Add Another Publication</button>
                            <button class="btn btn-primary" type="button">Add Another Contribution</button>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <p class="lead fw-normal mb-1">Research and Publications                    </p>
                    <div class="p-4" style="background-color: #f8f9fa;">

                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Certification Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="General Surgery Certification">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Publisher/Board</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="American Board of Medical Specialties">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" value="">
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary me-md-2" type="button">Add Another Certification</button>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <p class="lead fw-normal mb-1">Professional Affiliations</p>
                    <div class="p-4" style="background-color: #f8f9fa;">

                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Affiliation</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="Chairperson, Surgical Quality Improvement Committee, American College of Surgeons (ACS).">
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary me-md-2" type="button">Add Another Affiliation</button>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <p class="lead fw-normal mb-1">Healthcare Volunteering/Community Service Activities </p>
                    <div class="p-4" style="background-color: #f8f9fa;">

                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Activity</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value=" Volunteer Surgeon, Medical Missions Abroad, providing free surgical care to underserved communities.">
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary me-md-2" type="button">Add Another Activity</button>
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary" type="button">Save Changes</button>
                    <button class="btn btn-secondary" type="button">Cancel</button>
                </div>
            </div>
        </form>

    </div>

@endsection

