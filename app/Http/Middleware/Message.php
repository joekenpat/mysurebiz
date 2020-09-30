<?php

namespace App\Http\Middleware;

use App\General\UserHandler;
use App\Models\MailAudience;
use Closure;
use Illuminate\Support\Facades\Auth;

class Message
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
	    app()->singleton('userHandler', UserHandler::class);

	    $id = $request->route()->parameter('id');
	    $isEligible = MailAudience::where(['period' => Auth::user()->period,
		                'mail_id' => $id])->count();
	    if(!$isEligible && !Auth::user()->isAdmin()) abort('404');
	    return $next($request);
    }
}
