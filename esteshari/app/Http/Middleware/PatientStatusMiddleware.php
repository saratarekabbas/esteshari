<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PatientStatusMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

//       UPDATE
        return $next($request);
    }
}
