<?php

namespace App\Http\Requests;

use App\Models\Randevu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRandevuRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('randevu_edit');
    }

    public function rules()
    {
        return [
            'date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'status' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
