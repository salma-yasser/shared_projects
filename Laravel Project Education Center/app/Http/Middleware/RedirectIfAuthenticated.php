<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->type == 0){
                return redirect('/dashboard');

            }elseif(Auth::user()->type == 1){

            }elseif (Auth::user()->type == 3) {
                #customer
                return redirect('/home'); 
            }
            return redirect('/home');
        }

        return $next($request);
    }
}
