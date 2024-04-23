<?php

namespace Botble\Ecommerce\Http\Requests\Fronts;

use Botble\Support\Http\Requests\Request;

class AccountDeletionRequest extends Request
{
    public function rules(): array
    {
        return [
            'password' => ['required', 'string', 'current_password'],
            'reason' => ['nullable', 'string', 'max:255'],
        ];
    }
}
