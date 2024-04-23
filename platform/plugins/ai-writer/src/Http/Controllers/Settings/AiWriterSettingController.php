<?php

namespace ArchiElite\AiWriter\Http\Controllers\Settings;

use ArchiElite\AiWriter\Facades\AiWriter;
use ArchiElite\AiWriter\Http\Requests\SettingRequest;
use Botble\Base\Facades\Assets;
use Botble\JsValidation\Facades\JsValidator;
use Botble\Setting\Http\Controllers\SettingController;
use Exception;
use Illuminate\Support\Facades\Cache;

class AiWriterSettingController extends SettingController
{
    public function edit()
    {
        $this->pageTitle(trans('plugins/ai-writer::ai-writer.setting.page_title'));

        Assets::addScripts(['jquery-validation', 'form-validation'])
            ->addStylesDirectly('vendor/core/core/setting/css/setting.css')
            ->addScriptsDirectly([
                'vendor/core/core/setting/js/setting.js',
                'vendor/core/plugins/ai-writer/js/settings.js',
            ]);

        try {
            $models = Cache::remember('ai-writer-models', 3600, function () {
                return AiWriter::getModels();
            });
        } catch (Exception) {
            $models = [];
        }

        $jsValidation = JsValidator::formRequest(SettingRequest::class);

        return view('plugins/ai-writer::settings', [
            'models' => array_combine($models, $models),
            'jsValidation' => $jsValidation,
        ]);
    }

    public function update(SettingRequest $request)
    {
        $data = [];

        foreach ($request->validated() as $key => $value) {
            if ($key == 'ai_writer_spin_template' || $key == 'ai_writer_prompt_template') {
                $value = array_values($value);
            }

            if (is_array($value)) {
                $value = json_encode(array_filter($value));
            }

            $data[$key] = $value;
        }

        $this->saveSettings($data);

        Cache::forget('ai-writer-models');

        return $this
            ->httpResponse()
            ->withUpdatedSuccessMessage();
    }
}
