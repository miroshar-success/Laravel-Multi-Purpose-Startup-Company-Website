<?php

use Botble\Shortcode\Compilers\Shortcode as ShortcodeCompiler;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Team\Models\Team;
use Botble\Theme\Facades\Theme;

app()->booted(function () {
    if (! is_plugin_active('team')) {
        return;
    }

    Shortcode::register('teams', __('Teams'), __('Teams'), function (ShortcodeCompiler $shortcode) {
        if (! $teamIds = Shortcode::fields()->getIds('team_ids', $shortcode)) {
            return null;
        }

        $teams = Team::query()
            ->whereIn('id', $teamIds)
            ->wherePublished()
            ->orderByDesc('created_at')
            ->limit((int) $shortcode->limit ?: 4)
            ->get();

        return Theme::partial('shortcodes.teams.index', compact('shortcode', 'teams'));
    });

    Shortcode::setAdminConfig('teams', function (array $attributes) {
        $teams = Team::query()
            ->wherePublished()
            ->orderByDesc('created_at')
            ->pluck('name', 'id')
            ->all();

        return Theme::partial('shortcodes.teams.admin-config', compact('attributes', 'teams'));
    });

    Shortcode::register(
        'board-members',
        __('Board members'),
        __('Board members'),
        function (ShortcodeCompiler $shortcode) {
            if (! $teamIds = Shortcode::fields()->getIds('team_ids', $shortcode)) {
                return null;
            }

            $teams = Team::query()
                ->whereIn('id', $teamIds)
                ->wherePublished()
                ->orderByDesc('created_at')
                ->limit((int) $shortcode->limit ?: 8)
                ->get();

            return Theme::partial('shortcodes.board-members.index', compact('shortcode', 'teams'));
        }
    );

    Shortcode::setAdminConfig('board-members', function (array $attributes) {
        $teams = Team::query()
            ->wherePublished()
            ->orderByDesc('created_at')
            ->pluck('name', 'id')
            ->all();

        return Theme::partial('shortcodes.board-members.admin-config', compact('attributes', 'teams'));
    });

    Shortcode::register(
        'banner-hero-with-teams',
        __('Banner hero with teams'),
        __('Banner hero with teams'),
        function (ShortcodeCompiler $shortcode) {
            if (! $teamIds = Shortcode::fields()->getIds('team_ids', $shortcode)) {
                return null;
            }

            $teams = Team::query()
                ->whereIn('id', $teamIds)
                ->wherePublished()
                ->orderByDesc('created_at')
                ->limit((int) $shortcode->limit ?: 5)
                ->get();

            $style = in_array($shortcode->style, ['style-1', 'style-2']) ? $shortcode->style : 'style-1';

            return Theme::partial("shortcodes.banner-hero-with-teams.styles.$style", compact('shortcode', 'teams'));
        }
    );

    Shortcode::setAdminConfig('banner-hero-with-teams', function (array $attributes) {
        $teams = Team::query()
            ->wherePublished()
            ->orderByDesc('created_at')
            ->pluck('name', 'id')
            ->all();

        return Theme::partial('shortcodes.banner-hero-with-teams.admin-config', compact('attributes', 'teams'));
    });

    Shortcode::register(
        'from-community-forums',
        __('From community forums'),
        __('From community forums'),
        function (ShortcodeCompiler $shortcode) {
            $tabs = Shortcode::fields()->getTabsData(
                ['title', 'description', 'image', 'topics', 'comments', 'account'],
                $shortcode
            );

            return Theme::partial('shortcodes.from-community-forums.index', compact('shortcode', 'tabs'));
        }
    );

    Shortcode::setAdminConfig('from-community-forums', function (array $attributes) {
        $teams = Team::query()
            ->wherePublished()
            ->orderByDesc('created_at')
            ->pluck('name', 'id');

        return Theme::partial('shortcodes.from-community-forums.admin-config', compact('attributes', 'teams'));
    });
});
