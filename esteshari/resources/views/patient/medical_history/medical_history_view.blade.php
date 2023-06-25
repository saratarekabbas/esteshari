@extends('layouts.patient_layout')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="container">
        <h2 class="form-title">My Medical History</h2>
        <div class="mb-5">
            <p class="lead fw-normal mb-1">Personal Information</p>
            <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-0"><span style="font-weight: 600">Full Name: </span>{{$data->name}}
                </p>
                <p class="font-italic mb-0"><span style="font-weight: 600">Gender: </span>Female</p>

                <p class="font-italic mb-0"><span style="font-weight: 600">Nationality: </span>Egyptian
                </p>
                 <p class="font-italic mb-0"><span style="font-weight: 600">Mobile Number: </span>+60-1165043455
                </p>
                 <p class="font-italic mb-0"><span style="font-weight: 600">Languages: </span>English, Arabic and French
                </p>
                 <p class="font-italic mb-0"><span style="font-weight: 600">Preferred Language for Communication: </span>English
                </p>
            </div>
        </div>

        <div class="mb-5">
            <p class="lead fw-normal mb-1">Medical Conditions</p>
            <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-0"><span style="font-weight: 600">Current medical conditions: </span>Hypertension, Asthma
                </p>
                <p class="font-italic mb-0"><span style="font-weight: 600">Past medical conditions: </span>Diabetes
                </p>
                <p class="font-italic mb-0"><span style="font-weight: 600">Family history of diseases or conditions: </span>Heart disease, Cancer
                </p>
            </div>
        </div>

        <div class="mb-5">
            <p class="lead fw-normal mb-1">Medications</p>
            <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-0"><span style="font-weight: 600">Current Medications: </span>Lisinopril, Ventolin
                </p>
                <p class="font-italic mb-0"><span style="font-weight: 600">Previous Medications and Treatments: </span>Metformin, Allegra
                </p>
            </div>
        </div>

        <div class="mb-5">
            <p class="lead fw-normal mb-1">Allergies</p>
            <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-0"><span style="font-weight: 600">Known Allergies: </span>Pollen, Penicillin
                </p>
            </div>
        </div>

        <div class="mb-5">
            <p class="lead fw-normal mb-1">Vaccinations Received</p>
            <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-0"><span style="font-weight: 600">Vaccination: </span>COVID-19
                </p>
                <p class="font-italic mb-0"><span style="font-weight: 600">Vaccination Date: </span>2022-05-15
                </p>
            </div>
        </div>

        <div class="mb-5">
            <p class="lead fw-normal mb-1">Surgical History</p>
            <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-0"><span style="font-weight: 600">Surgery: </span>Appendectomy
                </p><p class="font-italic mb-0"><span style="font-weight: 600">Surgery Date: </span>2022-03-10
                </p>
                <p class="font-italic mb-0"><span style="font-weight: 600">Surgery Details: </span>The surgery was performed to remove the appendix.
                </p>
            </div>
        </div>

        <div class="mb-5">
            <p class="lead fw-normal mb-1">Hospitalizations</p>
            <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-0"><span style="font-weight: 600">Hospitalizations: </span>Appendicitis</p>
                <p class="font-italic mb-0"><span style="font-weight: 600">Hospitalization Date: </span>2022-03-10</p>
                <p class="font-italic mb-0"><span style="font-weight: 600">Hospitalization Details: </span>Admitted for appendicitis and underwent surgery.</p>
            </div>
        </div>

        <div class="mb-5">
            <p class="lead fw-normal mb-1">Diagnostic Tests</p>
            <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-0"><span style="font-weight: 600">Diagnostic Test Type: </span>MRI Scan</p>
                <p class="font-italic mb-0"><span style="font-weight: 600">Diagnostic Test Type: </span>MRI Scan</p>
                <p class="font-italic mb-0"><span style="font-weight: 600">Diagnostic Test Date: </span>2022-05-20</p>
                <p class="font-italic mb-0"><span style="font-weight: 600">Diagnostic Test Details: </span>The MRI scan was performed to assess the condition of my spine.</p>
                <p class="font-italic mb-0"><span style="font-weight: 600">Diagnostic Test Files: </span></p>
                <ul class="list-group">
                    <li  class="list-group-item"><a href="{{ asset('storage/files/HoMXoWqZkAexxfI9CEZ6dsUugYKl25GdveeOnRlR.png') }}" target="_blank">View File 1</a></li>
                    <li class="list-group-item"><a href="{{ asset('storage/files/IIrM2I0vsSkd8YvkhE5tUczXfZnhYXqVVTqDCE4m.jpg') }}" target="_blank">View File 2</a></li>
                    <li class="list-group-item"><a href="{{ asset('storage/files/YLsYVCkjWS6Jg6UY3xg8N636zPSTknm9HcScBSbh.pdf') }}" target="_blank">View File 3</a></li>
                </ul>
            </div>
        </div>

        <div class="mb-5">
            <p class="lead fw-normal mb-1">Pregnancy and Reproductive History</p>
            <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-0"><span style="font-weight: 600">Number of Pregnancies: </span>1</p>
                <p class="font-italic mb-0"><span style="font-weight: 600">Delivery Type: </span>Cesarean section</p>
                <p class="font-italic mb-0"><span style="font-weight: 600">Delivery Complications: </span>Preterm labor</p>
                <p class="font-italic mb-0"><span style="font-weight: 600">Delivery Details: </span>Both pregnancies resulted in healthy babies.</p>
            </div>
        </div>

        <div class="mb-5">
            <p class="lead fw-normal mb-1">Psychological History</p>
            <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-0"><span style="font-weight: 600">Mental health conditions: </span>Anxiety disorder</p>
                <p class="font-italic mb-0"><span style="font-weight: 600">Previous counseling or therapy: </span>Yes</p>
                <p class="font-italic mb-0"><span style="font-weight: 600">Other mental health information: </span>Currently on medication for anxiety</p>
            </div>
        </div>


        <div class="mb-5">
            <p class="lead fw-normal mb-1">Emergency Contacts</p>
            <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-0"><span style="font-weight: 600">Emergency Contact Name: </span>Sara Tarek</p>
                <p class="font-italic mb-0"><span style="font-weight: 600">Emergency Contact Relationship: </span>Friend</p>
                <p class="font-italic mb-0"><span style="font-weight: 600">Emergency Contact Phone Number: </span>+60-1134545676</p>
            </div>
        </div>

        <div class="mb-5">
            <p class="lead fw-normal mb-1">Other</p>
            <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-0"><span style="font-weight: 600">Smoking or tobacco use: </span>No</p>
                <p class="font-italic mb-0"><span style="font-weight: 600">Alcohol Consumption: </span>No</p>
                <p class="font-italic mb-0"><span style="font-weight: 600">Dietary preferences or restrictions: </span>Vegetarian food.</p>
            </div>

        </div>


    </div>
@endsection

