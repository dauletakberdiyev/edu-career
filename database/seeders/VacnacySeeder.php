<?php

namespace Database\Seeders;

use Database\Factories\VacancyFactory;
use Illuminate\Database\Seeder;

class VacnacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VacancyFactory::new()->count(10)->create();
    }
}
