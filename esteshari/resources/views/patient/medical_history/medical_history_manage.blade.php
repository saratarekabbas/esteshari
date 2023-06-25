@extends('layouts.patient_layout')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="container">
        <h2 class="form-title">Manage My Medical History</h2>
        <form>
            <div class="mb-5">
                <p class="lead fw-normal mb-1">Personal Information</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                    <div class="form-group row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{$data->name}}">
                        </div>
                    </div>
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
                <p class="lead fw-normal mb-1">Medical Conditions</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Current medical conditions</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="Hypertension, Asthma">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Past medical conditions</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="Diabetes">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Family history of diseases or conditions</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="Heart disease, Cancer">
                        </div>
                    </div>
                </div>
            </div>


            <div class="mb-5">
                <p class="lead fw-normal mb-1">Medications</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Current Medications</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="Lisinopril, Ventolin">
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Previous Medications and Treatments</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="Metformin, Allegra">
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" type="button">Add Another</button>
                    </div>
                </div>
            </div>


            <div class="mb-5">
                <p class="lead fw-normal mb-1">Allergies</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Known Allergies</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="Pollen, Penicillin">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <p class="lead fw-normal mb-1">Vaccinations Received</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Vaccination</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="COVID-19">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Vaccination Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" value="2022-05-15">
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" type="button">Add Another</button>
                    </div>
                </div>
            </div>


            <div class="mb-5">
                <p class="lead fw-normal mb-1">Surgical History</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Surgery</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="Appendectomy">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Surgery Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" value="2022-03-10">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Surgery Details</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3">The surgery was performed to remove the appendix.</textarea>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" type="button">Add Another Surgery</button>
                    </div>
                </div>
            </div>


            <div class="mb-5">
                <p class="lead fw-normal mb-1">Hospitalizations</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Hospitalization</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="Appendicitis">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Hospitalization Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" value="2022-03-10">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Hospitalization Details</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3">Admitted for appendicitis and underwent surgery.</textarea>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" type="button">Add Another Hospitalization</button>
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <p class="lead fw-normal mb-1">Diagnostic Tests</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                    <div class="form-group row mb-1">
                        <div class="form-group row mb-1">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Diagnostic Test Type</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="MRI Scan">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Diagnostic Test Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" value="2022-05-20">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Diagnostic Test Details</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3">The MRI scan was performed to assess the condition of my spine.</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Diagnostic Test Result</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" multiple>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="mb-5">
                <p class="lead fw-normal mb-1">Pregnancy and Reproductive History</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Number of Pregnancies</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="1">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Delivery Type</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="Cesarean section">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Delivery Complications</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="Preterm labor">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Delivery Details</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3">Both pregnancies resulted in healthy babies.</textarea>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" type="button">Add Another Pregnancy</button>
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <p class="lead fw-normal mb-1">Psychological History</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Mental health conditions</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="Anxiety disorder">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Previous counseling or therapy</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="Yes">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Other mental health information</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3">Currently on medication for anxiety.</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <p class="lead fw-normal mb-1">Emergency Contacts</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Emergency Contact Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="Sara Tarek">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Emergency Contact Relationship</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="Friend">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Emergency Contact Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="123-456-7890">
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" type="button">Add Another Emergency Contact</button>
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <p class="lead fw-normal mb-1">Other</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Smoking or tobacco use</label>
                        <div class="col-sm-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Alocohol Consumption</label>
                        <div class="col-sm-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Dietary preferences or restrictions</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3">vegetarian food.</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-primary" type="button">Save Changes</button>
                <button class="btn btn-secondary" type="button">Cancel</button>
            </div>
        </form>

    </div>
@endsection

