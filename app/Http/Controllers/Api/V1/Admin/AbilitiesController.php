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

        return response([
            'data' => new AbilityResource($permissions),
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
