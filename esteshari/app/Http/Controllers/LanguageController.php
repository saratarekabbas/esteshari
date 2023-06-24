<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class LanguageController extends Controller
{
    public function changeLanguage($lang)
    {
        $availableLanguages = ['en', 'ms', 'zh', 'ar'];

        if (in_array($lang, $availableLanguages)) {
            session(['locale' => $lang]);
        }
        $redirectUrl = LaravelLocalization::getLocalizedURL($lang, null, [], true);

        return redirect($redirectUrl);
    }
}
