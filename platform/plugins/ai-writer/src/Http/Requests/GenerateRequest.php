<?php

namespace ArchiElite\AiWriter\Http\Requests;

use Botble\Setting\Http\Requests\SettingRequest as BaseRequest;

class GenerateRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'prompt' => 'required|string',
            'language' => 'nullable|string|max:120',
        ];
    }
}
