<?php

namespace Botble\Ecommerce\Http\Requests\Settings;

use Botble\Base\Rules\OnOffRule;
use Botble\Support\Http\Requests\Request;

class CustomerSettingRequest extends Request
{
    public function rules(): array
    {
        return [
            'verify_customer_email' => [new OnOffRule()],
            'login_using_phone' => [new OnOffRule()],
            'login_option' => ['required', 'string', 'in:email,phone,email_or_phone'],
        ];
    }
}
