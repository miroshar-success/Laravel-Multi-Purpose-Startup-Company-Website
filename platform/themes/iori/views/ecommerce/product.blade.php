<div>
    {!! Theme::partial('breadcrumb') !!}
    <section class="section mt-50">
        <div class="container product-details">
            <div class="row">
                <div class="col-lg-6 text-center mb-30">
                    @if ($productImages)
                        <div class="detail-gallery">
                            <div class="product-image-slider">
                                @foreach ($productImages as $image)
                                    <figure class="border-radius-10">
                                        <img
                                            src="{{ RvMedia::getImageUrl($image) }}"
                                            alt="{{ __('Product image') }}"
                                        >
                                    </figure>
                                @endforeach
                            </div>
                        </div>

                        <div class="slider-nav-thumbnails">
                            @foreach ($productImages as $image)
                                <div>
                                    <div class="item-thumb"><img
                                            src="{{ RvMedia::getImageUrl($image) }}"
                                            alt="{{ __('Product image') }}"
                                        ></div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-lg-6 mb-30">
                    <h1
                        class="h3 font-bold-800 color-gray-800 mb-20 wow animate__animated animate__fadeIn"
                        data-wow-delay=".0s"
                    >
                        {{ $product->name }}
                    </h1>

                    @if (EcommerceHelper::isReviewEnabled())
                        <a
                            class="anchor-link"
                            href="#review-tab"
                        >
                            <div class="d-flex mb-3">
                                <div class="product-rate d-inline-block me-2">
                                    <div
                                        class="product-rating"
                                        style="width: {{ $product->reviews_avg * 20 }}%;"
                                    ></div>
                                </div>
                                <span class="text-semibold">
                                    <span>({{ number_format($product->reviews_count) }})</span>
                                </span>
                            </div>
                        </a>
                    @endif

                    <div class="d-flex align-items-center mb-30 box-price-banner box-price">
                        @if ($product->front_sale_price === $product->price)
                            <h3 class="color-success mr-30 price">
                                {{ format_price($product->front_sale_price_with_taxes) }}</h3>
                        @else
                            <h3 class="color-success mr-30 price">
                                {{ format_price($product->front_sale_price_with_taxes) }}</h3>
                            <h4 class="color-grey-400 mr-30 price-line price-old">
                                {{ format_price($product->price_with_taxes) }}</h4>
                        @endif

                        @if ($stockStatusLabel = $product->stockStatusLabel)
                            <p class="font-md color-grey-400">({{ $stockStatusLabel }})</p>
                        @endif
                    </div>
                    <div class="mb-50 product-description">
                        <div class="product-description-text">
                            {!! BaseHelper::clean(Str::limit($product->description, 320)) !!}
                        </div>

                        @if (strlen($product->description) > 340)
                            <div
                                class="product-description-full"
                                style="display: none"
                            >
                                {!! BaseHelper::clean($product->description) !!}
                            </div>
                            <a
                                class="btn-view"
                                data-view="full"
                                href="#"
                            >{{ __('View more') }}</a>
                        @endif
                    </div>
                    <form
                        class="cart-form"
                        action="{{ route('public.cart.add-to-cart') }}"
                        method="POST"
                    >
                    <div class="mb-50">
                        @if ($product->variations()->count() > 0)
                            <div class="pr_switch_wrap">
                                {!! render_product_swatches($product, [
                                    'selected' => $selectedAttrs,
                                    'view' => Theme::getThemeNamespace('views.ecommerce.attributes.swatches-renderer'),
                                ]) !!}
                            </div>
                            <div
                                class="number-items-available"
                                style="display: none; margin-bottom: 10px;"
                            ></div>
                        @endif

                        {!! render_product_options($product) !!}

                        {!! apply_filters(ECOMMERCE_PRODUCT_DETAIL_EXTRA_HTML, null, $product) !!}
                    </div>
                    <div class="box-quantity">
                        <div class="form-quantity mr-10">
                            <input
                                class="input-quantity"
                                type="text"
                                value="1"
                                min="1"
                            >
                            <span
                                class="button-quantity button-up"
                                data-type="increase"
                            ></span>
                            <span
                                class="button-quantity button-down"
                                data-type="decrease"
                            ></span>
                        </div>
                        <div
                            class="d-flex flex-wrap gap-2"
                        >
                            @csrf
                            <input
                                class="hidden-product-id"
                                name="id"
                                type="hidden"
                                value="{{ $product->id }}"
                            />
                            <input
                                name="qty"
                                type="hidden"
                                value="1"
                            >
                            <button
                                type="submit"
                                @class([
                                    'btn btn-brand-1 btn-cart',
                                    'disable' => $product->isOutOfStock(),
                                ])
                            >
                                <i class="fi fi-rr-shopping-cart me-2"></i>
                                {{ __('Add To Cart') }}
                            </button>
                            <button
                                name="checkout"
                                type="submit"
                                value="1"
                                @class([
                                    'btn btn-brand-1 btn-cart',
                                    'disable' => $product->isOutOfStock(),
                                ])
                            >{{ __('Buy Now') }}</button>
                            @if (EcommerceHelper::isWishlistEnabled())
                                <a
                                    class="btn btn-brand-1 add-to-wishlist"
                                    href="{{ route('public.wishlist.add', $product->id) }}"
                                >
                                    <svg
                                        class="w-6 h-6 icon-16"
                                        fill="none"
                                        stroke="currentColor"
                                        viewbox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                                        ></path>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                    </form>

                    <div class="box-categories-link mt-30">
                        <div class="item-cat meta-sku @if (!$product->sku) d-none @endif">
                            <span class="text-body color-gray-900 d-inline-block">{{ __('SKU') }}:&nbsp;</span>
                            <span class="text-body color-gray-500 meta-value d-inline-block">{{ $product->sku }}</span>
                        </div>
                        @if ($product->categories->isNotEmpty())
                            <div class="item-cat d-block">
                                <span
                                    class="text-body color-gray-900 d-inline-block">{{ __('Categories') }}:&nbsp;</span>
                                @foreach ($product->categories as $category)
                                    <a
                                        class="text-body meta-value d-inline-block"
                                        href="{{ $category->url }}"
                                    >{{ $category->name }}</a>@if (!$loop->last), @endif
                                @endforeach
                            </div>
                        @endif
                        @if ($product->tags->isNotEmpty())
                            <div class="item-cat d-block">
                                <span class="text-body color-gray-900 d-inline-block">{{ __('Tags') }}:&nbsp;</span>
                                @foreach ($product->tags as $tag)
                                    <a
                                        class="text-body meta-value d-inline-block"
                                        href="{{ $tag->url }}"
                                    >{{ $tag->name }}</a>@if (!$loop->last), @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom bd-grey-80 mt-50"></div>
    </section>

    <div class="text-center">
        <ul
            class="tabs-plan product-tabs"
            id="product-tabs"
            role="tablist"
        >
            <li
                class="wow animate__animated animate__fadeIn me-2"
                data-wow-delay=".0s"
            >
                <a
                    class="active"
                    id="description-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#description-tab-pane"
                    type="button"
                    role="tab"
                    aria-controls="description-tab-pane"
                    aria-selected="true"
                >
                    {{ __('Description') }}
                </a>
            </li>
            @if (EcommerceHelper::isReviewEnabled())
                <li
                    class="wow animate__animated animate__fadeIn"
                    data-wow-delay=".1s"
                >
                    <a
                        id="review-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#review-tab-pane"
                        type="button"
                        role="tab"
                        aria-controls="review-tab-pane"
                        aria-selected="false"
                    >
                        {{ __('Reviews') }}
                        (<span>{{ $product->reviews_count }}</span>)
                    </a>
                </li>
            @endif
        </ul>
    </div>

    <div
        class="tab-content"
        id="product-tabs-content"
    >
        <div
            class="tab-pane fade show active"
            id="description-tab-pane"
            role="tabpanel"
            aria-labelledby="description-tab"
            tabindex="0"
        >
            <div class="ck-content font-md">
                {!! BaseHelper::clean($product->content) !!}
            </div>
        </div>
        @if (EcommerceHelper::isReviewEnabled())
            <div
                class="tab-pane fade"
                id="review-tab-pane"
                role="tabpanel"
                aria-labelledby="review-tab"
                tabindex="0"
            >
                @include('plugins/ecommerce::themes.includes.reviews')
            </div>
        @endif
    </div>
</div>

@if (($products = get_related_products($product)) && $products->isNotEmpty())
    <section class="section-box mt-40">
        <div class="container">
            <h2 class="text-heading-4 color-gray-900">{{ __('You may also like') }}</h2>
            <p class="text-body color-gray-600 mt-10">{{ __('Take it to your cart') }}</p>
        </div>
        <div class="container mt-50">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-4">
                        {!! Theme::partial('ecommerce.product.item-grid', compact('product')) !!}
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
