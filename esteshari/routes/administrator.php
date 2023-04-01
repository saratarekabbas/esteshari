<?php

use App\Http\Controllers\Administrator\AdministratorController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [AdministratorController::class, 'showAdminName']);


