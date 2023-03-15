<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapWebRoutes();
        $this->mapAdminRoutes();
//        $this->mapPatientRoutes();
//        $this->mapPhysicianRoutes();
    }

    protected function mapAdminRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace.'\Administrator')
            ->group(base_path('routes/administrator.php'));
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }


//    protected function mapPatientRoutes()
//    {
//        Route::middleware('web')
//            ->namespace($this->namespace.'\Patient')
//            ->group(base_path('routes/patient.php'));
//    }
//
//    protected function mapPhysicianRoutes()
//    {
//        Route::middleware('web')
//            ->namespace($this->namespace.'\Physician')
//            ->group(base_path('routes/physician.php'));
//    }
}
