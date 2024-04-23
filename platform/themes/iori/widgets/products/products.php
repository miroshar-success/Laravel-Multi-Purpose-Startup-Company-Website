<?php

use Botble\Ecommerce\Facades\EcommerceHelper;
use Botble\Widget\AbstractWidget;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class ProductsWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Product items'),
            'description' => __('Widget display product items'),
            'number_of_display' => 6,
        ]);
    }

    protected function data(): array | Collection
    {
        if (! is_plugin_active('ecommerce')) {
            return [];
        }

        $numberOfDisplays = (int) Arr::get($this->getConfig(), 'number_of_displays') ?: 6;

        $params = [
            'take' => $numberOfDisplays,
            'with' => ['slugable', 'productCollections'],
        ] + EcommerceHelper::withReviewsParams();

        $products = match (Arr::get($this->getConfig(), 'type')) {
            'on_sale' => get_products_on_sale($params),
            'featured' => get_featured_products($params),
            default => get_trending_products($params),
        };

        return compact('products');
    }
}
