<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use \App\Models\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $checkadmin = User::Where('role','admin')->first();
		if(!$checkadmin){
			DB::table('users')->insert([
            'f_name' => 'Ganesh',
            'l_name' => 'Pal',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'gender' => 'male',
            'status' => '1',
        ]);
		}
		
    }
}
