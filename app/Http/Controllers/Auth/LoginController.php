<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
    protected function redirectTo()
            {
                if(Auth::user()->admin==0)
                {
                    return '/User_Dashboard';
                }
        
                if(Auth::user()->admin==1 )
                {
                    return '/Admin_Dashboard';
                }
        
                if(Auth::user()->admin==2)
                {
                    return '/Super_Dashboard';
                }
                
            }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request){
        $this->guard()->logout();
        Auth::logout();
        Session::flush();
  
        return redirect('/login');
    }
}
