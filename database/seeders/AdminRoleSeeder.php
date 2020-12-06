<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create([
            'name'  => 'SuperAdmin',
            'guard_name'    => 'web'
        ]);

        $permissions = Permission::get();
        foreach ($permissions as $permission){
            $permission->assignRole($adminRole);
        }
    }
}
