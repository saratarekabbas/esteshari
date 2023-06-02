<?php

namespace App\Http\Controllers;

use App\Models\PhysicianSchedule;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class PhysicianScheduleController extends Controller
{
    public function index(){
        $slots = PhysicianSchedule::all();

        $events = [];

        foreach ($slots as $slot) {
            $event = [
                'title' => 'Slot',
                'start' => $slot->slot_date . 'T' . $slot->slot_time,
                'allDay' => false
            ];

            $events[] = $event;
        }

        $events = json_encode($events);

        return view('physician.physician_schedule.schedule_view', compact('events'));
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'slot_date' => 'required|date',
            'slot_time' => 'required|date_format:H:i'
        ]);

        $slotDate = $validatedData['slot_date'];
        $slotTime = $validatedData['slot_time'];

        $existingSlot = PhysicianSchedule::where('slot_date', $slotDate)
            ->where('slot_time', $slotTime)
            ->first();

        if ($existingSlot) {
            $errors = new MessageBag;
            $errors->add('slot_time', 'A slot with the same date and time already exists.');

            return Redirect::back()->withErrors($errors)->withInput();
        }

        $slot = new PhysicianSchedule();
        $slot->slot_date = $slotDate;
        $slot->slot_time = $slotTime;
        $slot->save();
        return redirect()->route('physician.schedule.view')->with('success', 'Slot has been added successfully');
    }

    public function indexManage(){
        return view('physician.physician_schedule.schedule_manage');

    }

}
