<?php

namespace App\Http\Middleware;

use App\Models\Employee;
use Closure;
use Illuminate\Support\Facades\Auth;

class ensureEmployeesPennywiseSet
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
    	if(Auth::user()->role === 'Employee'){
		    $employeeHasSetPennywise = Employee::where([
			    'users_id' => Auth::id(), 'has_set_pennywise' => 1
		    ])->exists();

		    if(!$employeeHasSetPennywise) return redirect()->route('setpennywise')->withErrors([
			    'message' => 'Please you need to set your daily Pennywise before you can continue.'
		    ]);
	    }

        return $next($request);
    }
}
