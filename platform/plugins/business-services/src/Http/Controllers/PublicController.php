<?php

namespace Botble\BusinessService\Http\Controllers;

use Botble\Base\Http\Controllers\BaseController;
use Botble\BusinessService\Models\Package;
use Botble\BusinessService\Models\Service;
use Botble\SeoHelper\Facades\SeoHelper;
use Botble\SeoHelper\SeoOpenGraph;
use Botble\Slug\Facades\SlugHelper;
use Botble\Theme\Facades\AdminBar;
use Botble\Theme\Facades\Theme;
use Illuminate\Http\Response;

class PublicController extends BaseController
{
    public function services(): Response
    {
        SeoHelper::setTitle(__('Services'));

        $services = Service::query()
            ->wherePublished()
            ->latest()
            ->paginate(10);

        return Theme::scope('business-services.services', compact('services'))->render();
    }

    public function service(string $key): Response
    {
        $slug = SlugHelper::getSlug($key, SlugHelper::getPrefix(Service::class));

        if (! $slug) {
            abort(404);
        }

        $service = Service::query()
            ->wherePublished()
            ->findOrFail($slug->reference_id);

        SeoHelper::setTitle($service->name)
            ->setDescription($service->description);

        SeoHelper::setSeoOpenGraph(
            (new SeoOpenGraph())
                ->setDescription($service->description)
                ->setUrl($service->url)
                ->setTitle($service->name)
                ->setType('article')
        );

        Theme::breadcrumb()
            ->add(__('Home'), route('public.index'))
            ->add($service->name, $service->url);

        $relatedServices = Service::query()
            ->wherePublished()
            ->where('id', '<>', $service->id)
            ->with('metadata')
            ->inRandomOrder()
            ->limit(3)
            ->get();

        if (function_exists('admin_bar')) {
            AdminBar::registerLink(
                trans('plugins/business-services::business-services.edit_this_service'),
                route('business-services.services.edit', $service->id),
                null,
                'business-services.services.edit'
            );
        }

        return Theme::scope('business-services.service', compact('service', 'relatedServices'))->render();
    }

    public function package(string $key): Response
    {
        $slug = SlugHelper::getSlug($key, SlugHelper::getPrefix(Package::class));

        if (! $slug) {
            abort(404);
        }

        $package = Package::query()
            ->wherePublished()
            ->findOrFail($slug->reference_id);

        if (function_exists('admin_bar')) {
            AdminBar::registerLink(
                trans('plugins/business-services::business-services.edit_this_package'),
                route('business-services.packages.edit', $package->getKey()),
                null,
                'business-services.packages.edit'
            );
        }

        return Theme::scope('business-services.package', compact('package'))->render();
    }
}
