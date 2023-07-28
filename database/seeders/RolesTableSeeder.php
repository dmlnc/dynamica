<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Супер-администратор',
            ],
            [
                'id'    => 2,
                'title' => 'Руководитель',
            ],
            // [
            //     'id'    => 3,
            //     'title' => 'Диагност',
            // ],
            [
                'id'    => 4,
                'title' => 'Продавец консультант',
            ],
        ];



        Role::insert($roles);
    }
}
