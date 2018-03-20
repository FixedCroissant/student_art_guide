<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;
use Illuminate\Http\Request;
use Redirect;

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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Handle Shibboleth login requests.
     */
    public function shibbolethLogin(){
        if(Auth::check()){
            //Go homepage, instead of the dashboard.
            return redirect()->intended('/admin')->with('success','You are now logged in! Please remember to logout from the top-right menu!');
        }
    }


    /**
     * Handle logout requests.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(){
        //Log out of laravel authentication.
        Auth::logout();
        //Redirect to standard Shib out page.
        $ncsuLogoutPage = 'https://shib.ncsu.edu/idp/profile/Logout';
        //Logout of Shib.
        return Redirect::to($ncsuLogoutPage);
    }


    //Handle login.
    public function getLogin(){
        return view('auth.login');
    }


    /*
     * Handle user authentication through e-mail address and password. (Standard method)
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request){
        $email = $request->email;
        $password = $request->password;
        //Authentication passed.
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended('/admin')->with('success','You are now logged in! Please remember to logout from the top-right menu!');
        }
        //Authentication failed.
        else{
            return redirect()->back()->with('message','Incorrect Credentials Entered, please try again.');
        }
    }

    /**
     * Register new users. (This is not currently used for thie project.)
     */
    public function getRegister(){

        return redirect()->to('/login')->with('info','To register a new user, please log-in through NC States Shibboleth system. Registering individuals manually is not available.');

    }



}
