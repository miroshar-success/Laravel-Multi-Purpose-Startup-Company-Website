<?php

use Botble\Base\Facades\Html;
use Botble\BusinessService\Models\Package;
use Botble\BusinessService\Models\Service;
use Botble\Shortcode\Compilers\Shortcode as ShortcodeCompiler;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Theme\Facades\Theme;

app()->booted(function () {
    if (! is_plugin_active('business-services')) {
        return;
    }

    Shortcode::register('services', __('Services'), __('Services'), function (ShortcodeCompiler $shortcode) {
        if (! $serviceIds = Shortcode::fields()->getIds('service_ids', $shortcode)) {
            return null;
        }

        $services = Service::query()
            ->whereIn('id', $serviceIds)
            ->with(['category', 'metadata'])
            ->wherePublished()
            ->get();

        $style = in_array(
            $shortcode->style,
            ['style-1', 'style-2', 'style-3', 'style-4']
        ) ? $shortcode->style : 'style-1';

        return Theme::partial(
            "shortcodes.services.styles.$style",
            compact('shortcode', 'services')
        );
    });

    Shortcode::setAdminConfig('services', function (array $attributes) {
        $services = Service::query()
            ->wherePublished()
            ->pluck('name', 'id')
            ->all();

        return Theme::partial('shortcodes.services.admin-config', compact('attributes', 'services'));
    });

    Shortcode::register(
        'pricing-plan',
        __('Pricing Plan'),
        __('Pricing Plan'),
        function (ShortcodeCompiler $shortcode) {
            if (! $packageIds = Shortcode::fields()->getIds('package_ids', $shortcode)) {
                return null;
            }

            $packages = Package::query()
                ->wherePublished()
                ->whereIn('id', $packageIds)
                ->get();

            $styleBg = ['bg-fourth-bg', 'bg-first-bg', 'bg-second-bg', 'bg-fifth-bg'];
            $style = in_array($shortcode->style, ['style-1', 'style-2']) ? $shortcode->style : 'style-1';

            return Theme::partial(
                "shortcodes.pricing-plan.styles.$style",
                compact('shortcode', 'packages', 'styleBg')
            );
        }
    );

    Shortcode::setAdminConfig('pricing-plan', function (array $attributes) {
        $packages = Package::query()
            ->wherePublished()
            ->pluck('name', 'id')
            ->all();

        return Html::style('vendor/core/core/base/libraries/tagify/tagify.css') .
            Html::script('vendor/core/core/base/libraries/tagify/tagify.js') .
            Html::script('vendor/core/core/base/js/tags.js') .
            Theme::partial('shortcodes.pricing-plan.admin-config', compact('attributes', 'packages'));
    });
});
