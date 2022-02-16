<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use \App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		$countdata = User::Where('role','user')->get()->count();
		if($countdata % 2 == 0){
			$gender = 'Male';
		}else{
			$gender = 'Female';
		}
		DB::table('users')->insert([
            'f_name' => Str::random(6),
            'l_name' => Str::random(6),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'user',
            'gender' => $gender,
            'dob' => '11/12/1993',
            'income' =>random_int(100000, 999999),
            'occupation' => 'Private Job',
            'family_type' => 'Joint Family',
            'manglik' => 'No',
            'partner_income_range' => '100000-50000',
            'partner_occupation' => 'Government Job',
            'partner_family_type' => 'Joint Family',
            'partner_manglik' => 'No',
            'status' => '1',
        ]);
    }
}
