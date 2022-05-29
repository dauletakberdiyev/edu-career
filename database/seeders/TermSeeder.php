<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Term;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Term::create([
            'name' => '2022 Beta',
            'registration_end' => '2022-08-20',
            'grading_start' => '2022-12-01',
            'grading_end' => '2022-12-30',
            'active' => true,
            'term_end' => '2023-01-01',
        ]);
    }
}
