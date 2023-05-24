<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhysicianRegistration;
use Illuminate\Support\Facades\Auth;


class PhysicianRegistrationFormController extends Controller
{
    public function create()
    {
        return view('physician.physician_registration_form');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'full_name' => 'required|string',
            'phone_number' => 'required',
            'job_title' => 'required',
        ]);

        // Create a new PhysicianRegistration instance
        $physicianRegistration = new PhysicianRegistration();

        // Set the values from the form
        $physicianRegistration->title = $request->input('title');

        $physicianRegistration->full_name = $request->input('full_name');
        $physicianRegistration->phone_number = $request->input('phone_number');
        $physicianRegistration->job_title = $request->input('job_title');

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
