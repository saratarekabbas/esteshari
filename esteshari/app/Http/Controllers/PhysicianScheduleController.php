<?php

namespace App\Http\Controllers;

use App\Models\PhysicianSchedule;
use Illuminate\Http\Request;

class PhysicianScheduleController extends Controller
{
    public function index(){
        $events = PhysicianSchedule::all();
        return view('physician.physician_schedule.schedule_view', compact('events'));
    }

    public function store(Request $request){

        $event = new PhysicianSchedule();
        $event->slot_date = $request->input('slot_date');
        $event->slot_time = $request->input('slot_time');
        $event->save();
        return redirect()->route('physician.schedule.view')->with('success', 'Slot has been added successfully');
    }

    public function indexManage(){
        return view('physician.physician_schedule.schedule_manage');

    }

}
