@if (is_plugin_active('ecommerce') && $products->isNotEmpty())
    <div class="sidebar">
        <div class="widget-title">
            <h3 class="text-heading-5 color-gray-900">{{ BaseHelper::clean(Arr::get($config, 'name')) }}</h3>
        </div>
        <div class="widget-content">
            <ul class="list-products-sidebar">
                @foreach ($products as $product)
                    <li>
                        <div class="product-item-2 product-item-4">
                            <div class="product-image">
                                <a href="{{ $product->url }}">
                                    <img src="{{ RvMedia::getImageUrl($product->image, 'thumb', false, RvMedia::getDefaultImage()) }}" alt="{{ $product->name }}">
                                </a>
                            </div>
                            <div class="product-info">
                                <a href="{{ $product->url }}">
                                    <h3 class="text-heading-7 color-gray-900">{{ $product->name }}</h3>
                                </a>
                                <div class="rating mt-5">
                                    @if (EcommerceHelper::isReviewEnabled())
                                        <div class="box-rating d-flex align-items-center">
                                            <a href="{{ $product->url }}#review-tab">
                                                <div class="product-rate me-2">
                                                    <div class="product-rating" style="width: {{ $product->reviews_avg * 20 }}%;"></div>
                                                </div>
                                            </a>
                                            <span class="text-semibold">
                                                <span>({{ number_format($product->reviews_count) }})</span>
                                            </span>
                                        </div>
                                    @endif
                                    <div class="d-flex mt-5">
                                        <div class="box-prices">
                                            @if ($product->front_sale_price === $product->price)
                                                <span class="price-regular mr-5">{{ format_price($product->front_sale_price_with_taxes) }}</span>
                                            @else
                                                <span class="price-regular mr-5">{{ format_price($product->front_sale_price_with_taxes) }}</span>
                                                <span class="price-regular price-line">{{ format_price($product->price_with_taxes) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
