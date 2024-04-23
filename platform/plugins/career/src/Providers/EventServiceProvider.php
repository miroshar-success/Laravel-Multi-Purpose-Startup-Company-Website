<?php

namespace ArchiElite\Career\Providers;

use ArchiElite\Career\Listeners\AddSitemapListener;
use Botble\Theme\Events\RenderingSiteMapEvent;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        RenderingSiteMapEvent::class => [
            AddSitemapListener::class,
        ],
    ];
}
