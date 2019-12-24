<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class supermiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            # code...
            $user=Auth::user();
            if ($user->adminstatus==0 && $user->userlevel=='main') {
                # code...
                return $next($request);

            }else{
                Auth::logout();
                return '/login';
            }
        }
    }
}
