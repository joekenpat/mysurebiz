<?php

namespace App\Http\Controllers\users;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    public function ChangePassword(Request $request)
    {
        if(Auth::user()->role == "Admin"){
            $toView = "auth.change-password";
        }else{
            $toView = "users.change-password";
        }

        if($request->isMethod('post')){
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|confirmed|min:6'
            ]);
            $userPassword = Auth::user()->password;

            if(Hash::check($request->old_password, $userPassword)){
                User::where('id', Auth::id())->update([
                    'password' => Hash::make($request->new_password)
                ]);

                Session::flash('message', "Password Changed Successfully");
                Session::flash('alert-class', 'alert-success');
//                return redirect($toView);
            }else{
                Session::flash('message', "Wrong password.");
                Session::flash('alert-class', 'alert-danger');
//                return redirect($toView);
            }
        }
        return view($toView);

    }
}
