<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
