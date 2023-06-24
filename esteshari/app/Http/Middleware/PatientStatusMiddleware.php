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
        if ($user && $user->role == 'patient') {
            if ($user->status == 'registered' && $user->email_verified_at == null && $request->route()->getName() != 'verification.notice') {
                return redirect()->route('verification.notice');
            }
        }
        return $next($request);
    }
}
