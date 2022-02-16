<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string'],
            'income' => ['required'],
            'dob' => ['required'],
            'occupation' => ['required', 'string'],
            'manglik' => ['required', 'string'],
			'family_type' => ['required', 'string'],
            'partner_income_range' => ['required'],
            'partner_occupation' => ['required', 'string'],
			'partner_family_type' => ['required', 'string'],
			'partner_manglik' => ['required', 'string'],
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
    protected function create(array $data)
    {
		
	 return User::create([
            'f_name' => $data['f_name'],
            'l_name' => $data['l_name'],
            'gender' => $data['gender'],
			'income' => $data['income'],
            'dob' => $data['dob'],
            'role' => 'user',
            'status' => 1,
            'occupation' => $data['occupation'],
			'manglik' => $data['manglik'],
            'family_type' => $data['family_type'],
            'partner_income_range' => $data['partner_income_range'],
            'partner_occupation' => $data['partner_occupation'],
            'partner_family_type' => $data['partner_family_type'],
            'partner_manglik' => $data['partner_manglik'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
