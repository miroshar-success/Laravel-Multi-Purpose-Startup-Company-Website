<div class="bg-white shadow z-1 start-0 position-absolute search-results-wrapper">
    <div class="panel__content">
        <div class="p-3">
            @foreach($products as $product)
                <div class="mb-3 row">
                    <div class="col-3 col-xl-2">
                        <a href="{{ $product->url }}">
                            {{ RvMedia::image($product->image, $product->name, 'medium', attributes: ['class' => 'rounded w-100']) }}
                        </a>
                    </div>
                    <div class="col-9 col-xl-10">
                        <div class="px-1 text-start">
                            <a href="{{ $product->url }}" class="d-block fw-semibold">{!! BaseHelper::clean($product->name) !!}</a>
                            @if (EcommerceHelper::isReviewEnabled())
                                <div class="mt-10 mb-10 rating d-flex">
                                    <a href="{{ $product->url }}#review-tab">
                                        <div class="product-rate d-inline-block me-2">
                                            <div class="product-rating" style="width: {{ $product->reviews_avg * 20 }}%;"></div>
                                        </div>
                                    </a>
                                    <span class="text-semibold">
                                        <span>({{ number_format($product->reviews_count) }})</span>
                                    </span>
                                </div>
                            @endif
                            <div class="product-price">
                                <span>{{ format_price($product->front_sale_price_with_taxes) }}</span>
                                @if ($product->isOnSale())
                                    <span class="oldprice">{{ format_price($product->price_with_taxes) }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
