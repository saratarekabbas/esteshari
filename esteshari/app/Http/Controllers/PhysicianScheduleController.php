<?php

namespace App\Http\Controllers;

use App\Models\PhysicianSchedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\Rule;
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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'slot_date' => 'required|date',
            'slot_time' => 'required|date_format:H:i', Rule::in($this->getValidSlotTimes())
        ]);

        $slotTime = $validatedData['slot_time'];
        if (substr($slotTime, -2) !== '00') {
            // Slot time does not have 00 minutes, add a validation error
            $errors = new MessageBag;
            $errors->add('slot_time', 'The slot time must have 00 minutes.');
            return redirect()->back()->withErrors($errors)->withInput();
        }


        $user = Auth::user();

        $slotDate = $validatedData['slot_date'];
        $slotTime = $validatedData['slot_time'];

        $existingSlot = PhysicianSchedule::where('slot_date', $slotDate)
            ->where('slot_time', $slotTime)
            ->first();

        if ($existingSlot) {
            $errors = new MessageBag;
            $errors->add('slot_time', 'A slot with the same date and time already exists.');
            return redirect()->back()->withErrors($errors)->withInput();
        }

        $physicianSchedule = new PhysicianSchedule();
        $physicianSchedule->slot_date = $slotDate;
        $physicianSchedule->slot_time = $slotTime;
        $physicianSchedule->user()->associate($user);
        $physicianSchedule->save();

        return redirect()->route('physician.schedule.view')->with('success', 'Slot has been added successfully');
    }


//    public function indexManage(){
//        return view('physician.physician_schedule.schedule_manage');
//
//    }

    private function getValidSlotTimes()
    {
        $validTimes = [];
        for ($hour = 0; $hour < 24; $hour++) {
            $validTimes[] = sprintf('%02d:00', $hour);
        }
        return $validTimes;
    }


}
