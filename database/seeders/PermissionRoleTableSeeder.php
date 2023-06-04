<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $all_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($all_permissions->pluck('id'));

        $admin_permissions = $all_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 8) != 'company_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_';
        });
        Role::findOrFail(2)->permissions()->sync($admin_permissions);

        $regular_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 9) != 'settings_';
        });

        Role::findOrFail(3)->permissions()->sync($regular_permissions->where('title', 'export_access')->pluck('id'));

        $buyManagerPermissionsTitles = ['service_access', 'service_show', 'service_edit', 'service_print', 'service_edit_basic'];
         
        Role::findOrFail(4)->permissions()->sync($regular_permissions->whereIn('title', $buyManagerPermissionsTitles)->pluck('id'));

        $diagnosticPermissionsTitles = ['service_access', 'service_show', 'service_edit', 'service_print', 'service_edit_basic', 'service_edit_diagnostic'];

        Role::findOrFail(5)->permissions()->sync($regular_permissions->whereIn('title', $diagnosticPermissionsTitles)->pluck('id'));

    }
}
