<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    public function redirectTo(){

        // User role

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
                return '/login';
            }



    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'userlevel'=>['required'],
            'department_id'=>['required'],
            'adminstatus'=>['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'userlevel'=>$data['userlevel'],
            'department_id'=>$data['department_id'],
            'adminstatus'=>$data['adminstatus'],
        ]);
    }
}
