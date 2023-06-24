@extends('layouts.physician_layout')

@section('content')
    <div class="container">
        <h3 class="form-title">Post-session Form for Patient: <a href="#" style="text-decoration: none">{{$patient->name}}</a></h3>
        <form class="form-content row g-3" action="{{ route('physician.post_session.store')  }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="session_id" value="{{$session->id}}">
            <div class="col-12 col-md-12">
                <div class="form-floating">
                        <textarea rows="6" type="text" id="" name=""
                                  class="form-control"></textarea>
                    <label for="">Probable Diagnosis </label>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="form-floating">
                        <textarea rows="6" type="text" id="" name=""
                                  class="form-control"></textarea>
                    <label for="">Treatment plan</label>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="form-floating">
                        <textarea rows="6" type="text" id="" name=""
                                  class="form-control "></textarea>
                    <label for="">Follow-up Recommendations</label>

                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="form-floating">
                        <textarea rows="10" type="text" id="" name=""
                                  class="form-control"></textarea>
                    <label for="">Additional Notes</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">
                Submit
            </button>
        </form>
    </div>
@endsection
