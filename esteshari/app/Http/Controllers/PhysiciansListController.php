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
        $physician = User::where('id', '=', $request->id)->first();
        $availableSlots = PhysicianSchedule::where('id', '=', $request->id)->get();
        return view('patient.session_booking.book_session', compact('physician', 'availableSlots'));
    }
}
