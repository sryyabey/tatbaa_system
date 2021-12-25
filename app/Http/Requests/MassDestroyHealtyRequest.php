<?php

namespace App\Http\Requests;

use App\Models\Healty;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHealtyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('healty_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:healties,id',
        ];
    }
}
