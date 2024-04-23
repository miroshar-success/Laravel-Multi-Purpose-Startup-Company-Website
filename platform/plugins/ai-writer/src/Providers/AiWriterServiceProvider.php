<?php

namespace ArchiElite\AiWriter\Providers;

use ArchiElite\AiWriter\AiWriter;
use ArchiElite\AiWriter\Contracts\AiWriter as AiWriterContract;
use Botble\Base\Facades\PanelSectionManager;
use Botble\Base\PanelSections\PanelSectionItem;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Setting\PanelSections\SettingOthersPanelSection;
use Illuminate\Support\ServiceProvider;

class AiWriterServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register(): void
    {
        $this->app->singleton(
            AiWriterContract::class,
            fn () => new AiWriter()
        );
    }

    public function boot(): void
    {
        $this->setNamespace('plugins/ai-writer')
            ->loadRoutes()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadMigrations()
            ->publishAssets();

        PanelSectionManager::default()->beforeRendering(function () {
            PanelSectionManager::registerItem(
                SettingOthersPanelSection::class,
                fn () => PanelSectionItem::make('ai-writer')
                    ->setTitle(trans('plugins/ai-writer::ai-writer.name'))
                    ->withIcon('ti ti-message-chatbot')
                    ->withDescription(trans('plugins/ai-writer::ai-writer.setting.generate_description'))
                    ->withPriority(10)
                    ->withRoute('ai-writer.settings')
            );
        });

        $this->app->register(HookServiceProvider::class);
    }
}
