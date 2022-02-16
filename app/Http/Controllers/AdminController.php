<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use DB;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	 public function dashboard(Request $request)
    {
        
		$dob = User::Where('role','user')->where('status',1)->pluck('dob')->toArray();
		$dobs = array_unique($dob);
		$incomes = User::Where('role','user')->where('status',1)->pluck('partner_income_range')->toArray();
		$income_rages = array_unique($incomes);
		
		if($request->isMethod('post')){
			$query = DB::table('users');
            if(isset($request->age) && !empty($request->age)){
                $query = $query->where('dob',$request->age);  
            }
			if(isset($request->gender) && !empty($request->gender)){
                $query = $query->where('gender',$request->gender);  
            }
			if(isset($request->income_range) && !empty($request->income_range)){
                $query = $query->where('partner_income_range',$request->income_range);  
            }
			if(isset($request->family_type) && !empty($request->family_type)){
                $query = $query->where('family_type',$request->family_type);  
            }
			if(isset($request->manglik) && !empty($request->manglik)){
                $query = $query->where('manglik',$request->manglik);  
            }
            
            $users = $query->get();
            
        }else{
			$users = User::Where('role','user')->where('status',1)->get();
		}
		
		return view('admin.index',compact('users','dobs','income_rages'));
    }
}
