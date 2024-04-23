<?php

use Botble\Shortcode\Compilers\Shortcode as ShortcodeCompiler;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Theme\Facades\Theme;

app()->booted(function () {
    if (! is_plugin_active('newsletter')) {
        return;
    }

    Shortcode::register(
        'banner-with-newsletter-form',
        __('Banner with newsletter form'),
        __('Banner with newsletter form'),
        function (
            ShortcodeCompiler $shortcode
        ) {
            return Theme::partial('shortcodes.banner-with-newsletter-form.index', compact('shortcode'));
        }
    );

    Shortcode::setAdminConfig('banner-with-newsletter-form', function (array $attributes) {
        return Theme::partial('shortcodes.banner-with-newsletter-form.admin-config', compact('attributes'));
    });
});
