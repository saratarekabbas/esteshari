@extends('layouts.physician_layout')

@section('content')
    <div class="container">
        <h3 class="form-title">Patient Complaint Form</h3>
        <form>
            <div class="mb-3">
                <label for="nature-of-complaint" class="form-label">Nature of Complaint</label>
                <input type="text" class="form-control" id="nature-of-complaint" placeholder="Enter the nature of complaint" value="Cough with chest congestion" required>
            </div>
            <div class="mb-3">
                <label for="duration-of-complaint" class="form-label">Duration of Complaint</label>
                <input type="text" class="form-control" id="duration-of-complaint" placeholder="Enter the duration of complaint" value="3 days" required>
            </div>
            <div class="mb-3">
                <label for="severity" class="form-label">Severity</label>
                <select class="form-select" id="severity" required>
                    <option value="">Select severity</option>
                    <option value="mild" selected>Mild</option>
                    <option value="moderate">Moderate</option>
                    <option value="severe">Severe</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="symptoms" class="form-label">Symptoms</label>
                <textarea class="form-control" id="symptoms" rows="3" placeholder="Enter the symptoms" required>Dry cough, chest tightness, mild difficulty breathing</textarea>
            </div>
            <div class="mb-3">
                <label for="previous-treatments" class="form-label">Previous Treatments</label>
                <textarea class="form-control" id="previous-treatments" rows="3" placeholder="Enter details of previous treatments">Drank plenty of fluids, used over-the-counter cough syrup</textarea>
            </div>
            <div class="mb-3">
                <label for="relevant-medical-reports" class="form-label">Relevant Medical Reports</label>
                    <ul class="list-group">
                        <li  class="list-group-item"><a href="{{ asset('storage/files/HoMXoWqZkAexxfI9CEZ6dsUugYKl25GdveeOnRlR.png') }}" target="_blank">View File 1</a></li>
                        <li class="list-group-item"><a href="{{ asset('storage/files/IIrM2I0vsSkd8YvkhE5tUczXfZnhYXqVVTqDCE4m.jpg') }}" target="_blank">View File 2</a></li>
                        <li class="list-group-item"><a href="{{ asset('storage/files/YLsYVCkjWS6Jg6UY3xg8N636zPSTknm9HcScBSbh.pdf') }}" target="_blank">View File 3</a></li>
                    </ul>
            </div>
        </form>
    </div>

@endsection
