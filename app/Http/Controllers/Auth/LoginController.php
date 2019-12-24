<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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


    public function redirectTo(){

        // User role

            # code...
            if (Auth::check()) {
                # code...
            
            $user=Auth::user();
            if ($user->adminstatus==1 && $user->userlevel=='main') {
                # code...
                return 'admin/inbox';
            }elseif ($user->adminstatus==0 && $user->userlevel=='main') {
                # code...
            return 'super/inbox';
            }elseif ($user->adminstatus==0 && $user->userlevel=='normal')
            {
                return 'normal/inbox';
            }
            else{
                Auth::logout();
                return '/login';
            }
        }


    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
