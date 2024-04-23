<?php

namespace ArchiElite\Career\Providers;

use ArchiElite\Career\Models\Career;
use ArchiElite\Career\Services\HandleFrontPages;
use Botble\Base\Facades\DashboardMenu;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\LanguageAdvanced\Supports\LanguageAdvancedManager;
use Botble\SeoHelper\Facades\SeoHelper;
use Botble\Slug\Facades\SlugHelper;
use Botble\Slug\Models\Slug;
use Botble\Theme\Facades\SiteMapManager;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class CareerServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function boot(): void
    {
        SlugHelper::registerModule(Career::class, 'Careers');
        SlugHelper::setPrefix(Career::class, 'careers', true);

        $this->setNamespace('plugins/career')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadHelpers()
            ->loadAndPublishTranslations()
            ->loadRoutes();

        Event::listen(RouteMatched::class, function () {
            DashboardMenu::make()
                ->registerItem([
                    'id' => 'cms-plugins-career',
                    'priority' => 5,
                    'parent_id' => null,
                    'name' => 'plugins/career::career.name',
                    'icon' => 'ti ti-news',
                    'url' => route('careers.index'),
                    'permissions' => ['careers.index'],
                ]);
        });

        if (defined('LANGUAGE_MODULE_SCREEN_NAME') && defined('LANGUAGE_ADVANCED_MODULE_SCREEN_NAME')) {
            LanguageAdvancedManager::registerModule(Career::class, [
                'name',
                'location',
                'salary',
                'description',
                'content',
            ]);
        }

        $this->app->booted(function () {
            SeoHelper::registerModule(Career::class);

            add_filter(BASE_FILTER_PUBLIC_SINGLE_DATA, [$this, 'handleSingleView'], 30);
        });

        $this->app->register(EventServiceProvider::class);

        SiteMapManager::registerKey(['careers']);
    }

    public function handleSingleView(Slug|array $slug): Slug|array
    {
        return (new HandleFrontPages())->handle($slug);
    }
}
