<?php

use App\Http\Controllers\General\GeneralController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Api\ZoomApi;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');

Auth::routes();

//Route::get('/dashboard', function () {
//    return 'You are on user dashboard';
//});

//This is for redirecting to services (e.g., facebook)
Route::get('/redirect/{service}', [SocialController::class, 'redirect']);

Route::get('/callback/{service}', [SocialController::class, 'callback']);

//Offer
Route::get('fillable', [OfferController::class, 'getOffers']);

Route::group([    'prefix' => LaravelLocalization::setLocale(),    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function () {

    Route::get('index', [GeneralController::class, 'getIndex']);

    Route::group(['prefix' => 'offers'], function () {
        Route::get('create', [OfferController::class, 'create']);
        Route::post('store', [OfferController::class, 'store'])->name('offers.store');
    });
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



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//MIDDLEWARE ROUTES
// Routes for the system admin
Route::group(['middleware' => ['auth', 'role:system_admin']], function () {
    Route::get('/admin/dashboard', function () {
        return view('administrator.dashboard');
    })->name('admin.dashboard');
});

// Routes for the physician
Route::group(['middleware' => ['auth', 'role:physician']], function () {
    Route::get('/physician/dashboard', function () {
        return view('physician.dashboard');
    })->name('physician.dashboard');
});

// Routes for the patient
Route::group(['middleware' => ['auth', 'role:patient']], function () {
    Route::get('/patient/dashboard', function () {
        return view('patient.dashboard');
    })->name('patient.dashboard');
});
