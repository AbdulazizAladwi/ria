<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([

            'name' => 'Roqay',
            'description' => 'Tracking Roqay projects',
            'phone'         => '102030',
            'email'         => 'test@me.app',
            'days'          => '22',
            'dashboard_logo'    => 'icon-default.png',
            'admin_image'    => 'icon-default.png',
        ]);
    }
}
