<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateServiceFormRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_edit') || Gate::allows('service_edit_manager');
    }

    public function rules()
    {
        return [
            'fields'=>['required'],
            'brand'=>['required'],
            'car_model'=>['required'],
            'vin' => ['required'],
            'color' => ['required'],
            'run' => ['required'],
            'status' => ['required'],
            'comment' => [],
            'recommendation' => [],
        ];
    }
}
