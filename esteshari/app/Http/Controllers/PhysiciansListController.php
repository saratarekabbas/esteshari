<?php

namespace App\Http\Controllers;

use App\Models\PhysicianSchedule;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('patient.session_booking.session_payment', compact('session'));

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
