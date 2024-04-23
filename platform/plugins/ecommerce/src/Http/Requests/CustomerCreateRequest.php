<?php

namespace Botble\Ecommerce\Http\Requests;

use Botble\Support\Http\Requests\Request;

class CustomerCreateRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:120'],
            'email' => ['required', 'min:6', 'max:60', 'email', 'unique:ec_customers'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'private_notes' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
