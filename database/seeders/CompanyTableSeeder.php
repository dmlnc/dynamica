<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    public function run()
    {
        $company = [
            [
                'id'             => 1,
                'name'           => 'Company',
                'abilities'      => 'Export access'
            ],
        ];

        Company::insert($company);
    }
}
