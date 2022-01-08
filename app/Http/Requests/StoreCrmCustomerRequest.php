<?php

namespace App\Http\Requests;

use App\Models\CrmCustomer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCrmCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('crm_customer_create');
    }

    public function rules()
    {
        return [
            'first_name' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
        ];
    }
}
