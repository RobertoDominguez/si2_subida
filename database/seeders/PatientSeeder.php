<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PatientSeeder extends Seeder
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
            'name'=>'Roberto',
            'last_name'=>'Dominguez',
            'phone'=>'73242313',
            'email'=>'patient@gmail.com',
            'password'=>Hash::make('123123123'),
            'credential'=>'',
            'type_nurse'=>false,
            'type_patient'=>true,
            'removed'=>false,
            ],
        ]);
    }
}
