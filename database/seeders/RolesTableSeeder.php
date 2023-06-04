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
                'title' => 'Главный администратор',
            ],
            [
                'id'    => 2,
                'title' => 'Руководитель отдела',
            ],
            [
                'id'    => 3,
                'title' => 'Продавец-консультант',
            ],
            [
                'id'    => 4,
                'title' => 'Менеджер по выкупу',
            ],
            [
                'id'    => 5,
                'title' => 'Диагност',
            ],
        ];




        Role::insert($roles);
    }
}
