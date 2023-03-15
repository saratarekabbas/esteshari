<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    public function getIndex(){
        return view('general/landing');
    }
}
