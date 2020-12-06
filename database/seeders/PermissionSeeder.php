<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $actions = ['create', 'read', 'update', 'delete'];
        $excluded = ['Technology.php', 'Deliverable.php', 'ChangeStage.php'];

        $path = app_path('Models');
        $results = scandir($path);

        for ($i = 2; $i<count($results); $i++){
            if (!in_array($results[$i], $excluded)) {
                for ($a = 0; $a < count($actions); $a++) {
                    Permission::firstOrCreate([
                        'name' => $actions[$a] . "-" . strtolower(Str::plural(substr($results[$i], 0, -4))),
                        'guard_name' => 'web'
                    ]);
                }
            }
        }

    }
}
