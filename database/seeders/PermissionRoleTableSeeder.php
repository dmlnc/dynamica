<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {

        // Супер-администратор
        $all_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($all_permissions->pluck('id'));

        //Руководитель
        $admin_permissions = $all_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 8) != 'company_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_';
        });
        Role::findOrFail(2)->permissions()->sync($admin_permissions);

        $regular_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 9) != 'settings_';
        });

        // Диагност
        $diagnosticPermissionsTitles = ['service_access', 'service_show', 'service_create', 'service_edit', 'service_print_basic','service_print_full', 'service_edit_basic', 'service_edit_diagnostic'];
        Role::findOrFail(3)->permissions()->sync($regular_permissions->whereIn('title', $diagnosticPermissionsTitles)->pluck('id'));

        // Продавец консультант
        $sellManagerPermissionsTitles = ['service_access', 'service_show', 'service_print_basic', 'export_access'];
        Role::findOrFail(4)->permissions()->sync($regular_permissions->whereIn('title', $sellManagerPermissionsTitles)->pluck('id'));

    
      
    }
}
