<?php

namespace App\Http\Middleware;

use App\Models\Employee;
use Closure;
use Illuminate\Support\Facades\Auth;

class ensureEmployeesPennywiseNotSet
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
	    $employeeHasSetPennywise = Employee::where([
		    'users_id' => Auth::id(), 'has_set_pennywise' => 1
	    ])->exists();

	    if($employeeHasSetPennywise) return redirect()->route('setpennywisesuccess');

        return $next($request);
    }
}
