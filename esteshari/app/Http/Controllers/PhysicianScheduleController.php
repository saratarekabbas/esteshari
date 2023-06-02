<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhysicianScheduleController extends Controller
{
    public function index(){
        return view('physician.physician_schedule.schedule_view');

    }

    public function store(){
        return view('physician.physician_schedule.schedule_manage');
    }

}
