<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhysicianRegistration;
use Illuminate\Support\Facades\Auth;


class PhysicianRegistrationFormController extends Controller
{
    public function create()
    {
//        This will be handled in the middleware instead, so I am going to comment it out
//        $user = auth()->user();
//
//        if ($user->status == 'pending') {
//            // User is already registered, redirect them to the pending page
//            return redirect()->route('physician.pending');
//        }

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
        $physicianRegistration->full_name = $request->input('full_name');
        $physicianRegistration->phone_number = $request->input('phone_number');
        $physicianRegistration->job_title = $request->input('job_title');
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
