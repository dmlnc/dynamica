<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreServiceFormRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_create');
    }

    public function rules()
    {
        return [
            'fields'=>['required'],
            'brand'=>['required'],
            'car_model'=>['required'],
            'vin' => ['required'],
            'color' => ['required'],
            'status' => ['required'],
            'comment' => [],
        ];
    }
}
