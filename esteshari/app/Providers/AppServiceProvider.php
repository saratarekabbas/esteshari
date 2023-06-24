<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function boot()
    {
        $this->setLocale();
    }

    private function setLocale()
    {
        if (session()->has('locale')) {
            $locale = session('locale');
        } else {
            $locale = config('app.locale');
            session(['locale' => $locale]);
        }

        app()->setLocale($locale);
    }
}
