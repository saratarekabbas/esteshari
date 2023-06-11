@yield('section3')
<div class="progress">
    <div class="progress-bar" role="progressbar" style="width: 28.6%" aria-valuenow="25" aria-valuemin="0"
         aria-valuemax="100"></div>
</div>

<h4 class="form-subtitle">Section 3: Work Experience</h4>
<hr class="hr hr-blurry"/>


<form method="POST" action="{{ route('physician.registration.store') }}">
    <input type="hidden" name="section" value="3">
    @csrf

    <!-- Your other form fields -->

    <div id="work-experiences-container">
        <div class="work-experience">
            <h3>Work Experience</h3>
{{--            <div class="form-group">--}}
{{--                <label for="job_title">Job Title</label>--}}
{{--                <input type="text" name="work_experiences[0][job_title]" class="form-control" required>--}}
{{--            </div>--}}
            <div class="form-group">
                <label for="employer_name">Employer Name</label>
                <input type="text" name="work_experiences[0][employer_name]" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="employment_type">Employment Type</label>
                <input type="text" name="work_experiences[0][employment_type]" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="start_date_of_employment">Start Date of Employment</label>
                <input type="date" name="work_experiences[0][start_date_of_employment]" class="form-control"
                       required>
            </div>
            <div class="form-group">
                <label for="end_date_of_employment">End Date of Employment</label>
                <input type="date" name="work_experiences[0][end_date_of_employment]" class="form-control">
            </div>
            <div class="form-group">
                <label for="current_role">Current Role</label>
                <input type="hidden" name="work_experiences[0][current_role]" value="0">
                <input type="checkbox" name="work_experiences[0][current_role]" value="1"
                       class="form-check-input">
            </div>

            <div class="form-group">
                <label for="job_location_city">Job Location (City)</label>
                <input type="text" name="work_experiences[0][job_location_city]" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="job_location_country">Job Location (Country)</label>
                <input type="text" name="work_experiences[0][job_location_country]" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="location_type">Location Type</label>
                <input type="text" name="work_experiences[0][location_type]" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="job_description">Job Description</label>
                <textarea name="work_experiences[0][job_description]" class="form-control"></textarea>
            </div>

        </div>
    </div>

    <button type="button" id="add-work-experience" class="btn btn-primary">Add Work Experience</button>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    $(document).ready(function () {
        var workExperienceIndex = 1;

        $('#add-work-experience').click(function () {
            var newWorkExperience = `
                <div class="work-experience">
                    <h3>Work Experience</h3>
                    <div class="form-group">
                        <label for="job_title">Job Title</label>
                        <input type="text" name="work_experiences[${workExperienceIndex}][job_title]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="employer_name">Employer Name</label>
                        <input type="text" name="work_experiences[${workExperienceIndex}][employer_name]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="employment_type">Employment Type</label>
                        <input type="text" name="work_experiences[${workExperienceIndex}][employment_type]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date_of_employment">Start Date of Employment</label>
                        <input type="date" name="work_experiences[${workExperienceIndex}][start_date_of_employment]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date_of_employment">End Date of Employment</label>
                        <input type="date" name="work_experiences[${workExperienceIndex}][end_date_of_employment]" class="form-control">
                    </div>
                     <div class="form-group">
                <label for="current_role">Current Role</label>
                <input type="hidden" name="work_experiences[${workExperienceIndex}][current_role]" value="0">
                <input type="checkbox" name="work_experiences[${workExperienceIndex}][current_role]" value="1" class="form-check-input">
            </div>


                    <div class="form-group">
                        <label for="job_location_city">Job Location (City)</label>
                        <input type="text" name="work_experiences[${workExperienceIndex}][job_location_city]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="job_location_country">Job Location (Country)</label>
                        <input type="text" name="work_experiences[${workExperienceIndex}][job_location_country]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="location_type">Location Type</label>
                        <input type="text" name="work_experiences[${workExperienceIndex}][location_type]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="job_description">Job Description</label>
                        <textarea name="work_experiences[${workExperienceIndex}][job_description]" class="form-control"></textarea>
                    </div>

                </div>
            `;

            workExperienceIndex++;
            $('#work-experiences-container').append(newWorkExperience);

        });
    });
</script>
