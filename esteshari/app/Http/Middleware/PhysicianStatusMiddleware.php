<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PhysicianStatusMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->role == 'physician') {
            if ($user->status == 'registered' && $user->email_verified_at == null && $request->route()->getName() != 'verification.notice') {
                return redirect()->route('verification.notice');
            } elseif ($user->status == 'registered' && $user->email_verified_at != null && $request->route()->getName() != 'physician.registration.create') {
                return redirect()->route('physician.registration.create');
            } elseif ($user->status == 'pending') {
                return redirect()->route('physician.pending');
            } elseif ($user->status == 'denied') {
                return redirect()->route('physician.denied');
            } elseif ($user->status == 'approved') {
                return redirect()->route('physician.dashboard');
            }
        }

        return $next($request);
    }
}
