<?php

namespace App\Http\Controllers;

use App\Mail\PhysicianApprovalEmail;
use App\Mail\PhysicianRejectionEmail;
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
use Illuminate\Support\Facades\Mail;

/*
 * This controller is for the system administrator. It is to manage the Physician Registration Application Requests, so that the admin can
 * view the registration requests, and respond to their request.
 */

class PhysicianRegistrationApplicationsManagementController extends Controller
{
    public function index()
    {
        $pendingPhysicians = User::where('role', 'physician')
            ->where('status', 'pending')
            ->with('personalInformation')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('administrator.physician_registration_requests_management.physician_pending_registration_requests', compact('pendingPhysicians'));
    }

    public function respond(Request $request)
    {
        $physicianId = $request->input('id');
        $action = $request->input('action');

        $physician = User::find($physicianId);

        if ($physician) {
            $recipientEmail = $physician->personalInformation->email_address;
            $recipientFullName = $physician->name;
            $recipientDesignation = $physician->personalInformation->designation;
            if ($action === 'approve') {
                $physician->status = 'approved';
                Mail::to($recipientEmail)->send(new PhysicianApprovalEmail($recipientEmail, $recipientFullName, $recipientDesignation));
            } elseif ($action === 'reject') {
                $physician->status = 'denied';
                Mail::to($recipientEmail)->send(new PhysicianRejectionEmail($recipientEmail, $recipientFullName, $recipientDesignation));
            }
            $physician->save();
            return redirect()->back()->with('success', 'Physician status updated successfully.');
        }
        return redirect()->back()->with('error', 'Physician not found.');
    }

    public function view($id)
    {
        $physician = User::with('personalInformation', 'educationalQualification', 'workExperience',
            'boardCertification', 'professionalRegistration', 'physicianReference', 'langaugeQualification', 'insurance')
            ->find($id);

        if ($physician) {
            return view('administrator.physician_registration_requests_management.physician_pending_registration_request', ['physician' => $physician]);
        }

        return redirect()->back()->with('error', 'Physician not found.');
    }

    public function indexAll()
    {
        $allPhysicians = User::where('role', 'physician')
            ->where('status', '!=', 'registered')
            ->with('personalInformation', 'educationalQualification', 'workExperience',
                'boardCertification', 'professionalRegistration', 'physicianReference', 'langaugeQualification', 'insurance')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('administrator.physician_registration_requests_management.all_physician_registration_applications', compact('allPhysicians'));

    }

    public function indexAllPhysicians(){
        $allPhysicians = User::where('role', 'physician')
            ->with('personalInformation', 'educationalQualification', 'workExperience',
                'boardCertification', 'professionalRegistration', 'physicianReference', 'langaugeQualification', 'insurance')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('administrator.all_physicians.all_physicians', compact('allPhysicians'));
    }
}
