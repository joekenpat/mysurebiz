<?php

namespace App\Http\Middleware;

use App\General\UserHandler;
use Closure;
use Illuminate\Support\Facades\Auth;

class UsersAuthentication
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
            if(Auth::user()->role != 'Admin'){
	            /**
	             * Check if user training commenced
	             */
//	            if(Auth::user()->batch_id === null) return redirect()->route('notcommenced');
	            /**
	             * Make service container User Handler
	             */
            	app()->singleton('userHandler', UserHandler::class);

                return $next($request);
            }
            return redirect()->route('dashboard');
        }
        return redirect()->route('login');
    }
}
