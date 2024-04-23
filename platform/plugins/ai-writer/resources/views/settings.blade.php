@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    <div class="max-width-1200">
        <x-core::form
            :url="route('ai-writer.settings.update')"
            method="PUT"
        >
            <x-core-setting::section
                :title="trans('plugins/ai-writer::ai-writer.setting.generate')"
                :description="trans('plugins/ai-writer::ai-writer.setting.generate_description')"
            >
                @if (BaseHelper::getRichEditor() !== 'ckeditor')
                    <x-core::alert type="warning">
                        {{ trans('plugins/ai-writer::ai-writer.setting.editor_not_support') }}
                    </x-core::alert>
                @endif


                <x-core::form.on-off.checkbox
                    name="ai_writer_enabled"
                    id="ai-writer-enabled"
                    :checked="old('ai_writer_enabled', setting('ai_writer_enabled', true))"
                >
                    {{ trans('plugins/ai-writer::ai-writer.setting.enable')  }}
                </x-core::form.on-off.checkbox>

                <x-core::form.text-input
                    name="ai_writer_openai_key"
                    type="password"
                    :label="trans('plugins/ai-writer::ai-writer.setting.openai_key')"
                    :value="old(
                        'ai_writer_openai_key',
                        BaseHelper::hasDemoModeEnabled()
                            ? Str::mask(setting('ai_writer_openai_key'), '*', 30)
                            : setting('ai_writer_openai_key'),
                    )"
                >
                    <x-slot:helper-text>
                        {!! BaseHelper::clean(trans('plugins/ai-writer::ai-writer.setting.helper_create_api_key', [
                            'url' => Html::link('https://platform.openai.com/api-keys', 'https://platform.openai.com/api-keys', ['target' => '_blank']),
                        ])) !!}
                    </x-slot:helper-text>
                </x-core::form.text-input>

                <x-core::form.text-input
                    name="ai_writer_openai_temperature"
                    type="text"
                    :label="trans('plugins/ai-writer::ai-writer.setting.openai_temperature')"
                    :value="old('ai_writer_openai_temperature', setting('ai_writer_openai_temperature'))"
                    :placeholder="trans('plugins/ai-writer::ai-writer.setting.openai_temperature')"
                    :helperText="trans('plugins/ai-writer::ai-writer.setting.openai_temperature_helper_text')"
                />

                <x-core::form.text-input
                    name="ai_writer_openai_max_tokens"
                    type="text"
                    :label="trans('plugins/ai-writer::ai-writer.setting.openai_max_tokens')"
                    :value="old('ai_writer_openai_max_tokens', setting('ai_writer_openai_max_tokens', 2000))"
                    :placeholder="trans('plugins/ai-writer::ai-writer.setting.openai_max_tokens')"
                    :helperText="trans('plugins/ai-writer::ai-writer.setting.openai_max_tokens_helper_text')"
                />

                <x-core::form.text-input
                    name="ai_writer_openai_frequency_penalty"
                    type="text"
                    :label="trans('plugins/ai-writer::ai-writer.setting.openai_frequency_penalty')"
                    :value="old('ai_writer_openai_frequency_penalty', setting('ai_writer_openai_frequency_penalty'))"
                    :placeholder="trans('plugins/ai-writer::ai-writer.setting.openai_frequency_penalty')"
                    :helperText="trans('plugins/ai-writer::ai-writer.setting.openai_frequency_penalty_helper_text')"
                />

                <x-core::form.text-input
                    name="ai_writer_openai_presence_penalty"
                    type="text"
                    :label="trans('plugins/ai-writer::ai-writer.setting.openai_presence_penalty')"
                    :value="old('ai_writer_openai_presence_penalty', setting('ai_writer_openai_presence_penalty'))"
                    :placeholder="trans('plugins/ai-writer::ai-writer.setting.openai_presence_penalty')"
                    :helperText="trans('plugins/ai-writer::ai-writer.setting.openai_presence_penalty_helper_text')"
                />

                @if ($models)
                    <x-core::form.select
                        name="ai_writer_openai_default_model"
                        :label="trans('plugins/ai-writer::ai-writer.setting.openai_model')"
                        :options="$models"
                        :value="setting('ai_writer_openai_default_model')"
                    >
                        <x-slot:helper-text>
                            {!! BaseHelper::clean(trans('plugins/ai-writer::ai-writer.setting.see_documentation', [
                                'link' => Html::link('https://platform.openai.com/docs/models/model-endpoint-compatibility', 'https://platform.openai.com/docs/models/model-endpoint-compatibility', ['target' => '_blank']),
                             ])) !!}
                        </x-slot:helper-text>
                    </x-core::form.select>
                @endif
            </x-core-setting::section>

            <x-core-setting::section
                :title="trans('plugins/ai-writer::ai-writer.setting.generate_default')"
                :description="trans('plugins/ai-writer::ai-writer.setting.generate_default_description')"
            >
                <div id="prompt-template-wrapper">
                    <a class="link add-template">
                        <small>+ {{ trans('plugins/ai-writer::ai-writer.setting.add_more') }}</small>
                    </a>
                </div>
            </x-core-setting::section>

            <x-core-setting::section
                :title="trans('plugins/ai-writer::ai-writer.setting.proxy')"
                :description="trans('plugins/ai-writer::ai-writer.setting.proxy_description')"
            >
                <x-core::form.radio-list
                    name="ai_writer_proxy_enable"
                    :label="trans('plugins/ai-writer::ai-writer.setting.proxy_enable')"
                    :value="setting('ai_writer_proxy_enable')"
                    data-target="#autocontent-proxy-settings"
                    class="setting-selection-option"
                    :options="[
                        '1' => trans('core/setting::setting.general.yes'),
                        '0' => trans('core/setting::setting.general.no'),
                    ]"
                />

                <div
                    class="mb-4 border rounded-top rounded-bottom p-3 bg-light @if (!setting('ai_writer_proxy_enable')) d-none @endif"
                    id="autocontent-proxy-settings"
                >
                    <x-core::form.select
                        name="ai_writer_proxy_protocol"
                        :options="['0' => 'http', '1' => 'https']"
                        id="ai_writer_proxy_protocol"
                        :label="trans('plugins/ai-writer::ai-writer.setting.proxy_protocol')"
                        :value="setting('ai_writer_proxy_protocol')"
                    />

                    <x-core::form.text-input
                        name="ai_writer_proxy_ip"
                        :label="trans('plugins/ai-writer::ai-writer.setting.proxy_ip')"
                        placeholder="192.168.1."
                        class="next-input"
                        :value="setting('ai_writer_proxy_ip')"
                    />

                    <x-core::form.text-input
                        name="ai_writer_proxy_port"
                        :label="trans('plugins/ai-writer::ai-writer.setting.proxy_port')"
                        placeholder="3304"
                        class="next-input"
                        :value="setting('ai_writer_proxy_port')"
                    />

                    <x-core::form.text-input
                        name="ai_writer_proxy_username"
                        :label="trans('plugins/ai-writer::ai-writer.setting.proxy_username')"
                        placeholder="username"
                        class="next-input"
                        :value="setting('ai_writer_proxy_username')"
                    />

                    <x-core::form.text-input
                        type="password"
                        name="ai_writer_proxy_password"
                        :label="trans('plugins/ai-writer::ai-writer.setting.proxy_password')"
                        :value="old('ai_writer_proxy_password', setting('ai_writer_proxy_password'))"
                        class="next-input"
                    />
                </div>
            </x-core-setting::section>

            <x-core-setting::section
                :title="trans('plugins/ai-writer::ai-writer.setting.spin')"
                :description="trans('plugins/ai-writer::ai-writer.setting.spin_description')"
            >
                <div id="spin-template-wrapper">
                    <a
                        class="link add-template"
                        data-placeholder=""
                    >
                        <small>+ {{ trans('plugins/ai-writer::ai-writer.setting.add_more') }}</small>
                    </a>
                </div>
            </x-core-setting::section>

            <x-core-setting::section.action>
                <x-core::button
                    type="submit"
                    color="primary"
                    icon="ti ti-device-floppy"
                >
                    {{ trans('core/setting::setting.save_settings') }}
                </x-core::button>
            </x-core-setting::section.action>
        </x-core::form>
    </div>

    @push('footer')
        <script>
            @php
                $templateJson = setting('ai_writer_spin_template') ?: '[]';
                $promptJson = setting('ai_writer_prompt_template') ?: '[]';
            @endphp

            var $spinTemplates;
            var $promptTemplates;

            try {
                $spinTemplates = JSON.parse(@json($templateJson));
            } catch (error) {
                $spinTemplates = [];
            }
            try {
                $promptTemplates = JSON.parse(@json($promptJson));
            } catch (error) {
                $promptTemplates = [];
            }
        </script>

        <template id="spin-html-template">
            <div class="mb-4 border rounded-top rounded-bottom p-3 bg-light more-template">
                <x-core::form.text-input
                    name="ai_writer_spin_template[][title]"
                    class="next-input item-title"
                    :placeholder="trans('plugins/ai-writer::ai-writer.setting.spin_template_title')"
                >
                    <x-slot:label>
                        {{ trans('plugins/ai-writer::ai-writer.setting.spin_template_title') }}
                        <x-core::button class="text-danger remove-template btn-link" icon="ti ti-minus"/>
                    </x-slot:label>
                </x-core::form.text-input>

                <x-core::form.textarea
                    name="ai_writer_spin_template[][content]"
                    :label="trans('plugins/ai-writer::ai-writer.setting.spin_label')"
                    :placeholder="trans('plugins/ai-writer::ai-writer.setting.spin_example')"
                    class="item-content"
                    rows="8"
                />
            </div>
        </template>
        <template id="prompt-html-template">
            <div class="mb-4 border rounded-top rounded-bottom p-3 bg-light more-template">
                <x-core::form.text-input
                    name="ai_writer_prompt_template[][title]"
                    class="item-title"
                    :placeholder="trans('plugins/ai-writer::ai-writer.setting.generate_label')"
                >
                    <x-slot:label>
                        {{ trans('plugins/ai-writer::ai-writer.setting.generate_label') }}
                        <x-core::button class="text-danger remove-template btn-link" icon="ti ti-minus"/>
                    </x-slot:label>
                </x-core::form.text-input>

                <x-core::form.textarea
                    name="ai_writer_prompt_template[][content]"
                    :label="trans('plugins/ai-writer::ai-writer.setting.generate_content')"
                    :placeholder="trans('plugins/ai-writer::ai-writer.setting.generate_content')"
                    class="item-content"
                    rows="8"
                />
            </div>
        </template>
    @endpush

    {!! $jsValidation !!}
@endsection
