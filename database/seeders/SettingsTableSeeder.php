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
                'min_price' => 0,
                'max_price' => 1,
            ],
        ];

        Settings::insert($data);
    }
}
