<?php

namespace ArchiElite\AiWriter\Http\Requests;

use Botble\Base\Rules\OnOffRule;
use Botble\Setting\Http\Requests\SettingRequest as BaseRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class SettingRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'ai_writer_enabled' => new OnOffRule(),
            'ai_writer_openai_key' => 'nullable|string|min:40|max:120',
            'ai_writer_openai_temperature' => 'required|numeric|min:0|max:2',
            'ai_writer_openai_max_tokens' => 'required|numeric|min:100',
            'ai_writer_openai_frequency_penalty' => 'required|numeric|min:-2|max:2',
            'ai_writer_openai_presence_penalty' => 'required|numeric|min:-2|max:2',
            'ai_writer_openai_default_model' => [
                'nullable',
                'string',
                Rule::in(Cache::get('ai-writer-models', fn () => [])),
            ],
            'ai_writer_prompt_template' => 'array|nullable',
            'ai_writer_prompt_template.*.title' => 'string|nullable',
            'ai_writer_prompt_template.*.content' => 'string|nullable',
            'ai_writer_proxy_enable' => 'boolean',
            'ai_writer_proxy_protocol' => 'required_if:ai_writer_proxy_enable,1|boolean',
            'ai_writer_proxy_ip' => 'required_if:ai_writer_proxy_enable,1|ip|nullable',
            'ai_writer_proxy_port' => 'required_if:ai_writer_proxy_enable,1|numeric|min:0|max:65536|nullable',
            'ai_writer_proxy_username' => 'string|nullable',
            'ai_writer_proxy_password' => 'string|nullable',
            'ai_writer_spin_template' => 'array|nullable',
            'ai_writer_spin_template.*.title' => 'string|nullable',
            'ai_writer_spin_template.*.content' => 'string|nullable',
        ];
    }
}
