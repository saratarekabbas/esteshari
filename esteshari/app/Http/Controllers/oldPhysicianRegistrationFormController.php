<?php
//
//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Validator;
//use App\Models\PhysicianRegistrationForm;
//
//
//class PhysicianRegistrationFormController extends Controller
//{
//    /**
//     * Show the form for creating a new physician registration application.
//     *
//     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
//     */
//    public function create()
//    {
//        return view('physician.physician_registration_form');
//    }
//
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
//
//
//
//    /**
//     * Store a newly created physician registration application in storage.
//     *
//     * @param \Illuminate\Http\Request $request
//     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
//     */
//    public function store(Request $request)
//    {
//        $validator = Validator::make($request->all(), [
//            'name' => 'required|string|max:255',
//            'date_of_birth' => 'required|date',
//            'nationality' => 'required|string|max:255',
//            'gender' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users,email',
//            'phone_number' => 'required|string|max:255',
//            'address' => 'required|string|max:255',
//            'medical_degree_files' => 'required|array|min:1',
//            'medical_degree_files.*' => 'file|max:2000',
//            'other_qualifications_files' => 'array|min:1',
//            'other_qualifications_files.*' => 'file|max:2000',
//            'registration_and_license_files' => 'required|array|min:1',
//            'registration_and_license_files.*' => 'file|max:2000',
//            'board_certification_files' => 'array|min:1',
//            'board_certification_files.*' => 'file|max:2000',
//            'work_experience' => 'required|array|min:1',
//            'work_experience.*.job_title' => 'required|string|max:255',
//            'work_experience.*.employer' => 'required|string|max:255',
//            'work_experience.*.start_date' => 'required|date',
//            'work_experience.*.end_date' => 'nullable|date|after_or_equal:work_experience.*.start_date',
//            'background_check_files' => 'array|min:1',
//            'background_check_files.*' => 'file|max:2000',
//            'references' => 'required|array|min:2',
//            'references.*.name' => 'required|string|max:255',
//            'references.*.email' => 'required|string|email|max:255',
//            'references.*.phone_number' => 'required|string|max:255',
//            'malpractice_insurance_file' => 'required|file|max:2000',
//        ]);
//
//        if ($validator->fails()) {
//            return view('physician.registration.create')
//                ->withErrors($validator)
//                ->withInput();
//        }
//
//// Store form data into the database
//        $user = Auth::user();
//
//        $physicianRegistrationForm = new PhysicianRegistrationForm();
//        $physicianRegistrationForm->user_id = $user->id;
//        $physicianRegistrationForm->personal_info = json_encode([
//            'name' => $request->input('name'),
//            'date_of_birth' => $request->input('date_of_birth'),
//            'nationality' => $request->input('nationality'),
//            'gender' => $request->input('gender'),
//            'email' => $request->input('email'),
//            'phone_number' => $request->input('phone_number'),
//            'address' => $request->input('address'),
//        ]);
//
//
////
//        $educationalQualifications = [
//            'medical_degree' => $request->input('medical_degree'),
//            'other_qualifications' => $request->input('other_qualifications'),
//        ];
//
//        $physicianRegistrationForm->educational_qualifications = json_encode($educationalQualifications);
//
//// Professional Registration
//        $professionalRegistration = [
//            'registration_and_license' => $request->file('registration_and_license_files'),
//        ];
//
//        $physicianRegistrationForm->professional_registration = json_encode($professionalRegistration);
//
//        // Certifications
//
//        $certifications = [
//            'board_certifications' => $request->file('board_certification_files'),
//        ];
//
//        $physicianRegistrationForm->certifications = json_encode($certifications);
//
//        // Work Experience
//
//        $workExperience = [];
//
//        foreach ($request->input('work_experience') as $experience) {
//            $workExperience[] = [
//                'job_title' => $experience['job_title'],
//                'employer' => $experience['employer'],
//                'start_date' => $experience['start_date'],
//                'end_date' => $experience['end_date'],
//            ];
//        }
//
//        $physicianRegistrationForm->work_experience = json_encode($workExperience);
//
//// Background Check
//        $backgroundCheck = [
//            'background_check_files' => $request->file('background_check_files'),
//        ];
//
//        $physicianRegistrationForm->background_check = json_encode($backgroundCheck);
//
//// References
//        $references = [];
//
//        foreach ($request->input('references') as $reference) {
//            $references[] = [
//                'name' => $reference['name'],
//                'email' => $reference['email'],
//                'phone_number' => $reference['phone_number'],
//            ];
//        }
//
//        $physicianRegistrationForm->references = json_encode($references);
//
////        Maltpractice
//        $malpracticeInsurance = [
//            'file_path' => $request->file('malpractice_insurance_file')->store('malpractice_insurance'),
//            'file_name' => $request->file('malpractice_insurance_file')->getClientOriginalName(),
//        ];
//
//        $physicianRegistrationForm->malpractice_insurance = json_encode($malpracticeInsurance);
//
//        $physicianRegistrationForm->status = 'pending';
//        $physicianRegistrationForm->save();
//
//        return redirect()->route('physician.pending');
//    }
//}
