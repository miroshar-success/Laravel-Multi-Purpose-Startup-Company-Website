<?php

return [
    'name' => 'AI Writer',
    'generate' => 'AI Writer',
    'spin' => 'Spin content',
    'menu' => 'AI Writer',
    'setting' => [
        'page_title' => 'AI Writer settings',
        'generate' => 'AI Writer',
        'enable' => 'Enable AI Writer?',
        'generate_description' => 'AI Writer prompt parameter setting.',
        'generate_placeholder' => 'Default prompt...',
        'generate_default' => 'Default prompt',
        'generate_default_description' => 'Pre-defined prompt make it easier to reuse them in editors.',
        'generate_label' => 'Prompt title',
        'generate_content' => 'Prompt content',
        'openai_key' => 'API key',
        'openai_model' => 'API Models',
        'openai_temperature' => 'Temperature',
        'openai_max_tokens' => 'Max tokens',
        'openai_frequency_penalty' => 'Frequency penalty',
        'openai_presence_penalty' => 'Presence penalty',
        'openai_temperature_helper_text' => 'This parameter controls the randomness of the generated text. Higher values lead to more creative and unexpected outputs, while lower values produce more predictable and consistent results. A good starting point is 0.7, but you can adjust it based on your desired level of creativity and control.',
        'openai_max_tokens_helper_text' => 'This parameter defines the maximum number of tokens (words) the model can generate. Longer outputs offer more context and depth, but require more computational resources. Short outputs are faster and more concise, but may lack detail. Adjust this parameter based on your specific needs and limitations.',
        'openai_frequency_penalty_helper_text' => 'This parameter penalizes the model for generating the same word or phrase repeatedly. Higher values encourage diversity and less repetition, while lower values allow for more natural language patterns. A value of 0.5 is a good starting point, but experiment to find the sweet spot for your use case.',
        'openai_presence_penalty_helper_text' => 'This parameter penalizes the model for including words or phrases already present in the prompt. Higher values encourage the model to focus on generating novel text, while lower values allow it to build upon the existing context. A value of 0.0 is a good starting point for prompts that already provide substantial context. For shorter prompts, you may want to increase the value to encourage more creative and diverse outputs.',
        'proxy' => 'Proxy',
        'proxy_enable' => 'Do you want to use proxy when calling ChatGPT API?',
        'proxy_description' => 'Configure proxy to connect to ChatGPT API.',
        'proxy_protocol' => 'Proxy protocol',
        'proxy_username' => 'Proxy username',
        'proxy_password' => 'Proxy password',
        'proxy_ip' => 'Proxy server ip',
        'proxy_port' => 'Proxy port',
        'spin' => 'Spin Content',
        'spin_description' => 'Setting spin template',
        'spin_template_title' => 'Spin template title',
        'spin_label' => 'Spin template',
        'spin_example' => "{Pineapple|Fruit}\n{Flowers|Fresh flowers}",
        'add_more' => 'Add more',
        'see_documentation' => 'See documentation :link.',
        'editor_not_support' => 'Currently, AI Writer plugin only supports CKEditor. Please go to Settings > General > Editor and select CKEditor.',
        'helper_create_api_key' => 'Create your API Key here: :url You need set up your account billing first.',
    ],
    'form' => [
        'title' => 'AI Writer',
        'generate' => 'Generate content',
        'spin' => 'Spin content',
        'push' => 'Push content',
        'choose_field' => 'Choose form field',
        'choose_template' => 'Choose spin template',
        'api_model' => 'API model',
        'prompt_type' => 'Prompt type',
        'prompt_label' => 'Prompt message',
        'prompt_placeholder' => 'Prompt message...',
        'preview_label' => 'Preview content',
        'preview_placeholder' => 'Preview content',
        'spin_placeholder' => 'Spin template',
        'request_output_format' => 'Presented in HTML for WYSIWYG editors.',
        'language' => 'Language',
        'copied' => 'Copied content!',
    ],
    'error' => [
        'incomplete_returned_content' => 'Incomplete returned content',
        'occurred_while_processing_api' => 'An error occurred while processing the api',
        'unknown' => 'Unknown error, maybe the API key is invalid or the OpenAI server is down. Server response: :message',
    ],
    'success' => [
        'content_pushed' => 'The generated content has been pushed to the editor successfully.',
    ],
];
