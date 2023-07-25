<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'settings_access',
            ],
            [
                'id'    => 18,
                'title' => 'settings_edit',
            ],
            [
                'id'    => 19,
                'title' => 'settings_show',
            ],
            [
                'id'    => 20,
                'title' => 'company_create',
            ],
            [
                'id'    => 21,
                'title' => 'company_edit',
            ],
            [
                'id'    => 22,
                'title' => 'company_show',
            ],
            [
                'id'    => 23,
                'title' => 'company_delete',
            ],
            [
                'id'    => 24,
                'title' => 'company_access',
            ],
            [
                'id'    => 25,
                'title' => 'export_access',
            ],
            [
                'id'    => 26,
                'title' => 'service_access',
            ],
            [
                'id'    => 27,
                'title' => 'service_show',
            ],
            [
                'id'    => 28,
                'title' => 'service_create',
            ],
            [
                'id'    => 29,
                'title' => 'service_edit',
            ],
            [
                'id'    => 30,
                'title' => 'service_print_full',
            ],
            [
                'id'    => 31,
                'title' => 'service_print_client',
            ],
            [
                'id'    => 32,
                'title' => 'service_edit_basic',
            ],
            [
                'id'    => 33,
                'title' => 'service_edit_diagnostic',
            ],
            [
                'id'    => 34,
                'title' => 'service_edit_published',
            ],
            [
                'id'    => 35,
                'title' => 'service_delete',
            ],
        ];

        
        Permission::insert($permissions);
    }
}
