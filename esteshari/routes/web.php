<?php

use App\Http\Controllers\General\GeneralController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PhysicianRegistrationFormController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Api\ZoomApi;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing', function () {
    return view('general.landing');
});

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');

//This is for redirecting to services (e.g., facebook)
Route::get('/redirect/{service}', [SocialController::class, 'redirect']);
Route::get('/callback/{service}', [SocialController::class, 'callback']);

//Offer
//Route::get('fillable', [OfferController::class, 'getOffers']);

//Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
//    Route::get('index', [GeneralController::class, 'getIndex']);
//
//    Route::group(['prefix' => 'offers'], function () {
//        Route::get('create', [OfferController::class, 'create']);
//        Route::post('store', [OfferController::class, 'store'])->name('offers.store');
//    });
//});


//MIDDLEWARE ROUTES
// Routes for the system admin
Route::group(['middleware' => ['auth', 'role:system_admin']], function () {
    Route::get('/admin/dashboard', function () {
        return view('administrator.dashboard');
    })->name('admin.dashboard');
});

// Routes for the patient
Route::group(['middleware' => ['auth', 'role:patient']], function () {
    Route::get('/patient/dashboard', function () {
        return view('patient.dashboard');
    })->name('patient.dashboard');
});

// Routes for the physician process
Route::middleware(['auth', 'role:physician'
//    , 'physician.status'
])->group(function () {
    Route::get('/physician/registration/{section?}', [PhysicianRegistrationFormController::class, 'index'])->name('physician.registration.create'); //the whole page; which displays section 1 by default
    Route::post('/physician/registration', [PhysicianRegistrationFormController::class, 'store'])->name('physician.registration.store');


//    Route::post('/physician/registration/section1', [PhysicianRegistrationFormController::class, 'storeSection1'])->name('physician.registration.section1');
//    Route::post('/physician/registration/section2', [PhysicianRegistrationFormController::class, 'storeSection2'])->name('physician.registration.section2');
//    Route::post('/physician/registration/section3', [PhysicianRegistrationFormController::class, 'storeSection3'])->name('physician.registration.section3');
//    Route::post('/physician/registration/section4', [PhysicianRegistrationFormController::class, 'storeSection4'])->name('physician.physician_registration_form.physician_registration_form.section4');
//    Route::post('/physician/registration/section5', [PhysicianRegistrationFormController::class, 'storeSection5'])->name('physician.physician_registration_form.physician_registration_form.section5');
//    Route::post('/physician/registration/section6', [PhysicianRegistrationFormController::class, 'storeSection6'])->name('physician.physician_registration_form.physician_registration_form.section6');
//    Route::post('/physician/registration/section7', [PhysicianRegistrationFormController::class, 'storeSection7'])->name('physician.physician_registration_form.physician_registration_form.section7');
//    Route::post('/physician/registration/section8', [PhysicianRegistrationFormController::class, 'storeSection8'])->name('physician.physician_registration_form.physician_registration_form.section8');

    /* FOR THE MULTIPLE SECTIONS
    // Form display and submission routes
    Route::get('registration/form', [PhysicianRegistrationFormController::class, 'store'])->name('registration.form');
    Route::post('registration/store', [PhysicianRegistrationFormController::class, 'store'])->name('registration.store');

// Final submission route
    Route::get('registration/final', [PhysicianRegistrationFormController::class, 'finalSubmission'])->name('registration.final');

    */

    Route::get('/physician/pending', function () {
        return view('physician.pending');
    })->name('physician.pending');
    Route::get('/physician/denied', function () {
        return view('physician.denied');
    })->name('physician.denied');
    Route::get('/physician/dashboard', function () {
        return view('physician.dashboard');
    })->name('physician.dashboard');
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
