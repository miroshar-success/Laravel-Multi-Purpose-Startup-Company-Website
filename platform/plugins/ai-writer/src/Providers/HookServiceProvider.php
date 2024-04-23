<?php

namespace ArchiElite\AiWriter\Providers;

use ArchiElite\AiWriter\Facades\AiWriter;
use Botble\Base\Facades\Assets;
use Botble\Base\Facades\BaseHelper;
use Illuminate\Support\ServiceProvider;

class HookServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        add_filter(BASE_FILTER_FORM_EDITOR_BUTTONS, function (?string $formActions): string {
            if (! is_in_admin(true) || ! AiWriter::isEnabled()) {
                return $formActions;
            }

            if (BaseHelper::getRichEditor() !== 'ckeditor') {
                return $formActions;
            }

            Assets::addScriptsDirectly(
                config(sprintf('core.base.general.editor.%s.js', BaseHelper::getRichEditor()))
            )
                ->addScriptsDirectly([
                    'vendor/core/core/base/js/editor.js',
                    'vendor/core/plugins/ai-writer/js/ai-writer.js',
                ]);

            return $formActions . view('plugins/ai-writer::partials.action');
        }, 300);
    }
}
