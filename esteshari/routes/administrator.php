<?php

use App\Http\Controllers\Administrator\AdministratorController;
use Illuminate\Support\Facades\Route;

Route::namespace('Administrator')->group(function () {
    //group of routes; All routes listed here only access controllers or methods grouped in folder "General"
    Route::get('users', [AdministratorController::class, 'showAdminName']);
});
