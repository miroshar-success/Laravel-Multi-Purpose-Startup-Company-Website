<?php

namespace ArchiElite\Career\Listeners;

use ArchiElite\Career\Models\Career;
use Botble\Theme\Events\RenderingSiteMapEvent;
use Botble\Theme\Facades\SiteMapManager;

class AddSitemapListener
{
    public function handle(RenderingSiteMapEvent $event): void
    {
        if ($event->key == 'careers') {
            $careerLastUpdated = Career::query()
                ->wherePublished()
                ->latest('updated_at')
                ->value('updated_at');

            SiteMapManager::add(route('public.careers'), $careerLastUpdated, '0.4', 'monthly');

            $careers = Career::query()
                ->wherePublished()
                ->orderByDesc('updated_at')
                ->get();

            foreach ($careers as $career) {
                SiteMapManager::add($career->url, $career->updated_at, '0.6');
            }
        }

        $careerLastUpdated = Career::query()
            ->wherePublished()
            ->latest('updated_at')
            ->value('updated_at');

        SiteMapManager::addSitemap(SiteMapManager::route('careers'), $careerLastUpdated);
    }
}
