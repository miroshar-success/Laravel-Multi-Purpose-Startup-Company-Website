<?php

use Botble\Ecommerce\Models\ProductCategory;
use Botble\Widget\AbstractWidget;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class FeaturedProductCategoryWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Featured product category'),
            'description' => __('Add a featured product category to your widget area.'),
            'menu_id' => null,
            'title' => null,
            'subtitle' => null,
            'image_primary' => null,
            'image_secondary' => null,
            'category_ids' => null,
        ]);
    }

    protected function adminConfig(): array
    {
        if (! is_plugin_active('ecommerce')) {
            return [];
        }

        $categories = ProductCategory::query()
            ->wherePublished()
            ->orderByDesc('created_at')
            ->orderBy('order')
            ->get();

        $categoryIds = Arr::get($this->getConfig(), 'category_ids', []) ?: [];

        return compact('categories', 'categoryIds');
    }

    protected function data(): array|Collection
    {
        if (! empty($categoryIds = Arr::get($this->getConfig(), 'category_ids', []))) {
            $categories = ProductCategory::query()
                ->whereIn('id', $categoryIds)
                ->wherePublished()
                ->orderByDesc('created_at')
                ->orderBy('order')
                ->get();
        } else {
            $categories = collect();
        }

        return compact('categories');
    }
}
