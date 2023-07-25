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
                'company_id' => 1,
                'min_price' => 0,
                'max_price' => 1,
                'asp_link' => 'https://asp.dynamica-trade.su/https://asp.dynamica-trade.su/https://asp.dynamica-trade.su/',
                'export_link' => 'https://media.cm.expert/stock/export/cmexpert/dealer.site/all/1a6f30ed5c29e6b5d2fdd1d87740b925.xml',
                'telegram_id' => '-1001888296830',
            ],
        ];

        Settings::insert($data);
    }
}
