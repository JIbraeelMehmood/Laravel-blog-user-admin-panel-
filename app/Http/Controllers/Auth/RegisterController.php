<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    #ByDefault ->protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo() 
    {
      if (!Auth::user()->status == 1) 
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
              return '/visiters'; 
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        #if (User::where('role', '=', $data['role'])->exists()) 
        #{
          // admin found
          #return redirect('wrongRequest')->withError('Admin Already Present...');
          #return redirect(route('postIndex'))->with('status','Admin Already Present...');
          #return back()->with('success', 'Admin Already Present...');
          #return view('layouts.wrongRequest_404');
        #}
        #else  
        #{
            return User::create([
                'name' =>  $data['name'],
                'email' => $data['email'],
                'role' =>  $data['role'],
                'status' =>'1' ,
                'mobile' =>  $data['mobile'],
                'password' => Hash::make($data['password']),
            ]);
        #}  
    }
}
