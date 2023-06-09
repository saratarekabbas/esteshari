<?php

namespace App\Http\Controllers;

use App\Mail\PatientSessionBookedEmail;
use App\Mail\PhysicianSessionBookedEmail;
use App\Models\PhysicianSchedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PhysiciansListController extends Controller
{
    public function index()
    {
        $physicians = User::where('role', 'physician')
            ->where('status', 'approved')
            ->with('personalInformation')
            ->get();
        return view('patient.physicians_list.physicians_list_view', compact('physicians'));
    }


    public function book(Request $request)
    {
        $physician = User::where('id', $request->id)->first();
        $slots = PhysicianSchedule::where('user_id', $request->id)->get();
        $dates = calculateDates(date('Y-m-d'), 1);
        $currentDate = date('Y-m-d');

        return view('patient.session_booking.book_session', compact('physician', 'slots', 'dates', 'currentDate'));

    }

    public function payment(Request $request)
    {
        $session = PhysicianSchedule::where('id', $request->id)->first();
        $physician = User::where('id', $session->user_id)->first();;
        return view('patient.session_booking.session_payment', compact('session', 'physician'));

    }

    public function makePayment(Request $request)
    {
        $session = PhysicianSchedule::where('id', $request->id)->first();
        $physician = User::where('id', $session->user_id)->first();
        $patient = Auth::user();

        PhysicianSchedule::where('id', '=', $session->id)->update([
            'status' => "booked",
            'patient_id' => $patient->id
        ]);

        Mail::to($physician->email)->send(new PhysicianSessionBookedEmail($physician->email, $physician->name, 'Dr.', $patient->name, 'Ms.', substr($session->slot_time, 0, 5), $session->slot_date));
        Mail::to($patient->email)->send(new PatientSessionBookedEmail($patient->email, $patient->name, 'Ms.', $physician->name, 'Dr.', substr($session->slot_time, 0, 5), $session->slot_date));

        return redirect()->route('patient.upcoming_appointments')->with('success', 'Your booking has been confirmed');
    }

    public function upcomingAppointments()
    {
        $patient = Auth::user();

        $appointments = PhysicianSchedule::where('patient_id', $patient->id)->with('user')->orderBy('slot_date')
            ->orderBy('slot_time')
            ->get();


        return view('patient.appointments.upcoming_appointments', compact('appointments'));
    }
}

function calculateDates($currentDate, $direction)
{
    $dates = [];
    for ($i = 0; $i < 4; $i++) {
        $date = date('Y-m-d', strtotime($currentDate . " " . ($i * $direction) . " day"));
        $dates[] = $date;
    }
    return $dates;
}
