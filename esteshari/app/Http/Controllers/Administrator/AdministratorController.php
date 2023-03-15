<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;

class AdministratorController extends Controller
{
    //momken ne-define el middleware fel controller

    public function __construct(){
        $this -> middleware('auth')->except('showAdminName');
    }

    public function showAdminName()
    {
        return 'xx';
    }
}
