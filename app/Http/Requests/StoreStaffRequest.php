<?php

namespace App\Http\Requests;

use App\Models\Staff;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStaffRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('staff_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'profession' => [
                'string',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
