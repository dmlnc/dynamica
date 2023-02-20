<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsApiController extends Controller
{
    public function index()
    {
        return response(Settings::find(1));
    }

    public function store(Request $request)
    {
        $settings = Settings::find(1);
        $settings->update($request->all());

        return response($settings);
    }
}
