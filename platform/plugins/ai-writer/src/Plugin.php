<?php

namespace ArchiElite\AiWriter;

use Botble\PluginManagement\Abstracts\PluginOperationAbstract;
use Botble\Setting\Facades\Setting;

class Plugin extends PluginOperationAbstract
{
    public static function activated(): void
    {
        $settings = [
            'ai_writer_proxy_enable' => 0,
            'ai_writer_proxy_protocol' => null,
            'ai_writer_proxy_ip' => null,
            'ai_writer_proxy_port' => null,
            'ai_writer_proxy_username' => null,
            'ai_writer_proxy_password' => null,
            'ai_writer_prompt_template' => json_encode([
                [
                    'title' => 'Product Content',
                    'content' => "You will be a marketer. I will give the information of the product, you will write an introductory article about that product, the article requires google seo standards and is highly persuasive to increase the rate of users closing orders.\nParameters product:",
                ],
                [
                    'title' => 'Post Content',
                    'content' => 'You will be a marketer. Articles about:',
                ],
            ]),
            'ai_writer_openai_key' => null,
            'ai_writer_openai_temperature' => 1.0,
            'ai_writer_openai_max_tokens' => 2000,
            'ai_writer_openai_frequency_penalty' => 0,
            'ai_writer_openai_presence_penalty' => 0,
            'ai_writer_openai_models' => json_encode(['gpt-3.5-turbo']),
            'ai_writer_openai_default_model' => 'gpt-3.5-turbo',
            'ai_writer_spin_template' => json_encode([]),
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }

        Setting::save();
    }
}
