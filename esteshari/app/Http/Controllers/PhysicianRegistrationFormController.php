<?php

namespace App\Http\Controllers;

use App\Models\EducationalQualification;
use App\Models\HonorAward;
use App\Models\PersonalInformation;
use App\Models\PhysicianRegistration;
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

        return view('physician.physician_registration_form.physician_registration_form', compact('section', 'personalInformation', 'educationalQualification'));
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

//        $personalInformation = new PersonalInformation();
        $user = Auth::user();
        $personalInformation = $user->personalInformation;
//        $personalInformation->user()->associate($user);

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


//        $existingFiles = json_decode($personalInformation->identity_verification_files, true) ?? [];
//        $identityVerificationFiles = $request->file('identity_verification_files');
//
//        if ($identityVerificationFiles) {
//            foreach ($identityVerificationFiles as $identityVerificationFile) {
//                $identityVerificationFilePath = $identityVerificationFile->store('files', 'public');
//                if (!in_array($identityVerificationFilePath, $existingFiles)) {
//                    $existingFiles[] = $identityVerificationFilePath;
//                }
//            }
//        } else {
//            $existingFiles = $existingFiles ?? [];
//        }
//
//        $personalInformation->identity_verification_files = json_encode($existingFiles);

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

    public function section2(Request $request)
    {
        // Section 2: Educational Qualifications
        $validatedData = $request->validate([
            // Qualification
            'qualifications.*.degree_level' => 'required|string',
            'qualifications.*.degree_title' => 'required|string',
            'qualifications.*.institute' => 'required|string',
            'qualifications.*.institute_location' => 'required|string',
            'qualifications.*.year_of_graduation' => 'required|date',
            'qualifications.*.medical_degree_files' => ['sometimes', 'required', 'array', 'max:10'],
            'qualifications.*.medical_degree_files.*' => 'file',
            // Honor
            'qualifications.*.honors.*.award_type' => 'nullable|string',
            'qualifications.*.honors.*.award_title' => 'nullable|string',
            'qualifications.*.honors.*.date_of_award' => 'nullable|date',
            'qualifications.*.honors.*.award_description' => 'nullable|string',
        ]);

        $user = Auth::user();

        foreach ($request->input('qualifications') as $qualificationData) {
            $educationalQualification = new EducationalQualification();
            $educationalQualification->user()->associate($user);

            if ($qualificationData['degree_level'] === 'Other') {
                $educationalQualification->degree_level = $qualificationData['otherDegree'];
            } else {
                $educationalQualification->degree_level = $qualificationData['degree_level'];
            }

            $educationalQualification->degree_title = $qualificationData['degree_title'];
            $educationalQualification->institute = $qualificationData['institute'];
            $educationalQualification->institute_location = $qualificationData['institute_location'];
            $educationalQualification->year_of_graduation = $qualificationData['year_of_graduation'];

            $existingMedicalDegreeFiles = [];

            if (isset($qualificationData['medical_degree_files'])) {
                foreach ($qualificationData['medical_degree_files'] as $medicalDegreeFilesFile) {
                    $medicalDegreeFilePath = $medicalDegreeFilesFile->store('files', 'public');
                    $existingMedicalDegreeFiles[] = $medicalDegreeFilePath;
                }
            }

            $educationalQualification->medical_degree_files = json_encode($existingMedicalDegreeFiles);

            $educationalQualification->save();

            // Save honors for the qualification
            if (isset($qualificationData['honors'])) {
                foreach ($qualificationData['honors'] as $honorData) {
                    $honor = new HonorAward();
                    $honor->educationalQualification()->associate($educationalQualification);
                    if ($qualificationData['award_type'] === 'Other') {
                        $educationalQualification->award_type = $honorData['otherAwardType'];
                    } else {
                        $educationalQualification->award_type = $honorData['award_type'];
                    }
                    $honor->award_title = $honorData['award_title'];
                    $honor->date_of_award = $honorData['date_of_award'];
                    $honor->award_description = $honorData['award_description'];
                    $honor->save();
                }
            }
        }
    }


//    public function section2(Request $request)
//    {
////Section 2: Educational Qualifications
//        $validatedData = $request->validate([
////           Qualification
//            'degree_level' => 'required|string',
//            'degree_title' => 'required|string',
//            'institute' => 'required|string',
//            'institute_location' => 'required|string',
//            'year_of_graduation' => 'required|date',
//            'medical_degree_files' => ['sometimes', 'required', 'array', 'max:10'],
//            'medical_degree_files.*' => 'file',
////           Honor
//            'award_type' => 'nullable|string',
//            'award_title' => 'nullable|string',
//            'date_of_award' => 'nullable|date',
//            'award_description' => 'nullable|string',
//        ]);
//
//        $user = Auth::user();
//        $educationalQualification = $user->educationalQualification;
//
//        if (!$educationalQualification) {
//            $educationalQualification = new EducationalQualification();
//            $educationalQualification->user()->associate($user);
//        }
//
//        if ($request->input('degree_level') === 'Other') {
//            $educationalQualification->degree_level = $request->input('otherAwardType');
//        } else {
//            $educationalQualification->degree_level = $request->input('otherDegree');
//        }
//
//        $educationalQualification->degree_title = $request->input('degree_title');
//        $educationalQualification->institute = $request->input('institute');
//        $educationalQualification->institute_location = $request->input('institute_location');
//        $educationalQualification->year_of_graduation = $request->input('year_of_graduation');
//
//
//        $existingMedicalDegreeFiles = json_decode($educationalQualification->medical_degree_files, true) ?? [];
//        $medicalDegreeFilesFiles = $request->file('medical_degree_files');
//
//// Check if no existing files and no old files exist
//        if (empty($existingMedicalDegreeFiles) && empty(old('medical_degree_files'))) {
//            $request->validate([
//                'medical_degree_files' => 'required',
//            ]);
//        }
//
//        if ($medicalDegreeFilesFiles) {
//            foreach ($medicalDegreeFilesFiles as $medicalDegreeFilesFile) {
//                $medicalDegreeFilePath = $medicalDegreeFilesFile->store('files', 'public');
//                if (!in_array($medicalDegreeFilePath, $existingMedicalDegreeFiles)) {
//                    $existingMedicalDegreeFiles[] = $medicalDegreeFilePath;
//                }
//            }
//        } else {
//            $existingMedicalDegreeFiles = $existingMedicalDegreeFiles ?? [];
//        }
//
//        $educationalQualification->medical_degree_files = json_encode($existingMedicalDegreeFiles);
//
//
//        $educationalQualification->save();
//    }

    public function section3(Request $request)
    {

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


        //        SINGLE FILE
//        if ($request->hasFile('passport')) {
//            $passportFile = $request->file('passport');
//            $passportFilePath = $passportFile->store('files'); // Store the passport file in the 'files' directory
//            // Save the passport file path to the database
//            $physicianRegistration->passport_file = $passportFilePath;
//        }
//        //        MULTIPLE FILES
//        if ($request->hasFile('insurance')) {
//            $insuranceFiles = [];
//            foreach ($request->file('insurance') as $insuranceFile) {
//                $insuranceFilePath = $insuranceFile->store('files'); // Store each insurance file in the 'files' directory
//                $insuranceFiles[] = $insuranceFilePath;
//            }
//            // Save the insurance files' paths to the database as a JSON array
//            $physicianRegistration->insurance_files = json_encode($insuranceFiles);
//        }

    }

}
