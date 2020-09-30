<?php

namespace App\Http\Controllers\users;

use App\General\PennywiseHandler;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PennywiseController extends Controller
{
	use PennywiseHandler;

	public function Set(Request $request)
    {
    	if($request->isMethod('post')) return $this->Save($request);

    	return view('users/setpennywise');
    }

	private function Save(Request $request)
	{
		$request->validate(['pennywise' => $this->pennywiseValidationArray]);

		User::join('employees', 'users.id', 'employees.users_id')
			->where('users.id', Auth::id())
			->getQuery()
			->update([
				'users.pennywise'            => $request->pennywise,
				'employees.has_set_pennywise'=> 1,
				'users.updated_at'           => Carbon::now(),
				'employees.updated_at'       => Carbon::now()
			]);

		return redirect()->route('setpennywisesuccess');
	}

	public function Success(Request $request)
	{
		return view('users/setpennywisesuccess');
	}
}
