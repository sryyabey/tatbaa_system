<?php

namespace App\Http\Requests;

use App\Models\Randevu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRandevuRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('randevu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:randevus,id',
        ];
    }
}
