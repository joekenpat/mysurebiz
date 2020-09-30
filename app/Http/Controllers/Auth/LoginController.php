<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

//     protected $redirectTo = 'admin/dashboard';

    private $request;

    protected function credentials()
    {
        return ['email' => $this->request->email,
                'password' => $this->request->password,
                'status' => 1];
    }

    protected function authenticate()
    {
        //Check for non verified users
        if (!Auth::attempt($this->credentials())) {
            $user = User::where([
               'email' => $this->credentials()['email'],
                'password' => $this->credentials()['password'],
            ])->select('status')->first();
            $status = $user ? $user->status : false;

            if($status === 0){
//                return redirect()->route('login')->withErrors();
                return Redirect::back()->withErrors([
                    'message' => 'Email not verified. Kindly Check your email for Confirmation message.'
                ]);
            }
        }
    }


    protected function authenticated(Request $request, $user)
    {
        if(Auth::user()->role == 'Admin'){
            return redirect()->intended('admin/dashboard');
        }else{
            return redirect()->intended('dashboard');
        }
    }
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;

        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect()->route('login');
    }
}
