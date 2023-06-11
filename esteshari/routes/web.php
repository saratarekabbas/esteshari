<?php

use App\Http\Controllers\General\GeneralController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhysicianRegistrationApplicationsManagementController;
use App\Http\Controllers\PhysicianRegistrationFormController;
use App\Http\Controllers\PhysicianScheduleController;
use App\Http\Controllers\PhysiciansListController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Api\ZoomApi;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/', function () {
    return view('homepage');
});

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');

//This is for redirecting to services (e.g., facebook)
Route::get('/redirect/{service}', [SocialController::class, 'redirect']);
Route::get('/callback/{service}', [SocialController::class, 'callback']);

//Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
//    Route::get('index', [GeneralController::class, 'getIndex']);
//
//    Route::group(['prefix' => 'offers'], function () {
//        Route::get('create', [OfferController::class, 'create']);
//        Route::post('store', [OfferController::class, 'store'])->name('offers.store');
//    });
//});

// Routes for the patient
Route::group(['middleware' => ['auth', 'role:patient']], function () {
    Route::get('/patient/dashboard', function () {
        return view('patient.dashboard');
    })->name('patient.dashboard');

    Route::get('/patient/physicians_list/view', [PhysiciansListController::class, 'index'])->name('patient.physicians_list.view');
    Route::post('/patient/physicians_list/view/', [PhysiciansListController::class, 'book'])->name('patient.physicians_list.book');
    Route::post('/patient/session_booking/', [PhysiciansListController::class, 'payment'])->name('patient.session_booking');
    Route::post('/patient/session_booking_confirm/', [PhysiciansListController::class, 'makePayment'])->name('patient.booking_confirm');

    Route::get('/patient/appointments/appointments_history', [PhysiciansListController::class, 'appointmentsHistory'])->name('patient.appointments_history');
    Route::get('/patient/appointments/upcoming_appointment', [PhysiciansListController::class, 'upcomingAppointments'])->name('patient.upcoming_appointments');

});


// Routes for the system admin
Route::group(['middleware' => ['auth', 'role:system_admin']], function () {
    Route::get('/admin/dashboard', [PhysicianRegistrationApplicationsManagementController::class, 'dashboardIndex'])->name('admin.dashboard');

    Route::get('/administrator/physician_pending_registration_requests', [PhysicianRegistrationApplicationsManagementController::class, 'index'])->name('administrator.registration.index');
    Route::post('/administrator/physician_pending_registration_requests', [PhysicianRegistrationApplicationsManagementController::class, 'respond'])->name('administrator.registration.respond');
    Route::get('/administrator/physician_pending_registration_request/{id}', [PhysicianRegistrationApplicationsManagementController::class, 'view'])->name('administrator.registration.view');
    Route::get('/administrator/all_physician_registration_requests', [PhysicianRegistrationApplicationsManagementController::class, 'indexAll'])->name('administrator.registration.indexAll');

    Route::get('/administrator/all_physicians', [PhysicianRegistrationApplicationsManagementController::class, 'indexAllPhysicians'])->name('administrator.indexAllPhysicians');
});

// Routes for the physician process
Route::middleware(['auth', 'role:physician', 'physician.status'])->group(function () {
    Route::get('/physician/dashboard', function () {
        return view('physician.dashboard');
    })->name('physician.dashboard');

    Route::get('/physician/registration/{section?}', [PhysicianRegistrationFormController::class, 'index'])->name('physician.registration.create'); //the whole page; which displays section 1 by default
    Route::post('/physician/registration', [PhysicianRegistrationFormController::class, 'store'])->name('physician.registration.store');
    Route::get('/physician/pending', function () {
        return view('physician.pending');
    })->name('physician.pending');
    Route::get('/physician/denied', function () {
        return view('physician.denied');
    })->name('physician.denied');

    Route::get('/physician/schedule/view', [PhysicianScheduleController::class, 'index'])->name('physician.schedule.view');
    Route::put('/physician/schedule/{id}', [PhysicianScheduleController::class, 'update'])->name('physician.schedule.update');
    Route::post('/physician/schedule/store', [PhysicianScheduleController::class, 'store'])->name('physician.schedule.store');
    Route::delete('/physician/schedule/{id}', [PhysicianScheduleController::class, 'destroy'])->name('physician.schedule.destroy');

    Route::get('/physician/appointments/appointments_history', [PhysicianScheduleController::class, 'appointmentsHistory'])->name('physician.appointments_history');
    Route::get('/physician/appointments/upcoming_appointment', [PhysicianScheduleController::class, 'upcomingAppointments'])->name('physician.upcoming_appointments');

});


Route::get('/create-meeting', function () {
    $zoomApi = new ZoomApi(env('ZOOM_API_KEY'), env('ZOOM_API_SECRET'));
    $meetingUrl = $zoomApi->createMeeting([
        'topic' => 'New Meeting',
        'type' => 2,
        'start_time' => now()->addMinutes(10)->toIso8601String(),
        'duration' => 60,
        'timezone' => 'UTC',
        'password' => 'password',
        'agenda' => 'Agenda for the meeting',
        'settings' => [
            'join_before_host' => true,
            'mute_upon_entry' => false,
            'auto_recording' => 'none',
            'registrants_email_notification' => true,
        ],
    ]);
    return redirect($meetingUrl);
});
