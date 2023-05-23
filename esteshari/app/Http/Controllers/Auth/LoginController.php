<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
//            if (Auth::user()->role == 'system_admin') {
//                return redirect()->intended('admin/dashboard');
//            } elseif (Auth::user()->role == 'physician') {
//                return redirect()->intended('/physician/dashboard');
//            } elseif (Auth::user()->role == 'patient') {
//                return redirect()->intended('/patient/dashboard');
//            }

            $user = Auth::user();

            if ($user->role === 'system_admin') {
                return redirect()->intended('admin/dashboard');
            } elseif ($user->role === 'physician') {
                if ($user->status === 'registered') {
                    return redirect()->route('physician.registration.create');
                } elseif ($user->status === 'pending') {
                    return redirect()->route('physician.pending');
                } elseif ($user->status === 'denied') {
                    return redirect()->route('physician.denied');
                } else {
                    return redirect()->intended('/physician/dashboard');
                }
            } elseif ($user->role === 'patient') {
                return redirect()->intended('/patient/dashboard');
            }

            Auth::logout();
            return back()->withErrors([
                'email' => 'Unauthorized.',
            ]);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

}
