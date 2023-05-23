<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhysicianRegistration;


class PhysicianRegistrationFormController extends Controller
{
    public function create()
    {
        $user = auth()->user();

        if ($user->status == 'pending') {
            // User is already registered, redirect them to the pending page
            return redirect()->route('physician.pending');
        }

        return view('physician.physician_registration_form');
    }

    public function store(Request $request)
    {
//         Check if the user is authenticated
        $user = $request->user();
        if ($user) {
            if ($user->status == 'pending') {
                return redirect()->back()->with('error', 'You have already submitted an application.');
            }

            // Validate the form data
            $validatedData = $request->validate([
                'full_name' => 'required|string',
                'phone_number' => 'required',
                'job_title' => 'required',
            ]);

            // Create a new PhysicianRegistration instance
            $physicianRegistration = new PhysicianRegistration();

            // Set the values from the form
            $physicianRegistration->full_name = $request->input('full_name');
            $physicianRegistration->phone_number = $request->input('phone_number');
            $physicianRegistration->job_title = $request->input('job_title');
            $physicianRegistration->user_id = $user->id;
//            $physicianRegistration->user()->associate($user);
//          $physicianRegistration->user_id = $user->id; //auth()->user()->id;

            // Save the physician registration data
            $physicianRegistration->save();

            // Output debug information
//            dd($physicianRegistration, $user);

            // Update the user's status to 'pending'
            $user->status = 'pending';
            $user->save();

//            return back()->with('success', 'Registration submitted successfully!');
            return redirect()->route('physician.pending')->with('success', 'Registration submitted successfully!');
        } else {
            // User is not authenticated
            return redirect()->back()->with('error', 'User is not authenticated.');
        }
    }
}
