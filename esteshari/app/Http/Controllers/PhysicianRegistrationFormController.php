<?php

namespace App\Http\Controllers;

use App\Models\EducationalQualification;
use App\Models\HonorAward;
use App\Models\PersonalInformation;
use App\Models\PhysicianRegistration;
use App\Models\WorkExperience;
use App\Rules\MinimumAge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PhysicianRegistrationFormController extends Controller
{
    public function index($section = 1)
    {
        $user = Auth::user();
        $personalInformation = $user->personalInformation()->first();
        $educationalQualification = $user->educationalQualification()->first();
        $workExperience = $user->workExperience()->first();

        return view('physician.physician_registration_form.physician_registration_form', compact('section', 'personalInformation', 'educationalQualification', 'workExperience'));
    }


    public function store(Request $request)
    {
        $section = $request->input('section');

        switch ($section) {
            case 1:
                $this->section1($request);
                return redirect()->route('physician.registration.create', ['section' => 2])
                    ->with('success', 'Section 1 has been submitted successfully!');

            case 2:
                $this->section2($request);
                return redirect()->route('physician.registration.create', ['section' => 3])
                    ->with('success', 'Section 2 has been submitted successfully!');

            case 3:
                $this->section3($request);
                return redirect()->route('physician.registration.create', ['section' => 4])
                    ->with('success', 'Section 3 has been submitted successfully!');

            case 4:
                $this->section4($request);
                return redirect()->route('physician.registration.create', ['section' => 5])
                    ->with('success', 'Section 4 has been submitted successfully!');

            case 5:
                $this->section5($request);
                return redirect()->route('physician.registration.create', ['section' => 6])
                    ->with('success', 'Section 5 has been submitted successfully!');

            case 6:
                $this->section6($request);
                return redirect()->route('physician.registration.create', ['section' => 7])
                    ->with('success', 'Section 6 has been submitted successfully!');

            case 7:
                $this->section7($request);
                return redirect()->route('physician.registration.create', ['section' => 8])
                    ->with('success', 'Section 7 has been submitted successfully!');

            case 8:
                $this->section8($request);
                return redirect()->route('physician.pending')->with('success', 'Your Physician Registration has been submitted successfully!');

            default:
                return redirect()->route('physician.registration.create', ['section' => 1])
                    ->with('error', 'Invalid section!');
        }
    }

    public function section1(Request $request)
    {
//        Section 1 : Personal Information
        $validatedData = $request->validate([
            'designation' => 'required|string',
            'full_name' => 'required|string',
            'date_of_birth' => ['required', 'date', new MinimumAge],
            'gender' => 'required|string',
            'same_email' => 'nullable',
            'email_address' => 'required_if:same_email,0|email',
            'alternative_email_address' => 'required|email|different:email_address',
            'nationality' => 'required|string',
            'country_code' => ['required', 'numeric', 'digits_between:1,5'],
            'mobile_number' => ['required', 'numeric', 'digits_between:9,10'],
            'telephone_number' => ['required', 'numeric', 'digits_between:7,15'],
            'address_line_1' => 'required|string',
            'address_line_2' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'postal_code' => 'required|numeric|digits_between:5,10',
            'country' => 'required|string',
            'identity_verification_files' => ['sometimes', 'required', 'array', 'max:10'],
            'identity_verification_files.*' => 'file',
        ]);

        $user = Auth::user();
        $personalInformation = $user->personalInformation;

        if (!$personalInformation) {
            $personalInformation = new PersonalInformation();
            $personalInformation->user()->associate($user);
        }

        // Check if the selected title is "Other"
        if ($request->input('designation') === 'Other') {
            // Save the value from the "Other Title" input field
            $personalInformation->designation = $request->input('otherTitle');
        } else {
            // Save the selected title
            $personalInformation->designation = $request->input('designation');
        }

        $personalInformation->full_name = $request->input('full_name');
        $personalInformation->date_of_birth = $request->input('date_of_birth');
        $personalInformation->gender = $request->input('gender');

        if ($request->has('same_email')) {
            $email = $user->email;
        } else {
            $email = $request->input('email_address');
        }
        $personalInformation->email_address = $email;
//                $personalInformation->user()->associate($user);

        $personalInformation->alternative_email_address = $request->input('alternative_email_address');
        $personalInformation->nationality = $request->input('nationality');
        $personalInformation->country_code = $request->input('country_code');
        $personalInformation->mobile_number = $request->input('mobile_number');
        $personalInformation->telephone_number = $request->input('telephone_number');
        $personalInformation->address_line_1 = $request->input('address_line_1');
        $personalInformation->address_line_2 = $request->input('address_line_2');
        $personalInformation->city = $request->input('city');
        $personalInformation->state = $request->input('state');
        $personalInformation->postal_code = $request->input('postal_code');
        $personalInformation->country = $request->input('country');

        $existingFiles = json_decode($personalInformation->identity_verification_files, true) ?? [];
        $identityVerificationFiles = $request->file('identity_verification_files');

// Check if no existing files and no old files exist
        if (empty($existingFiles) && empty(old('identity_verification_files'))) {
            $request->validate([
                'identity_verification_files' => 'required',
            ]);
        }

        if ($identityVerificationFiles) {
            foreach ($identityVerificationFiles as $identityVerificationFile) {
                $identityVerificationFilePath = $identityVerificationFile->store('files', 'public');
                if (!in_array($identityVerificationFilePath, $existingFiles)) {
                    $existingFiles[] = $identityVerificationFilePath;
                }
            }
        } else {
            $existingFiles = $existingFiles ?? [];
        }

        $personalInformation->identity_verification_files = json_encode($existingFiles);


        $personalInformation->save();
    }

//    public function section2(Request $request)
//    {
//        // Section 2: Educational Qualifications
//        $validatedData = $request->validate([
//            // Qualification
//            'qualifications.*.degree_level' => 'required|string',
//            'qualifications.*.degree_title' => 'required|string',
//            'qualifications.*.institute' => 'required|string',
//            'qualifications.*.institute_location' => 'required|string',
//            'qualifications.*.year_of_graduation' => 'required|date',
//            'qualifications.*.medical_degree_files' => ['sometimes', 'required', 'array', 'max:10'],
//            'qualifications.*.medical_degree_files.*' => 'file',
//            // Honor
//            'qualifications.*.honors.*.award_type' => 'nullable|string',
//            'qualifications.*.honors.*.award_title' => 'nullable|string',
//            'qualifications.*.honors.*.date_of_award' => 'nullable|date',
//            'qualifications.*.honors.*.award_description' => 'nullable|string',
//        ]);
//
//        $user = Auth::user();
//
//        foreach ($request->input('educationalQualification') as $qualificationData) {
//            $educationalQualification = new EducationalQualification();
//            $educationalQualification->user()->associate($user);
//
//            if ($qualificationData['degree_level'] === 'Other') {
//                $educationalQualification->degree_level = $qualificationData['otherDegree'];
//            } else {
//                $educationalQualification->degree_level = $qualificationData['degree_level'];
//            }
//
//            $educationalQualification->degree_title = $qualificationData['degree_title'];
//            $educationalQualification->institute = $qualificationData['institute'];
//            $educationalQualification->institute_location = $qualificationData['institute_location'];
//            $educationalQualification->year_of_graduation = $qualificationData['year_of_graduation'];
//
//            $existingMedicalDegreeFiles = [];
//
//            if (isset($qualificationData['medical_degree_files'])) {
//                foreach ($qualificationData['medical_degree_files'] as $medicalDegreeFilesFile) {
//                    $medicalDegreeFilePath = $medicalDegreeFilesFile->store('files', 'public');
//                    $existingMedicalDegreeFiles[] = $medicalDegreeFilePath;
//                }
//            }
//
//            $educationalQualification->medical_degree_files = json_encode($existingMedicalDegreeFiles);
//
//            $educationalQualification->save();
//
//            // Save honors for the qualification
//            if (isset($qualificationData['honors'])) {
//                foreach ($qualificationData['honors'] as $honorData) {
//                    $honor = new HonorAward();
//                    $honor->educationalQualification()->associate($educationalQualification);
//                    if ($qualificationData['award_type'] === 'Other') {
//                        $educationalQualification->award_type = $honorData['otherAwardType'];
//                    } else {
//                        $educationalQualification->award_type = $honorData['award_type'];
//                    }
//                    $honor->award_title = $honorData['award_title'];
//                    $honor->date_of_award = $honorData['date_of_award'];
//                    $honor->award_description = $honorData['award_description'];
//                    $honor->save();
//                }
//            }
//        }
//    }


    public function section2(Request $request)
    {
//Section 2: Educational Qualifications
        $validatedData = $request->validate([
//           Qualification
            'degree_level' => 'required|string',
            'degree_title' => 'required|string',
            'institute' => 'required|string',
            'institute_location' => 'required|string',
            'year_of_graduation' => 'required|date',
            'medical_degree_files' => ['sometimes', 'required', 'array', 'max:10'],
            'medical_degree_files.*' => 'file',
//           Honor
            'award_type' => 'nullable|string',
            'award_title' => 'nullable|string',
            'date_of_award' => 'nullable|date',
            'award_description' => 'nullable|string',
        ]);

        $user = Auth::user();
        $educationalQualification = $user->educationalQualification()->firstOrNew();

        if (!$educationalQualification) {
            $educationalQualification = new EducationalQualification();
            $educationalQualification->user()->associate($user);
        }

        if ($request->input('degree_level') === 'Other') {
            $educationalQualification->degree_level = $request->input('otherDegreeType');
        } else {
            $educationalQualification->degree_level = $request->input('degree_level');
        }

        $educationalQualification->degree_title = $request->input('degree_title');
        $educationalQualification->institute = $request->input('institute');
        $educationalQualification->institute_location = $request->input('institute_location');
        $educationalQualification->year_of_graduation = $request->input('year_of_graduation');


        $existingMedicalDegreeFiles = json_decode($educationalQualification->medical_degree_files, true) ?? [];
        $medicalDegreeFiles = $request->file('medical_degree_files');

        // Check if no existing files and no old files exist
        if (empty($existingMedicalDegreeFiles) && empty(old('medical_degree_files'))) {
            $request->validate([
                'medical_degree_files' => 'required',
            ]);
        }

        if ($medicalDegreeFiles) {
            foreach ($medicalDegreeFiles as $medicalDegreeFile) {
                $medicalDegreeFilePath = $medicalDegreeFile->store('files', 'public');
                if (!in_array($medicalDegreeFilePath, $existingMedicalDegreeFiles)) {
                    $existingMedicalDegreeFiles[] = $medicalDegreeFilePath;
                }
            }
        } else {
            $existingMedicalDegreeFiles = $existingMedicalDegreeFiles ?? [];
        }

        $educationalQualification->medical_degree_files = json_encode($existingMedicalDegreeFiles);

// Handle awards data
        $awardType = $request->input('award_type');
        if ($awardType) {
            $award = new HonorAward();
            $award->award_type = $awardType;
            $award->award_title = $request->input('award_title');
            $award->date_of_award = $request->input('date_of_award');
            $award->award_description = $request->input('award_description');
            $award->save();

            $educationalQualification->award_id = $award->id;
        }

        $educationalQualification->save();

    }

    public function section3(Request $request)
    {
//        Section 3: Work Experience
        $validatedData = $request->validate([
            'job_title' => 'required|string',
            'employer_name' => 'required|string',
            'employment_type' => 'required|string',
            'start_date_of_employment' => 'required|date',
            'end_date_of_employment' => 'nullable|date|after:start_date_of_employment',
            'current_role' => 'required|int',
            'job_location_city' => 'required|string',
            'job_location_country' => 'required|string',
            'location_type' => 'required|string',
            'job_description' => 'required|string',
            'job_experience_files' => 'array|max:10',
            'job_experience_files.*' => 'file',
        ]);
        
        $user = Auth::user();

        $workExperience = $user->workExperience;

        if (!$workExperience) {
            $workExperience = new WorkExperience();
            $workExperience->user()->associate($user);
        }

        $workExperience->job_title = $request->input('job_title');
        $workExperience->employer_name = $request->input('employer_name');
        $workExperience->employment_type = $request->input('employment_type');
        $workExperience->start_date_of_employment = $request->input('start_date_of_employment');
        $workExperience->end_date_of_employment = $request->input('end_date_of_employment');
        $workExperience->current_role = $request->input('current_role') ? 1 : 0;
        $workExperience->job_location_city = $request->input('job_location_city');
        $workExperience->job_location_country = $request->input('job_location_country');
        $workExperience->location_type = $request->input('location_type');
        $workExperience->job_description = $request->input('job_description');


        $existingJobExperienceFiles = json_decode($workExperience->job_experience_files, true) ?? [];
        $jobExperienceFiles = $request->file('job_experience_files');

// Check if no existing files and no old files exist

        if ($jobExperienceFiles) {
            foreach ($jobExperienceFiles as $jobExperienceFile) {
                $jobExperienceFilePath = $jobExperienceFile->store('files', 'public');
                if (!in_array($jobExperienceFilePath, $existingJobExperienceFiles)) {
                    $existingJobExperienceFiles[] = $jobExperienceFilePath;
                }
            }
        } else {
            $existingJobExperienceFiles = $existingJobExperienceFiles ?? [];
        }

        $workExperience->job_experience_files = json_encode($existingJobExperienceFiles);

        $workExperience->save();
    }

    public function section4(Request $request)
    {

    }

    public function section5(Request $request)
    {

    }

    public function section6(Request $request)
    {

    }

    public function section7(Request $request)
    {

    }

    public function section8(Request $request)
    {
        $user = Auth::user();
        $user->status = 'pending';
        $user->save();
    }

    /*  public function store(Request $request)
      {
          // Validate the form data
  //        $validatedData = $request->validate([
  //            'full_name' => 'required|string',
  //            'phone_number' => 'required',
  //            'job_title' => 'required',
  //        ]);

          // Create a new PhysicianRegistration instance
          $physicianRegistration = new PhysicianRegistration();

          // Set the values from the form


  //        SECTION 1: PERSONAL INFO
          // Check if the selected title is "Other"
          if ($request->input('title') === 'Other') {
              // Save the value from the "Other Title" input field
              $physicianRegistration->title = $request->input('otherTitle');
          } else {
              // Save the selected title
              $physicianRegistration->title = $request->input('title');
          }

          $physicianRegistration->full_name = $request->input('full_name');
          $physicianRegistration->date_of_birth = $request->input('date_of_birth');
          $physicianRegistration->gender = $request->input('gender');
          $physicianRegistration->alternative_email_address = $request->input('alternative_email_address');
          $physicianRegistration->nationality = $request->input('nationality');
          $physicianRegistration->country_code = $request->input('country_code');
          $physicianRegistration->mobile_number = $request->input('mobile_number');
          $physicianRegistration->telephone_number = $request->input('telephone_number');
          $physicianRegistration->street_address = $request->input('street_address');
          $physicianRegistration->street_address2 = $request->input('street_address2');
          $physicianRegistration->city = $request->input('city');
          $physicianRegistration->state_province = $request->input('state_province');
          $physicianRegistration->postal_code = $request->input('postal_code');
          $physicianRegistration->country = $request->input('country');
          if ($request->hasFile('identity_verification_files')) {
              $identityVerificationFiles = [];
              foreach ($request->file('identity_verification_files') as $identityVerificationFile) {
                  $insuranceFilePath = $identityVerificationFile->store('files'); // Store each insurance file in the 'files' directory
                  $identityVerificationFiles[] = $insuranceFilePath;
              }
              // Save the insurance files' paths to the database as a JSON array
              $physicianRegistration->identity_verification_files = json_encode($identityVerificationFiles);
          }


  //        SINGLE FILE
          if ($request->hasFile('passport')) {
              $passportFile = $request->file('passport');
              $passportFilePath = $passportFile->store('files'); // Store the passport file in the 'files' directory
              // Save the passport file path to the database
              $physicianRegistration->passport_file = $passportFilePath;
          }
  //        MULTIPLE FILES
          if ($request->hasFile('insurance')) {
              $insuranceFiles = [];
              foreach ($request->file('insurance') as $insuranceFile) {
                  $insuranceFilePath = $insuranceFile->store('files'); // Store each insurance file in the 'files' directory
                  $insuranceFiles[] = $insuranceFilePath;
              }
              // Save the insurance files' paths to the database as a JSON array
              $physicianRegistration->insurance_files = json_encode($insuranceFiles);
          }


          $user = Auth::user();

          // Check if the "same email" checkbox is selected
          if ($request->has('same_email')) {
              // Use the same email address as the user's registration
              $email = $user->email;
          } else {
              // Use the email address entered in the form
              $email = $request->input('email');
          }

          // Set the email address for the physician registration
          $physicianRegistration->email = $email;
          $physicianRegistration->user()->associate($user);

          // Save the physician registration data
          $physicianRegistration->save();

          // Update the user's status to 'pending'
          $user->status = 'pending';
          $user->save();

  //            return back()->with('success', 'Registration submitted successfully!');
          return redirect()->route('physician.pending')->with('success', 'Registration submitted successfully!');
      }
    */
}
