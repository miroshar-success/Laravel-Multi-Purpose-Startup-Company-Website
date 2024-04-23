<?php

namespace Botble\BusinessService\Providers;

use Botble\Base\Facades\DashboardMenu;
use Botble\Base\Supports\ServiceProvider;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\BusinessService\Models\Package;
use Botble\BusinessService\Models\Service;
use Botble\BusinessService\Models\ServiceCategory;
use Botble\LanguageAdvanced\Supports\LanguageAdvancedManager;
use Botble\SeoHelper\Facades\SeoHelper;
use Botble\Slug\Facades\SlugHelper;

class BusinessServiceServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function boot(): void
    {
        $this
            ->setNamespace('plugins/business-services')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadAndPublishTranslations()
            ->loadMigrations()
            ->loadRoutes()
            ->registerSlugHelper()
            ->registerSeoHelper()
            ->registerLanguage();

        DashboardMenu::default()->beforeRetrieving(function () {
            DashboardMenu::make()
                ->registerItem([
                    'id' => 'cms-core-business-services',
                    'priority' => 10,
                    'name' => 'plugins/business-services::business-services.name',
                    'icon' => 'ti ti-truck',
                ])
                ->registerItem([
                    'id' => 'cms-core-business-services-service-categories',
                    'priority' => 2,
                    'parent_id' => 'cms-core-business-services',
                    'name' => 'plugins/business-services::business-services.service_category.name',
                    'permissions' => ['business-services.service-categories.index'],
                    'url' => route('business-services.service-categories.index'),
                ])
                ->registerItem([
                    'id' => 'cms-core-business-services-services',
                    'priority' => 3,
                    'parent_id' => 'cms-core-business-services',
                    'name' => 'plugins/business-services::business-services.service.name',
                    'permissions' => ['business-services.services.index'],
                    'url' => route('business-services.services.index'),
                ])
                ->registerItem([
                    'id' => 'cms-core-business-services-packages',
                    'priority' => 4,
                    'parent_id' => 'cms-core-business-services',
                    'name' => 'plugins/business-services::business-services.package.name',
                    'permissions' => ['business-services.packages.index'],
                    'url' => route('business-services.packages.index'),
                ]);
        });
    }

    protected function registerSlugHelper(): self
    {
        SlugHelper::registerModule(Service::class, 'Services');
        SlugHelper::registerModule(Package::class, 'Packages');

        SlugHelper::setPrefix(Service::class, 'services');
        SlugHelper::setPrefix(Package::class, 'packages');

        return $this;
    }

    protected function registerSeoHelper(): self
    {
        SeoHelper::registerModule(Service::class);
        SeoHelper::registerModule(Package::class);

        return $this;
    }

    protected function registerLanguage(): self
    {
        if (! defined('LANGUAGE_MODULE_SCREEN_NAME') || ! defined('LANGUAGE_ADVANCED_MODULE_SCREEN_NAME')) {
            return $this;
        }

        LanguageAdvancedManager::registerModule(ServiceCategory::class, [
            'name',
            'description',
        ]);

        LanguageAdvancedManager::registerModule(Service::class, [
            'name',
            'description',
            'content',
        ]);

        LanguageAdvancedManager::registerModule(Package::class, [
            'name',
            'description',
            'content',
            'price',
            'annual_price',
            'features',
        ]);

        return $this;
    }
}
