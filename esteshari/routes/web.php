<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ConferenceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Api\ZoomApi;


Route::get('/', function () {
    return view('welcome');
});

Route::get('index', 'General\GeneralController@getIndex');



//All routes will only access methods/controllers in folder name 'General'
//Route::namespace('General')->group(function(){
//    Route::get('users', 'GeneralController@functionTest');
//});

//prefix howa enni mabakararsh elroute kaza mara
//ex: badal users/show, hatkoun keda:
//Route::group(['prefix' => 'users'], function(){
//    Route::get('show','xxxxxxxxx');
//});


//law 3ayza middleware:
//Route::group(['prefix' => 'users', 'middleware' => 'auth], function(){
//    Route::get('show','xxxxxxxxx');
//});


Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');

Auth::routes();

Route::get('/dashboard', function (){
    return 'You are on user dashboard';
});

//Route::get('/redirect/facebook', 'SocialController@redirect');

//This is for redirecting to services (e.g., facebook)
Route::get('/redirect/{service}', [SocialController::class, 'redirect']);

Route::get('/callback/{service}', [SocialController::class, 'callback']);

//Offer
Route::get('fillable',[OfferController::class,'getOffers']);


Route::group(['prefix'=>'offers'],function(){
    Route::get('create', [OfferController::class, 'create']);
    Route::post('store', [OfferController::class, 'store'])->name('offers.store');
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

