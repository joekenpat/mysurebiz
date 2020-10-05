<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessEmailConfirmation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    private $request;

    protected function credentials()
    {
        return ['email' => $this->request->email,
                'password' => $this->request->password,
                'status' => 1];
    }

    public function index(Request $request)
    {
        $this->request = $request;

        if ($request->isMethod('get')){
            return view('login');
        }

        //Handling login
        //Check for non verified users
        if (!Auth::attempt($this->credentials())) {
            $user = User::where([
                'email' => $this->credentials()['email']
            ])->select('status')->first();

            $status = $user ? $user->status : false;

            if($status === false || $status === 1){
                return Redirect::back()->withErrors([
                    'email' => 'Invalid Login details.'
                ]);
            }

            switch ($status){
                case 0: //Email not verified
                    return Redirect::back()->withErrors([
                        'message' => 'Verify your email to continue. Kindly check your email Inbox or Spam for verification message.',
                        'resendemail' => $this->credentials()['email'],
                        'text' => true
                    ]);
                case 2: //Account disabled
                    return Redirect::back()->withErrors([
                        'message' => 'Account disabled. Please contact administrator.'
                    ]);
                default:
                    return Redirect::back();
            }
        }

        //Authenticated
        if(Auth::user()->role == 'Admin'){
            return redirect()->intended('admin/dashboard');
        }else{
            return redirect()->intended('dashboard');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function ResendEmailVerification(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        //If user does not exist
        if (!$user){
            return Redirect::back();
        }

        //Send Email
        ProcessEmailConfirmation::dispatch(
            $user
        )->onQueue('high');

        return Redirect::back()->with([
            'message' => 'Email verification sent. Kindly check your email Inbox or Spam for verification message'
        ]);
    }
}
