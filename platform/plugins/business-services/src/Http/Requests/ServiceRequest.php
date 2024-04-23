<?php

namespace Botble\BusinessService\Http\Requests;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Rules\OnOffRule;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class ServiceRequest extends Request
{
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:bs_service_categories,id'],
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
            'description' => ['nullable', 'string', 'max:400'],
            'content' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'images' => ['nullable', 'array'],
            'is_featured' => ['nullable', new OnOffRule()],
            'status' => ['required', 'string', Rule::in(BaseStatusEnum::values())],
        ];
    }
}
