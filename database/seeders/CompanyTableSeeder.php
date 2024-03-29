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
                'abilities'      => 'Export access,Service access'
            ],
            [
                'id'             => 2,
                'name'           => 'Company without service',
                'abilities'      => 'Export access'
            ],
        ];

        Company::insert($company);
    }
}
