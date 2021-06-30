<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NurseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name'=>'Sara',
            'last_name'=>' Vargas',
            'phone'=>'73242332',
            'email'=>'nurse@gmail.com',
            'password'=>Hash::make('123123123'),
            'credential'=>'1252131',
            'type_nurse'=>true,
            'type_patient'=>false,
            'removed'=>false,
            ],
        ]);
    }
}
