<?php

namespace App\Http\Controllers\Auth\customer;

use App\Models\User;
use App\Models\customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = 'customers.login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }
    public function showRegistrationForm(){
        return view('auth.customer.register');
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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        try{
            $data = $request->all();
            $interdata= customer::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' =>$data['phone'],
                'password' => Hash::make($data['password']),

            ]);
            if($interdata){
                // return redirect()->route('customers.login');
                return response()->json(['message'=>'Register Successfull','status'=>200]);
            }else{
                // return redirect()->back();
                return response()->json(['message'=>'Register Failed','status'=>400]);
            }
        }catch(\Exception $e){
            return response()->json(['message'=> $e->getMessage(),'gha'=>'nskdj','status'=>400]);
        }

    }
}

