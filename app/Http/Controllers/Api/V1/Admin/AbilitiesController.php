<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AbilityResource;
use App\Models\Company;
use Illuminate\Http\Request;

class AbilitiesController extends Controller
{
    public function index(Request $request)
    {
        $permissions = auth()->user()->roles()->with('permissions')->get()
            ->pluck('permissions')
            ->flatten()
            ->pluck('title')
            ->toArray();

        $companyId = $request->header('X-Company-Id');

        if ($companyId && $companyId != 'undefined' && auth()->user()->isAdmin) {
            $currentCompany = Company::select(['abilities', 'id', 'name'])->where('id', $companyId)->first();
        } else {
            $currentCompany = auth()->user()->company;
        }

        
        $abilities = array_map(function($ability) {
            return $ability->title;
        }, $currentCompany->abilities);

        $abilities_user = array_map(function($ability) {
            return 'company.' . $ability;
        }, $abilities);

        if (!in_array('Service access', $abilities)) {
            $permissions = array_filter($permissions, function($permission) {
                return strpos($permission, 'service_') !== 0;
            });
        }
        if (!in_array('Export access', $abilities)) {
            $permissions = array_filter($permissions, function($permission) {
                return strpos($permission, 'export_') !== 0;
            });
        }
        if($companyId != auth()->user()->company_id && !auth()->user()->isSuperAdmin){
            $permissions = array_filter($permissions, function($permission) {
                return strpos($permission, 'settings_') !== 0 && strpos($permission, 'user_') !== 0;
            });
        }
        $permissions = array_values($permissions);
        $permissions = array_merge($permissions, $abilities_user);
        return response([
            'data' => $permissions,
            'meta' => [
                'company' => [
                    'id' => $currentCompany->id,
                    'name' => $currentCompany->name,
                    'abilities' => $abilities,
                ]
            ],
        ]); 
    }
}
