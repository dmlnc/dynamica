<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id'    => 1,
            ],
        ];

        Settings::insert($data);
    }
}
