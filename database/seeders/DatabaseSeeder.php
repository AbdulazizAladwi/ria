<?php

namespace Database\Seeders;

use App\Models\User;
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
        //$this->call(UserSeeder::class);
        $this->call([PermissionSeeder::class]);
        $this->call([AdminRoleSeeder::class]);
        $this->call([AdminSeeder::class]);
        $this->call([SettingSeeder::class]);
    }
}
