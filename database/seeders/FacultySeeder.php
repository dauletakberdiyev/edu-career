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
        $names = ['Computer Science', 'Information Systems', 'Economy'];

        foreach ($names as $name) {
            Faculty::create(['name' => $name]);
        }
    }
}
