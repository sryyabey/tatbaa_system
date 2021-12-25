<?php

namespace App\Http\Requests;

use App\Models\Galery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGaleryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('galery_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
        ];
    }
}
