<?php

namespace App\Http\Requests;

use App\Models\Tracking;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTrackingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tracking_edit');
    }

    public function rules()
    {
        return [
            'process_time' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
