<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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
    #ByDefault ->protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo() 
    {
      if (! Auth::user()->status) 
      {
        Auth::logout();
        return redirect('/')->withError('Please activate your account before logging in.');
      }else
      {
        $role = Auth::user()->role; 
        switch ($role) 
          {
            case 'admin':
              return '/admin_dashboard';
              break;
            case 'user':
              return '/user_dashboard';
              break; 
            default:
              return '/home'; 
            break;
          }
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
}
