<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id'=>1,
                'name' => 'General',
                'removed' => false
            ],
            [
                'id'=>2,
                'name' => 'Pediatria',
                'removed' => false
            ],
            [
                'id'=>3,
                'name' => 'Geriatria',
                'removed' => false
            ],
        ]);
    }
}
