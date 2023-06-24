@extends('layouts.physician_layout')

@section('content')

    <div class="container">
        <h3 class="form-title">Post-session Form View for Patient: <a href="#" style="text-decoration: none">{{$patient->name}}</a></h3>
        <form class="form-content row g-3">
            <div class="col-12 col-md-12">
                <div class="form-floating">
                        <textarea rows="6" type="text" id="" name="" style="min-height: 75px"
                                  class="form-control">The patient is displaying symptoms consistent with acute bronchitis.</textarea>
                    <label for="">Probable Diagnosis </label>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="form-floating">
                        <textarea rows="6" type="text" id="" name="" style="min-height: 75px"
                                  class="form-control">Prescribe a course of antibiotics (e.g., Amoxicillin) for 7 days to treat the bacterial infection. Advise the patient to get plenty of rest, drink fluids, and use over-the-counter cough medicine to alleviate symptoms. Provide a prescription for a cough suppressant, if necessary.</textarea>
                    <label for="">Treatment plan</label>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="form-floating">
                        <textarea rows="6" type="text" id="" name="" style="min-height: 75px"
                                  class="form-control ">Schedule a follow-up appointment in 10 days to assess the patient's progress and adjust the treatment plan if needed. Instruct the patient to contact the clinic if symptoms worsen or if they develop difficulty breathing.</textarea>
                    <label for="">Follow-up Recommendations</label>

                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="form-floating">
                        <textarea rows="10" type="text" id="" name="" style="min-height: 150px"
                                  class="form-control">Advise the patient to avoid exposure to cigarette smoke or other irritants that could exacerbate their condition. Provide educational resources on managing acute bronchitis symptoms at home. Encourage the patient to complete the full course of antibiotics and emphasize the importance of proper hand hygiene to prevent the spread of infection.</textarea>
                    <label for="">Additional Notes</label>
                </div>
            </div>

        </form>

    </div>
@endsection
