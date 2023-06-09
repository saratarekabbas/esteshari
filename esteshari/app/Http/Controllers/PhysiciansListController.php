<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhysiciansListController extends Controller
{
    public function index(){
        return view('patient.physicians_list.physicians_list_view');
    }
}
