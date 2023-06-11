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
        $physician = Auth::user();

        $slots = PhysicianSchedule::where('user_id', $physician->id)->get();

        $events = [];

        foreach ($slots as $slot) {
            $event = [
                'title' => 'Slot',
                'start' => $slot->slot_date . 'T' . $slot->slot_time,
                'end' =>date('Y-m-d H:i:s', strtotime(($slot->slot_date . 'T' . $slot->slot_time) . ' +1 hour')),
                'allDay' => false,
                'extendedProps' => [
                    'id' => $slot->id, // Add the database ID as a property
                ],
            ];

            if ($slot->status == 'booked') {
                $event['color'] = 'blue';

            }else if ($slot->status == 'completed') {
                $event['color'] = 'green';

            }else{
                $event['color'] = 'gray';
            }

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
        $physicianSchedule->status = 'available';
        $physicianSchedule->user()->associate($user);
        $physicianSchedule->save();

        return redirect()->route('physician.schedule.view')->with('success', 'Slot has been added successfully');
    }


    public function update(Request $request, $id)
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

        $slotDate = $validatedData['slot_date'];
        $slotTime = $validatedData['slot_time'];

        $existingSlot = PhysicianSchedule::where('id', $id)->first();

        if (!$existingSlot) {
            // Slot not found
            return redirect()->back()->withErrors('Slot not found.');
        }

        // Update the slot date and time
        $existingSlot->slot_date = $slotDate;
        $existingSlot->slot_time = $slotTime;
        $existingSlot->status = 'available';
        $existingSlot->save();

        return redirect()->route('physician.schedule.view')->with('success', 'Slot has been updated successfully');
    }

    public function destroy($id)
    {
        $slot = PhysicianSchedule::find($id);

        if (!$slot) {
            return redirect()->back()->withErrors('Slot not found.');
        }

        $slot->delete();

        return redirect()->route('physician.schedule.view')->with('success', 'Slot has been deleted successfully');
    }

    public function upcomingAppointments()
    {
        $physician = Auth::user();

//        GHALEBAN HAN7OT WITH PORTFOLIO KAMAN
        $appointments = PhysicianSchedule::where('user_id', $physician->id)->where('status','booked')->with('patient')->orderBy('slot_date')
            ->orderBy('slot_time')
            ->get();
        return view('physician.appointments.upcoming_appointments', compact('appointments'));
    }

    public function appointmentsHistory()
    {
        $physician = Auth::user();

//        GHALEBAN HAN7OT WITH PORTFOLIO KAMAN

        $appointments = PhysicianSchedule::where('user_id', $physician->id)->with('patient')->orderBy('slot_date')
            ->orderBy('slot_time')
            ->get();
        return view('physician.appointments.appointments_history', compact('appointments'));
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
