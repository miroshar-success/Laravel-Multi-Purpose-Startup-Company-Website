<?php

use ArchiElite\Career\Models\Career;
use Botble\Shortcode\Compilers\Shortcode as ShortcodeCompiler;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Theme\Facades\Theme;

app()->booted(function () {
    if (! is_plugin_active('career')) {
        return;
    }

    Shortcode::register('career-list', __('Career list'), __('Career list'), function (ShortcodeCompiler $shortcode) {
        if (! $careerIds = Shortcode::fields()->getIds('career_ids', $shortcode)) {
            return null;
        }

        $careers = Career::query()
            ->whereIn('id', $careerIds)
            ->wherePublished()
            ->get();

        return Theme::partial('shortcodes.career-list.index', compact('shortcode', 'careers'));
    });

    Shortcode::setAdminConfig('career-list', function (array $attributes) {
        $careers = Career::query()
            ->wherePublished()
            ->pluck('name', 'id')
            ->all();

        return Theme::partial('shortcodes.career-list.admin-config', compact('attributes', 'careers'));
    });
});
