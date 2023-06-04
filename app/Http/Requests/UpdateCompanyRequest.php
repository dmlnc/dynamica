<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('company_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'abilities' => [
                'array',
            ],
            
        ];
    }
}
