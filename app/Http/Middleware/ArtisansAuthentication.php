<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ArtisansAuthentication
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
        $role = Auth::user()->role;
        if(Auth::check() && ( $role == 'Artisan' || $role == 'Admin')){
            return $next($request);
        }
        abort(403, "Access Denied");
    }
}
