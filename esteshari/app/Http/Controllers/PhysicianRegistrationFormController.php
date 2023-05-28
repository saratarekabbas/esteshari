<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhysicianRegistration;
use Illuminate\Support\Facades\Auth;


class PhysicianRegistrationFormController extends Controller
{
    public function create()
    {
        return view('physician.physician_registration_form.physician_registration_form');
    }

    public function store(Request $request)
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
}
