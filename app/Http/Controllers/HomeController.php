<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\Models\User;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    

    public function redirect($provider)
    {
     // dd($provider);
     return Socialite::driver($provider)->redirect();
    }
 
    public function Callback($provider)
    {
        $userSocial =   Socialite::driver($provider)->stateless()->user();
        $users = User::where(['email' => $userSocial->getEmail()])->first();
        
        if($users){
            Auth::login($users);
            return redirect('/')->with('success','You are login from '.$provider);
        }else{
            dd('First You Should Register We are Using Your Profile In Website Using Google Registration We are Not Able To Complete Your Profile. But For Making Better user Experience We are Working Thanks');
            $user = User::create([
                'f_name'          => $userSocial->getName(),
                'l_name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'profile_id'   => $userSocial->getId(),
                'password'      => '12345',
                'role'      => 'user',
                'completed'      => '0',
            ]);
         return redirect()->route('home');
        }
    }

}
