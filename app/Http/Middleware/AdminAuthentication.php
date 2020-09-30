<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminAuthentication
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
        if(Auth::check()){
            if(Auth::user()->role == 'Admin'){
                return $next($request);
            }
            return redirect()->route('usersdashboard');
        }

        return redirect()->route('login');
    }
}
