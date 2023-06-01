<?php

namespace App\Http\Controllers;

use App\Models\BoardCertification;
use App\Models\EducationalQualification;
use App\Models\Insurance;
use App\Models\LanguageQualification;
use App\Models\PersonalInformation;
use App\Models\PhysicianReference;
use App\Models\ProfessionalRegistration;
use App\Models\User;
use App\Models\WorkExperience;
use Illuminate\Http\Request;

/*
 * This controller is for the system administrator. It is to manage the Physician Registration Application Requests, so that the admin can
 * view the registration requests, and respond to their request.
 */

class PhysicianRegistrationApplicationsManagementController extends Controller
{
    public function index()
    {
        $physician = User::where('role', 'physician')->get();
        $personalInformation = PersonalInformation::get();
        return view('administrator.physician_registration_requests_management.physician_pending_registration_requests', compact('physician', 'personalInformation'));
    }



    public function indexAll()
    {
        $physician = User::where('role', 'physician')->get();
        $personalInformation = PersonalInformation::get();
        $educationalQualification = EducationalQualification::get();
        $workExperience = WorkExperience::get();
        $boardCertification = BoardCertification::get();
        $professionalRegistration = ProfessionalRegistration::get();
        $physicianReference = PhysicianReference::get();
        $languageQualification = LanguageQualification::get();
        $insurance = Insurance::get();
        return view('administrator.physician_registration_requests_management.all_physician_registration_applications', compact('physician', 'personalInformation',
            'educationalQualification', 'workExperience', 'boardCertification', 'professionalRegistration', 'physicianReference', 'languageQualification', 'insurance'));
    }

    public function respond(Request $request)
    {
//        Section 1 : Personal Information
        $validatedData = $request->validate([
            'rejection_reason' => 'nullable|string',
            'response' => 'required|int'
        ]);

//        Send email



//        $personalInformation->save();
    }
}
