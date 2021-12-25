<?php

namespace App\Http\Requests;

use App\Models\Galery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGaleryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('galery_create');
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
