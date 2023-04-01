<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
//    This middleware will check if the authenticated user has the required role to access the route.
//    If the user does not have the required role, the middleware will abort the request with a 403 error.
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!in_array(auth()->user()->role, $roles)) {
            abort(403, 'Unauthorized action: Sorry, you are not authorized to carry out this action. Please contact the system admin for assistance.');
        }

        return $next($request);
    }


}
