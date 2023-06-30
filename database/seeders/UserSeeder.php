<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

use App\Models\User;
use App\Models\Company;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $gender = ["Male", "Female"];
        //User::factory(100)->create();
        $roles = Role::all('name')->toArray();
        for ($i = 0; $i < 100; $i++) {
            $user = User::create([
                'firstname' => 'first ' . $i,
                'lastname' => 'last ' . $i,
                'email' => 'email' . $i . '@gmail.com',
                'email_verified_at' => now(),
                'faculty_id' => rand(1, 3),
                'gender' => $gender[rand(0,1)],
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            ]);
            
    
            $user->assignRole($roles[$i % 4]['name']);
        }
        $company = Company::create([
            'name' => 'first',
            'user_id' => 1,
        ]);

        $company->user->assignRole('company');
        */
        $admin = User::create([
            'firstname' => 'Abbas',
            'lastname' => 'Bodaubekov',
            'email' => 'abbas.bodaubekov@sdu.edu.kz',
            'password' => $2y$10$xKBJb2O8PE33YOmUY76PU.OIxGiY9sJPk8qGfZkbm7dgl/ejf8e3O',
            'gender' => "Male",
        ]);

        $admin->assignRole('admin');

    }
}
