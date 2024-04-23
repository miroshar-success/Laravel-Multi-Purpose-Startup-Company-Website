<div class="card-product">
    <div class="box-quick-view">
        <div class="quick-view">
            @if (EcommerceHelper::isWishlistEnabled())
                <a class="like-product product-wishlist-button add-to-wishlist" href="{{ route('public.wishlist.add', $product->id) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                </a>
            @endif
            @if (EcommerceHelper::isCompareEnabled())
                <a class="shuffle-product product-compare-button add-to-compare" href="{{ route('public.compare.add', $product->id) }}"
                   title="{{ __('Compare') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                </a>
            @endif
            <a class="view-product product-quick-view-button" href="{{ route('public.ajax.quick-view', ['product_id' => $product->id]) }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </a>
        </div>
    </div>
    <div class="card-image"><a href="{{ $product->url }}"><img src="{{ RvMedia::getImageUrl($product->image, 'small', false, RvMedia::getDefaultImage()) }}" alt="{{ $product->name }}"></a></div>
    <div class="card-info"><a href="{{ $product->url }}">
        <div class="mb-1">
            @if (($category = $product->categories->first()) && $category->id)
                <a class="text-body-small color-gray-500 fw-bold" href="{{ $category->url }}">{!! BaseHelper::clean($category->name) !!}</a>
            @else
                <span class="text-body-small color-gray-500 fw-bold">&nbsp;</span>
            @endif
        </div>
        <h6 class="color-grey-900 mb-10 text-truncate" title="{{ $product->name }}">{{ $product->name }}</h6></a>
        <div class="d-flex align-items-center mb-20">
            @if (EcommerceHelper::isReviewEnabled())
                <div class="rating d-flex align-items-center">
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
        </div>
        <div class="d-flex align-items-center">
            <div class="price">
                <span class="text-price">
                    @if ($product->front_sale_price === $product->price)
                        <span class="price-regular mr-5">{{ format_price($product->front_sale_price_with_taxes) }}</span>
                    @else
                        <span class="price-regular mr-5">{{ format_price($product->front_sale_price_with_taxes) }}</span>
                        <span class="price-regular price-line">{{ format_price($product->price_with_taxes) }}</span>
                    @endif
                </span>
            </div>
            <a class="add-to-cart" data-id="{{ $product->id }}" href="{{ route('public.cart.add-to-cart') }}">
                <i class="fi fi-rr-shopping-cart me-1"></i>
                {{ __('Add') }}
            </a>
        </div>
    </div>
</div>
