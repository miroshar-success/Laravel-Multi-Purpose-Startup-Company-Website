@php
    $promptTemplate = json_decode(setting('ai_writer_prompt_template'), true);
    $promptTitle = data_get($promptTemplate, '*.title', []);
@endphp

<form id="setup-prompt">
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class="form-group mb-3">
                {{ Form::label('target_field', trans('plugins/ai-writer::ai-writer.form.choose_field'), ['class' => 'text-title-field']) }}
                <div class="ui-select-wrapper">
                    {{ Form::select('target_field', ['description' => __('Description'), 'content' => __('Content')], 'content', ['class' => 'ui-select']) }}
                    <svg class="svg-next-icon svg-next-icon-size-16">
                        <use
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            xlink:href="#select-chevron"
                        ></use>
                    </svg>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="form-group mb-3">
                {{ Form::label('prompt_type', trans('plugins/ai-writer::ai-writer.form.prompt_type'), ['class' => 'text-title-field']) }}
                <div class="ui-select-wrapper">
                    {{ Form::select('prompt_type', $promptTitle, null, ['class' => 'ui-select']) }}
                    <svg class="svg-next-icon svg-next-icon-size-16">
                        <use
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            xlink:href="#select-chevron"
                        ></use>
                    </svg>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <x-core-setting::select
                name="language"
                :label="trans('plugins/ai-writer::ai-writer.form.language')"
                :options="collect(\Botble\Base\Supports\Language::getAvailableLocales())->pluck('name', 'name')"
            />
        </div>
        <div class="col-md-12 col-sm-6">
            {{ Form::label('prompt', trans('plugins/ai-writer::ai-writer.form.prompt_label'), ['class' => 'text-title-field']) }}
            <div class="form-group mb-3">
                {{ Form::textarea('prompt', null, ['class' => 'next-input', 'rows' => 5, 'placeholder' => trans('plugins/ai-writer::ai-writer.form.prompt_placeholder'), 'id' => 'prompt']) }}
            </div>
        </div>

        <div class="col-md-12 col-sm-6">
            {{ Form::label('preview_content', trans('plugins/ai-writer::ai-writer.form.preview_label'), ['class' => 'text-title-field']) }}
            <div class="form-group mb-3">
                {{ Form::editor('preview_content', null, ['class' => 'next-input', 'placeholder' => trans('plugins/ai-writer::ai-writer.form.preview_placeholder'), 'id' => 'preview_content', 'without-buttons' => true]) }}
            </div>
        </div>
    </div>
</form>

<script>
    var $promptTemplates = JSON.parse(@json(setting('ai_writer_prompt_template') ?? '[]'));

    if (!$promptTemplates.length) {
        $promptTemplates = [];
    }
</script>
