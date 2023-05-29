<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PhysicianStatusMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->role == 'physician') {
            // If the user's status is "registered" and their email is not verified,
            // and they are not on the email verification route (verification.notice),
            // they are redirected to the email verification page (verification.notice).
            if ($user->status == 'registered' && $user->email_verified_at == null && $request->route()->getName() != 'verification.notice') {
                return redirect()->route('verification.notice');
            }
            // If the user's status is "registered" and their email is verified,
            // and they are not on the physician registration form route (physician.registration.create)
            // or the physician registration store route (physician.registration.store),
            // they are redirected to the physician registration form (physician.registration.create).
//            elseif ($user->status == 'registered' && $user->email_verified_at != null &&
//                $request->route()->getName() != 'physician.registration.create' &&
//                $request->route()->getName() != 'physician.registration.store'
//            ) {
//                return redirect()->route('physician.registration.create');
//            }
            elseif ($user->status == 'registered' && $user->email_verified_at != null &&
                !in_array($request->route()->getName(), [
                    'physician.registration.create',
                    'physician.registration.store',
                    'physician.registration.create.section',
                    'physician.registration.store.section'
                ])) {
                $section = $request->route('section', 1); // Default to section 1 if not provided
                return redirect()->route('physician.registration.create', ['section' => $section]);
            }
            // If the user's status is "pending" and they are not on the pending page route (physician.pending),
            // they are redirected to the pending page (physician.pending).
            elseif ($user->status == 'pending' && $request->route()->getName() != 'physician.pending') {
                return redirect()->route('physician.pending');
            }
            // If the user's status is "denied" and they are not on the denied page route (physician.denied),
            // they are redirected to the denied page (physician.denied).
            elseif ($user->status == 'denied' && $request->route()->getName() != 'physician.denied') {
                return redirect()->route('physician.denied');
            }
            // If the user's status is "approved" and they are not on the physician dashboard route (physician.dashboard),
            // they are redirected to the physician dashboard (physician.dashboard).
            elseif ($user->status == 'approved' && $request->route()->getName() != 'physician.dashboard') {
                return redirect()->route('physician.dashboard');
            }
        }
        return $next($request);
    }
}
