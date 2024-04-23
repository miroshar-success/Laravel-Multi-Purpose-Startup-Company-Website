<?php

use Botble\Ecommerce\Facades\EcommerceHelper;
use Botble\Ecommerce\Models\ProductCategory;
use Botble\Ecommerce\Repositories\Interfaces\ProductInterface;
use Botble\Shortcode\Compilers\Shortcode as ShortcodeCompiler;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Theme\Facades\Theme;

app()->booted(function () {
    if (! is_plugin_active('ecommerce')) {
        return;
    }

    Shortcode::register('featured-categories', __('Featured Categories'), __('Featured Categories'), function (ShortcodeCompiler $shortcode) {
        if (! $categoryIds = Shortcode::fields()->getIds('category_ids', $shortcode)) {
            return null;
        }

        $categories = ProductCategory::query()
            ->whereIn('id', $categoryIds)
            ->wherePublished()
            ->where('is_featured', true)
            ->orderByDesc('created_at')
            ->orderBy('order')
            ->get();

        $tabs = Shortcode::fields()->getTabsData(['title', 'data', 'unit'], $shortcode);
        $style = in_array($shortcode->style, ['style-1', 'style-2', 'style-3', 'style-4', 'style-5', 'style-6', 'style-7', 'style-8']) ? $shortcode->style : 'style-1';

        return Theme::partial("shortcodes.featured-categories.styles.$style", compact('shortcode', 'categories', 'tabs'));
    });

    Shortcode::setAdminConfig('featured-categories', function (array $attributes) {
        $categories = ProductCategory::query()
            ->wherePublished()
            ->orderByDesc('created_at')
            ->orderBy('order')
            ->pluck('name', 'id')
            ->all();

        return Theme::partial('shortcodes.featured-categories.admin-config', compact('attributes', 'categories'));
    });

    add_shortcode('all-products', __('All Products'), __('All Products'), function (ShortcodeCompiler $shortcode) {
        $categoryIds = Shortcode::fields()->getIds('category_ids', $shortcode);

        $products = app(ProductInterface::class)->filterProducts(
            [
                'categories' => $categoryIds,
            ],
            [
                'condition' => [
                    'ec_products.is_variation' => 0,
                ],
                'order_by' => [
                    'ec_products.order' => 'ASC',
                    'ec_products.created_at' => 'DESC',
                ],
                'take' => null,
                'select' => [
                    'ec_products.*',
                ],
                'with' => ['slugable'],
                'paginate' => [
                    'per_page' => (int) ($shortcode->per_page ?: 12),
                    'current_paged' => (int) request()->input('page') ?: 1,
                ],
            ] + EcommerceHelper::withReviewsParams()
        );

        return Theme::partial('shortcodes.all-products.index', [
            'title' => $shortcode->title,
            'products' => $products,
        ]);
    });

    shortcode()->setAdminConfig('all-products', function (array $attributes) {
        $categories = ProductCategory::query()
            ->wherePublished()
            ->select(['id', 'name', 'parent_id'])
            ->get();

        return Theme::partial('shortcodes.all-products.admin', compact('attributes', 'categories'));
    });
});
