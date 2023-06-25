<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Faculty;


class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'Two Foreign Languages', 
            'Kazakh Language and Literature', 
            'Applied Philology', 
            'Chemistry and Biology',
            'Physics and Informatics',
            'Mathematics Pedagogical',
            'History',
            'Pre-School Education',
            'Primary Education',
            'Social Pedagogy'
    ];

        foreach ($names as $name) {
            Faculty::create(['name' => $name]);
        }
    }
}
