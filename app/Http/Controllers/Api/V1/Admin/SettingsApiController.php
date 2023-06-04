<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsApiController extends Controller
{
    public function index(Request $request)
    {
        $companyId = $this->getCompanyId($request);

        $settings = Settings::where('company_id', $companyId)->first();

        if($settings != null){
            return response($settings);
        }
        $settings = Settings::create([ 'company_id' => $companyId, 'min_price'=> 0, 'max_price'=> 1]);

        return response($settings);
    }

    public function store(Request $request)
    {
        $settings = Settings::where('company_id', $this->getCompanyId($request))->first();
        $settings->update($request->all());
        return response($settings);
    }

    public function getCompanyId(Request $request){
        $companyId = null;

        if ($request->header('X-Company-Id') && $request->header('X-Company-Id') != 'undefined' && auth()->user()->isSuperAdmin) {
            $companyId = $request->header('X-Company-Id');
        }
        else{
            $companyId = auth()->user()->company_id;
        }

        return $companyId;
    }
}
