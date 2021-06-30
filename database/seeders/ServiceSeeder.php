<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            [
                'id_category'=>1,
                'name'=>'Aplicacion de medicamentos',
                'price'=>50,
                'duration'=>30, //minutes
                'removed'=>false,
            ],
            [
                'id_category'=>1,
                'name'=>'Control de signos vitales',
                'price'=>40,
                'duration'=>20, //minutes
                'removed'=>false,
            ],
            [
                'id_category'=>1,
                'name'=>'Colocacion de inyecciones',
                'price'=>100,
                'duration'=>30, //minutes
                'removed'=>false,
            ],

            [
                'id_category'=>2,
                'name'=>'Cuidados intensivos',
                'price'=>200,
                'duration'=>120, //minutes
                'removed'=>false,
            ],
            [
                'id_category'=>2,
                'name'=>'Cura y cambios de vendaje',
                'price'=>70,
                'duration'=>40, //minutes
                'removed'=>false,
            ],



            [
                'id_category'=>3,
                'name'=>'Cuidados intensivos',
                'price'=>200,
                'duration'=>120, //minutes
                'removed'=>false,
            ],
            [
                'id_category'=>3,
                'name'=>'Lavado de cuerpo',
                'price'=>200,
                'duration'=>60, //minutes
                'removed'=>false,
            ],
        ]);
    }
}
