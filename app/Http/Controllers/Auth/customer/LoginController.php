<?php

namespace App\Http\Controllers\Auth\customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = 'customers.product';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        // $this->middleware('auth')->only('logout');
    }
    public function showLoginForm(){
        return view('auth.customer.login');
    }
    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required']);

        $login=Auth::guard('customer')->attempt(['email'=>$request->email,'password'=>$request->password]);
         if($login){
            return redirect()->route('customers.product');

        }else{
            return redirect()->back()->withInput()->withErrors(['name'=>'please check the form']);
        }


    }
    public function logout(Request $request){
        Auth::guard('customer')->logout();
        session()->flush();
        session()->regenerate();
        return redirect()->intended(route('customers.login'));
    }


}
