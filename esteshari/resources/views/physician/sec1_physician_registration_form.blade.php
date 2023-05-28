@extends('layouts.physician_layout')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="container">
        <h2>Horizontal form</h2>
        <form class="form-horizontal"  action="{{ route('physician.registration.store') }}" method="POST" enctype="multipart/form-data">
            @csrf







            <div class="form-group">
                <label for="identity_verification_files">Identity Verification (e.g., Passport, Identity Card):</label>
                <input type="file" name="identity_verification_files[]" multiple class="form-control-file">
            </div>


            {{--    <!-- Passport file -->--}}
            {{--    <input type="file" name="passport">--}}

            {{--    <!-- Insurance files -->--}}
            {{--    <input type="file" name="insurance[]" multiple>--}}


            <!-- Next Button -->
            <div class="text-center mt-4">
                <button type="button" id="nextButton" class="btn btn-primary">Next</button>
            </div>

            <!-- Bootstrap JS (at the end of the body for faster page load) -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // Hide the next section initially
                    document.getElementById('section2').style.display = 'none';

                    // Handle the next button click event
                    document.getElementById('nextButton').addEventListener('click', function () {
                        // Hide the current section
                        document.getElementById('section1').style.display = 'none';
                        // Show the next section
                        document.getElementById('section2').style.display = 'block';
                    });

                    // Handle the title select change event
                    const titleSelect = document.getElementById('title');
                    const otherTitleContainer = document.getElementById('otherTitleContainer');
                    const otherTitleInput = document.getElementById('otherTitle');

                    titleSelect.addEventListener('change', function () {
                        if (this.value === 'Other') {
                            otherTitleContainer.style.display = 'block';
                            otherTitleInput.required = true;
                        } else {
                            otherTitleContainer.style.display = 'none';
                            otherTitleInput.required = false;
                        }
                    });
                });
            </script>
            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
