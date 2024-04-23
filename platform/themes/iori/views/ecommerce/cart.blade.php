@php
    Theme::layout('full-width');
@endphp

<section class="cart">
    {!! Theme::partial('page-header') !!}
    <div class="container">
        <div class="cart-page-content">
            <div class="loading d-none"></div>
            <div class="col-12">
                <form
                    class="form--shopping-cart cart-form"
                    method="post"
                    action="{{ route('public.cart.update') }}"
                >
                    @csrf
                    @if (count($products) > 0)
                        <table
                            class="table cart-form__contents table-bordered table-striped"
                            cellspacing="0"
                        >
                            <thead>
                                <tr>
                                    <th
                                        class="product-thumbnail"
                                        width="100"
                                    ></th>
                                    <th class="product-name">{{ __('Product') }}</th>
                                    <th class="product-price product-md d-md-table-cell d-none">{{ __('Price') }}</th>
                                    <th class="product-quantity product-md d-md-table-cell d-none">{{ __('Quantity') }}
                                    </th>
                                    <th class="product-subtotal product-md d-md-table-cell d-none">{{ __('Total') }}
                                    </th>
                                    <th class="product-remove"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::instance('cart')->content() as $key => $cartItem)
                                    @php
                                        $product = $products->find($cartItem->id);
                                    @endphp

                                    @if (!empty($product))
                                        <tr class="cart-form__cart-item cart_item">
                                            <td class="product-thumbnail">
                                                <input
                                                    name="items[{{ $key }}][rowId]"
                                                    type="hidden"
                                                    value="{{ $cartItem->rowId }}"
                                                >
                                                <a href="{{ $product->original_product->url }}">
                                                    <img
                                                        class="img-thumbnail"
                                                        src="{{ RvMedia::getImageUrl($cartItem->options['image'], 'thumb', false, RvMedia::getDefaultImage()) }}"
                                                        alt="{{ $product->original_product->name }}"
                                                    >
                                                </a>
                                            </td>
                                            <td
                                                class="product-name d-md-table-cell d-block"
                                                data-title="{{ __('Product') }}"
                                            >
                                                <a
                                                    href="{{ $product->original_product->url }}">{{ $product->original_product->name }}</a>
                                                @if (is_plugin_active('marketplace') && $product->original_product->store->id)
                                                    <div class="variation-group">
                                                        <span class="text-secondary">{{ __('Vendor') }}: </span>
                                                        <span class="text-primary ms-1">
                                                            <a
                                                                href="{{ $product->original_product->store->url }}">{{ $product->original_product->store->name }}</a>
                                                        </span>
                                                    </div>
                                                @endif
                                                <p class="mb-0">
                                                    <small>{{ $cartItem->options['attributes'] ?? '' }}</small>
                                                </p>

                                                @if (!empty($cartItem->options['options']))
                                                    {!! render_product_options_info($cartItem->options['options'], $product, true) !!}
                                                @endif

                                                @if (!empty($cartItem->options['extras']) && is_array($cartItem->options['extras']))
                                                    @foreach ($cartItem->options['extras'] as $option)
                                                        @if (!empty($option['key']) && !empty($option['value']))
                                                            <p class="mb-0">
                                                                <small>{{ $option['key'] }}: <strong>
                                                                        {{ $option['value'] }}</strong></small>
                                                            </p>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td
                                                class="product-price product-md d-md-table-cell d-block"
                                                data-title="Price"
                                            >
                                                <div class="box-price">
                                                    <span class="d-md-none title-price">{{ __('Price') }}: </span>
                                                    {!! Theme::partial('ecommerce.product-price', compact('product')) !!}
                                                </div>
                                            </td>
                                            <td
                                                class="product-quantity product-md d-md-table-cell d-block"
                                                data-title="{{ __('Quantity') }}"
                                            >
                                                <div class="product-button detail-extralink">
                                                    {!! Theme::partial(
                                                        'ecommerce.product-quantity',
                                                        compact('product') + [
                                                            'name' => 'items[' . $key . '][values][qty]',
                                                            'value' => $cartItem->qty,
                                                        ],
                                                    ) !!}
                                                </div>
                                            </td>
                                            <td
                                                class="product-subtotal product-md d-md-table-cell d-block"
                                                data-title="{{ __('Total') }}"
                                            >
                                                <div class="box-price">
                                                    <span class="d-md-none title-price">{{ __('Total') }}: </span>
                                                    <span class="fw-bold amount">
                                                        <span
                                                            class="price-current">{{ format_price($cartItem->price * $cartItem->qty) }}</span>
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="product-remove">
                                                <a
                                                    class="fs-4 remove remove-cart-item"
                                                    href="{{ route('public.cart.remove', $cartItem->rowId) }}"
                                                    aria-label="{{ __('Remove this item') }}"
                                                >
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="1.5"
                                                        stroke="currentColor"
                                                        width="24px"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                                        />
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center">{{ __('Your cart is empty!') }}</p>
                    @endif
                    @if (count($products) > 0)
                        <div class="actions my-4 pb-4 border-bottom">
                            <div class="actions__button-wrapper row justify-content-between">
                                <div class="col-md-9">
                                    <div class="actions__left d-grid d-md-block">
                                        <a
                                            class="btn btn-secondary"
                                            href="{{ route('public.products') }}"
                                        >
                                            <i class="fi fi-rr-arrow-left me-1"></i>
                                            <span>{{ __('Continue Shopping') }}</span>
                                        </a>
                                        <a
                                            class="btn btn-secondary"
                                            href="{{ route('public.index') }}"
                                        >
                                            <i class="fi fi-rr-home me-1"></i>
                                            <span>{{ __('Back to Home') }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-4 col-md-5 col-coupon form-coupon-wrapper py-2">
                                <div class="coupon">
                                    <label for="coupon_code">
                                        <h4>{{ __('Using A Promo Code?') }}</h4>
                                    </label>
                                    <div class="coupon-input input-group my-3">
                                        <input
                                            class="form-control coupon-code"
                                            name="coupon_code"
                                            type="text"
                                            value="{{ old('coupon_code') }}"
                                            placeholder="{{ __('Enter coupon code...') }}"
                                        >
                                        <button
                                            class="btn btn-primary lh-1 btn-apply-coupon-code"
                                            data-url="{{ route('public.coupon.apply') }}"
                                            type="button"
                                        >{{ __('Apply') }}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-2"></div>
                            <div class="col-lg-4 col-md-5">
                                <div class="cart_totals bg-light p-4 rounded">
                                    <h5 class="mb-3">{{ __('Cart totals') }}</h5>
                                    <div class="cart_totals-table">
                                        <div
                                            class="cart-subtotal d-flex justify-content-between border-bottom pb-3 mb-3">
                                            <span class="title fw-bold">{{ __('Subtotal') }}:</span>
                                            <span class="amount fw-bold">
                                                <span
                                                    class="price-current">{{ format_price(Cart::instance('cart')->rawSubTotal()) }}</span>
                                            </span>
                                        </div>
                                        @if (EcommerceHelper::isTaxEnabled())
                                            <div
                                                class="cart-subtotal d-flex justify-content-between border-bottom pb-3 mb-3">
                                                <span class="title fw-bold">{{ __('Tax') }}:</span>
                                                <span class="amount fw-bold">
                                                    <span
                                                        class="price-current">{{ format_price(Cart::instance('cart')->rawTax()) }}</span>
                                                </span>
                                            </div>
                                        @endif
                                        @if ($couponDiscountAmount > 0 && session('applied_coupon_code'))
                                            <div
                                                class="cart-subtotal d-flex justify-content-between border-bottom pb-3 mb-3">
                                                <span class="title">
                                                    <span
                                                        class="fw-bold">{{ __('Coupon code: :code', ['code' => session('applied_coupon_code')]) }}</span>
                                                    (<small>
                                                        <a
                                                            class="btn-remove-coupon-code text-danger"
                                                            data-url="{{ route('public.coupon.remove') }}"
                                                            data-processing-text="{{ __('Removing...') }}"
                                                            href="#"
                                                        >{{ __('Remove') }}</a>
                                                    </small>)
                                                </span>

                                                <span
                                                    class="amount fw-bold">{{ format_price($couponDiscountAmount) }}</span>
                                            </div>
                                        @endif
                                        @if ($promotionDiscountAmount)
                                            <div class="ps-block__header">
                                                <p>{{ __('Discount promotion') }} <span>
                                                        {{ format_price($promotionDiscountAmount) }}</span></p>
                                            </div>
                                        @endif
                                        <div class="order-total d-flex justify-content-between pb-3 mb-3">
                                            <span class="title">
                                                <h6 class="mb-0">{{ __('Total') }}</h6>
                                                <small>{{ __('(Shipping fees not included)') }}</small>
                                            </span>
                                            <span class="amount fw-bold fs-6 text-green">
                                                <span
                                                    class="price-current">{{ $promotionDiscountAmount + $couponDiscountAmount > Cart::instance('cart')->rawTotal() ? format_price(0) : format_price(Cart::instance('cart')->rawTotal() - $promotionDiscountAmount - $couponDiscountAmount) }}</span>
                                            </span>
                                        </div>
                                    </div>
                                    @if (session('tracked_start_checkout'))
                                        <div class="proceed-to-checkout">
                                            <div class="d-grid gap-2">
                                                <a
                                                    class="checkout-button btn btn-primary"
                                                    href="{{ route('public.checkout.information', session('tracked_start_checkout')) }}"
                                                >{{ __('Proceed to checkout') }}</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </form>

                @if ($crossSellProducts->isNotEmpty())
                    <div class="row align-items-center mb-2 widget-header">
                        <h4 class="col-auto mb-0 py-2">{{ __('Customers who bought this item also bought') }}</h4>
                    </div>

                    @php
                        $crossSellProducts->loadMissing(['productLabels']);
                        if (is_plugin_active('marketplace')) {
                            $crossSellProducts->loadMissing(['store', 'store.slugable']);
                        }
                    @endphp
                    <div class="row mt-40 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2">
                        @foreach ($crossSellProducts as $crossSellProduct)
                            <div class="col">
                                {!! Theme::partial('ecommerce.product.item', ['product' => $crossSellProduct]) !!}
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </div>
</section>
