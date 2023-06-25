<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PhysicianPricingController;
use App\Http\Controllers\PhysicianRegistrationApplicationsManagementController;
use App\Http\Controllers\PhysicianRegistrationFormController;
use App\Http\Controllers\PhysicianScheduleController;
use App\Http\Controllers\PhysiciansListController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\PhysicianPortfolioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

        Route::get('/change-language/{lang}', [LanguageController::class, 'changeLanguage'])->name('change.language');

        Route::get('/', function () {
            return view('homepage');
        });

        Auth::routes(['verify' => true]);

        Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');

//This is for redirecting to services (e.g., facebook)
        Route::get('/redirect/{service}', [SocialController::class, 'redirect'])->name('social.redirect');
        Route::get('/callback/{service}', [SocialController::class, 'callback'])->name('social.callback');


// Routes for the patient
        Route::group(['middleware' => ['auth', 'role:patient', 'patient.status']], function () {
            Route::get('/patient/dashboard', [PhysiciansListController::class, 'dashboard'])->name('patient.dashboard');
            Route::get('/patient/physicians_list/view', [PhysiciansListController::class, 'index'])->name('patient.physicians_list.view');
            Route::post('/patient/physicians_list/view/', [PhysiciansListController::class, 'book'])->name('patient.physicians_list.book');
            Route::post('/patient/session_complaint/', [PhysiciansListController::class, 'complaint'])->name('patient.session_complaint');
            Route::post('/patient/session_booking/', [PhysiciansListController::class, 'payment'])->name('patient.session_booking');
            Route::post('/patient/session_booking_confirm/', [PhysiciansListController::class, 'makePayment'])->name('patient.booking_confirm');

            Route::get('/patient/appointments/appointments_history', [PhysiciansListController::class, 'appointmentsHistory'])->name('patient.appointments_history');
            Route::get('/patient/appointments/upcoming_appointment', [PhysiciansListController::class, 'upcomingAppointments'])->name('patient.upcoming_appointments');

            Route::post('/patient/appointments/post-session_view', [PhysiciansListController::class, 'postSessionView'])->name('patient.post_session.view');

            Route::post('/patient/portfolio/view', [PhysicianPortfolioController::class, 'patientPortfolioIndex'])->name('patient.portfolio.view');

            Route::get('/patient/medical_history/view', [PhysicianPortfolioController::class, 'patientMedicalHistoryIndex'])->name('patient.medical_history.view');
            Route::get('/patient/medical_history/manage', [PhysicianPortfolioController::class, 'patientMedicalHistoryManage'])->name('patient.medical_history.manage');
         });


// Routes for the system admin
        Route::group(['middleware' => ['auth', 'role:system_admin']], function () {
            Route::get('/admin/dashboard', [PhysicianRegistrationApplicationsManagementController::class, 'dashboardIndex'])->name('admin.dashboard');

            Route::get('/administrator/physician_pending_registration_requests', [PhysicianRegistrationApplicationsManagementController::class, 'index'])->name('administrator.registration.index');
            Route::post('/administrator/physician_pending_registration_requests', [PhysicianRegistrationApplicationsManagementController::class, 'respond'])->name('administrator.registration.respond');
            Route::get('/administrator/physician_pending_registration_request/{id}', [PhysicianRegistrationApplicationsManagementController::class, 'view'])->name('administrator.registration.view');
            Route::get('/administrator/all_physician_registration_requests', [PhysicianRegistrationApplicationsManagementController::class, 'indexAll'])->name('administrator.registration.indexAll');

            Route::get('/administrator/all_physicians', [PhysicianRegistrationApplicationsManagementController::class, 'indexAllPhysicians'])->name('administrator.indexAllPhysicians');
            Route::get('/administrator/all_patients', [PhysicianRegistrationApplicationsManagementController::class, 'indexAllPatients'])->name('administrator.indexAllPatients');
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

            Route::get('/physician/view_medical_history', function(){
                return view('physician/appointments/medical_history');
            })->name('view.medical_history');

            Route::get('/physician/view_complaint_form', function(){
                return view('physician/appointments/complaint_form');
            })->name('view.complaint_form');

            Route::post('/physician/appointments/post-session_form', [PhysicianScheduleController::class, 'postSessionFill'])->name('physician.post_session.fill');
            Route::post('/physician/appointments/post-session_store', [PhysicianScheduleController::class, 'postSessionStore'])->name('physician.post_session.store');

            Route::post('/physician/appointments/post-session_view', [PhysicianScheduleController::class, 'postSessionView'])->name('physician.post_session.view');

            Route::get('/physician/finances/session_pricing', [PhysicianPricingController::class, 'index'])->name('physician.session_pricing.view');
            Route::post('/physician/finances/session_pricing', [PhysicianPricingController::class, 'update'])->name('physician.session_pricing.update');

            Route::get('/physician/revenue/view', [PhysicianPricingController::class, 'revenueIndex'])->name('physician.revenue.view');
            Route::get('/physician/financial_info/view', [PhysicianPricingController::class, 'financialInfoIndex'])->name('physician.financial_information.view');
            Route::get('/physician/financial_info/add', [PhysicianPricingController::class, 'financialInfoAdd'])->name('physician.financial_information.add');

            Route::get('/physician/portfolio/view', [PhysicianPortfolioController::class, 'physicianPortfolioIndex'])->name('physician.portfolio.view');
            Route::get('/physician/portfolio/manage', [PhysicianPortfolioController::class, 'physicianPortfolioAdd'])->name('physician.portfolio.manage');
        });
    });
});
