<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $admin =   User::create([
            'name' => 'Admin',
            'email' => 'admin@ria.app',
            'password'  => '123456',
        ]);

        $admin->assignRole('SuperAdmin');

    }
}
