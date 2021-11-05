<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = new User();
        $student -> name = 'student';
        $student -> email = '1@mail.com';
        $student -> password = md5('admin');
        $student -> save();
        $student -> assignRole('student');

        $staff = new User();
        $staff -> name = 'staff';
        $staff -> email = '2@mail.com';
        $staff -> password = md5('admin');
        $staff -> save();

        $staff -> assignRole('staff');

        $company = new User();
        $company -> name = 'company';
        $company -> email = '3@mail.com';
        $company -> password = md5('admin');
        $company -> save();

        $company -> assignRole('company');

        $academ = new User();
        $academ -> name = 'academ';
        $academ -> email = '4@mail.com';
        $academ -> password = md5('admin');
        $academ -> save();

        $academ -> assignRole('academ');
    }
}
