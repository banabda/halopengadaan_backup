<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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

    public function authenticated(Request $request, $user)
    {
        // dd($user->status);
        if ($user->status == "Teraktifasi") {
            if ($user->hasRole('super admin')) {
                return redirect()->route('dashboard.index');
            } elseif ($user->hasRole('user') ) {
                return redirect()->route('profile');
            } elseif ($user->hasRole('narasumber')) {
                return redirect()->route('profile');
            }

            return redirect()->route('landing');
        } else {
            return Auth::logout();
        }
    }
}
