<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            AdministratorSeeder::class,
            PaymentMethodSeeder::class,
            CategorySeeder::class,
            ServiceSeeder::class,
            InvoiceSeeder::class,
            OfferSeeder::class,
            NurseSeeder::class,
            PatientSeeder::class,
        ]);
    }
}
