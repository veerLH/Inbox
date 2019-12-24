<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuth extends Controller
{
    //
    public function registerform(){
        if (Auth::check()) {
            # code...
            Auth::logout();
            return view('backend.auth.adminregister');
        }
        return view('backend.auth.adminregister');
    }

    public function loginform(){
        if (Auth::check()) {
            # code...
            Auth::logout();
            return view('backend.auth.adminlogin');
        }
        return view('backend.auth.adminlogin');
    }
}
