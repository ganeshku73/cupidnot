<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use DB;
use Auth;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function dashboard()
    {
        if(Auth::User()->gender){
			if(Auth::User()->gender == 'Male'){
				$gender = 'Female';
			}else{
				$gender = 'Male';
			}
		}
		
		if(Auth::User()->partner_income_range){
			$partnerrangein = explode('-',Auth::User()->partner_income_range);
		}else{
			dd('something went wrong');
		}
		
		$match_factor['pref_min_income'] = $partnerrangein[0];
		$match_factor['pref_max_income'] = $partnerrangein[1];
		$match_factor['pref_partner_occupation'] = Auth::User()->partner_occupation;
		$match_factor['pref_partner_family_type'] = Auth::User()->partner_family_type;
		$match_factor['pref_partner_manglik'] = Auth::User()->partner_manglik;
		
		$users = User::Where('role','user')->Where('status',1)->Where('gender',$gender)->orderBy('id','desc')->get();
		return view('user.index',compact('match_factor','users'));
    }
}
