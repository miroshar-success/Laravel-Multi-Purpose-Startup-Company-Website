<?php

use Botble\Shortcode\Compilers\Shortcode as ShortcodeCompiler;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Testimonial\Models\Testimonial;
use Botble\Theme\Facades\Theme;

app()->booted(function () {
    if (! is_plugin_active('testimonial')) {
        return;
    }

    Shortcode::register(
        'testimonials',
        __('Testimonials'),
        __('Testimonials'),
        function (ShortcodeCompiler $shortcode) {
            $testimonials = Testimonial::query()
                ->wherePublished()
                ->limit((int) $shortcode->limit ?: 4)
                ->get();

            return Theme::partial('shortcodes.testimonials.index', compact('shortcode', 'testimonials'));
        }
    );

    Shortcode::setAdminConfig('testimonials', function (array $attributes) {
        return Theme::partial('shortcodes.testimonials.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'why-using-your-app',
        __('Why using your app'),
        __('Why using your app'),
        function (ShortcodeCompiler $shortcode) {
            if (! $testimonialId = $shortcode->testimonial_id) {
                return null;
            }

            $testimonial = Testimonial::query()->find($testimonialId);

            return Theme::partial('shortcodes.why-using-your-app.index', compact('shortcode', 'testimonial'));
        }
    );

    Shortcode::setAdminConfig('why-using-your-app', function (array $attributes) {
        $testimonials = Testimonial::query()
            ->wherePublished()
            ->get();

        return Theme::partial('shortcodes.why-using-your-app.admin-config', compact('attributes', 'testimonials'));
    });

    Shortcode::register(
        'business-statistics',
        __('Business statistics'),
        __('Business statistics'),
        function (ShortcodeCompiler $shortcode) {
            if (! $testimonialIds = Shortcode::fields()->getIds('testimonial_ids', $shortcode)) {
                return null;
            }

            $testimonials = Testimonial::query()
                ->wherePublished()
                ->whereIn('id', $testimonialIds)
                ->get();

            $tabs = Shortcode::fields()->getTabsData(['title', 'data', 'unit'], $shortcode);

            return Theme::partial('shortcodes.business-statistics.index', compact('shortcode', 'testimonials', 'tabs'));
        }
    );

    Shortcode::setAdminConfig('business-statistics', function (array $attributes) {
        $testimonials = Testimonial::query()
            ->wherePublished()
            ->pluck('name', 'id')
            ->all();

        return Theme::partial('shortcodes.business-statistics.admin-config', compact('attributes', 'testimonials'));
    });
});
