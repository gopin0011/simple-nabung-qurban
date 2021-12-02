<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Config;

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
    protected $redirectTo = '/home';
    // protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $attributes = [
        //'test' => Config::get('myconfig.default_roles');
    ];

    public function __construct(Request $request)
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        switch(Auth::user()->id){
            case 1:
                $this->redirectTo = '/admin';
                return $this->redirectTo;
            break;
            default:
                $this->redirectTo = '/home';
                return $this->redirectTo;
            break;
        }
    }
}
