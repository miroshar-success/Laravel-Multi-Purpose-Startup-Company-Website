<?php

use Botble\Blog\Models\Category;
use Botble\Shortcode\Compilers\Shortcode as ShortcodeCompiler;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Theme\Facades\Theme;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

app()->booted(function () {
    if (! is_plugin_active('blog')) {
        return;
    }

    Shortcode::register('from-our-blog', __('From our blog'), __('From our blog'), function (ShortcodeCompiler $shortcode) {
        if (! $shortcode->type) {
            return null;
        }

        $numberOfDisplays = (int) $shortcode->limit ?: 5;

        $posts = match ($shortcode->type) {
            'featured' => get_featured_posts($numberOfDisplays),
            'recent' => get_recent_posts($numberOfDisplays),
            default => get_latest_posts($numberOfDisplays),
        };

        return Theme::partial('shortcodes.from-our-blog.index', compact('shortcode', 'posts'));
    });

    Shortcode::setAdminConfig('from-our-blog', function (array $attributes) {
        return Theme::partial('shortcodes.from-our-blog.admin-config', compact('attributes'));
    });

    Shortcode::register('featured-post', __('Feature post'), __('Feature post'), function (ShortcodeCompiler $shortcode) {
        Theme::asset()->container('footer')->usePath()->add('featured-post-js', 'js/featured-post.js');
        if (! $categoryIds = Shortcode::fields()->getIds('category_ids', $shortcode)) {
            return null;
        }

        $categories = Category::query()
            ->whereIn('id', $categoryIds)
            ->wherePublished()
            ->orderBy('order')
            ->orderByDesc('created_at')
            ->get();

        return Theme::partial('shortcodes.featured-post.index', compact('shortcode', 'categories'));
    });

    Shortcode::setAdminConfig('featured-post', function (array $attributes) {
        $categories = Category::query()
            ->wherePublished()
            ->orderBy('order')
            ->orderByDesc('created_at')
            ->pluck('name', 'id')
            ->all();

        return Theme::partial('shortcodes.featured-post.admin-config', compact('attributes', 'categories'));
    });

    Shortcode::register('post-category', __('Post category'), __('Post category'), function (ShortcodeCompiler $shortcode) {
        if (empty($categoryId = $shortcode->category_id)) {
            return null;
        }

        $category = Category::query()
            ->where('id', $categoryId)
            ->wherePublished()
            ->with(['posts' => fn (BelongsToMany $query) => $query->orderByDesc('created_at')->limit((int) $shortcode->limit ?: 3)])
            ->first();

        if (! $category) {
            return null;
        }

        return Theme::partial('shortcodes.post-category.index', compact('shortcode', 'category'));
    });

    Shortcode::setAdminConfig('post-category', function (array $attributes) {
        $categories = Category::query()
            ->wherePublished()
            ->orderBy('order')
            ->orderByDesc('created_at')
            ->get();

        return Theme::partial('shortcodes.post-category.admin-config', compact('attributes', 'categories'));
    });
});
