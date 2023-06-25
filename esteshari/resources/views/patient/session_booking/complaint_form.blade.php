@extends('layouts.patient_layout')

@section('content')
    <div class="container">
        <h3 class="form-title">Complaint Form for Session with Dr. {{$physician->name}} on {{$session->slot_date}}
            , {{ substr($session->slot_time, 0, 5) }}</h3>
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Complaint details</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('patient.session_booking') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$session->id}}">
                            <input type="hidden" name="user_id" value="{{$physician->id}}">

                            <div class="mb-3">
                                <label for="nature-of-complaint" class="form-label">Nature of Complaint</label>
                                <input type="text" class="form-control" id="nature-of-complaint" placeholder="Enter the nature of complaint" required>
                            </div>
                            <div class="mb-3">
                                <label for="duration-of-complaint" class="form-label">Duration of Complaint</label>
                                <input type="text" class="form-control" id="duration-of-complaint" placeholder="Enter the duration of complaint" required>
                            </div>
                            <div class="mb-3">
                                <label for="severity" class="form-label">Severity</label>
                                <select class="form-select" id="severity" required>
                                    <option value="">Select severity</option>
                                    <option value="mild">Mild</option>
                                    <option value="moderate">Moderate</option>
                                    <option value="severe">Severe</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="symptoms" class="form-label">Symptoms</label>
                                <textarea class="form-control" id="symptoms" rows="3" placeholder="Enter the symptoms" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="previous-treatments" class="form-label">Previous Treatments</label>
                                <textarea class="form-control" id="previous-treatments" rows="3" placeholder="Enter details of previous treatments"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="relevant-medical-reports" class="form-label">Relevant Medical Reports</label>
                                <input type="file" class="form-control" id="relevant-medical-reports" accept=".pdf,.doc,.docx" multiple>
                            </div>
                            <button class="btn btn-primary" type="submit">
                                Next
                            </button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
