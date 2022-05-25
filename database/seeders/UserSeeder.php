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
        //User::factory(100)->create();
        $roles = Role::all('name')->toArray();
        for ($i = 0; $i < 100; $i++) {
            $user = User::create([
                'firstname' => 'first ' . $i,
                'lastname' => 'last ' . $i,
                'email' => 'email' . $i . '@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            ]);
            
    
            $user->assignRole($roles[$i % 4]['name']);
        }
        $company = Company::create([
            'name' => 'first',
            'user_id' => 1,
        ]);

        $company->user->assignRole('company');

    }
}
