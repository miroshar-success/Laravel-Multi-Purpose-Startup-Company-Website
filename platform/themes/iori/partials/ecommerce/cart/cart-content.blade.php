@if (Cart::instance('cart')->count() > 0 && Cart::instance('cart')->products()->count() > 0)
    @php
        $products = Cart::instance('cart')->products();
    @endphp
    @if (count($products))
        @forelse (Cart::instance('cart')->content() as $key => $cartItem)
            @php
                $product = $products->find($cartItem->id);
            @endphp
            @continue(! $product)
            <div class="row cart-item mb-20">
                <div class="col-4 product-image">
                    <a href="{{ $product->original_product->url }}">
                        <img src="{{ RvMedia::getImageUrl($product->image) }}"/>
                    </a>
                </div>
                <div class="col-7 product-info">
                    <a href="{{ $product->original_product->url }}" class="product-name">{{ $product->name }}</a>
                    <p class="product-price">{{ format_price($cartItem->price) }}
                        @if ($product->front_sale_price != $product->price)
                            <small class="text-secondary text-sm">
                                <del>{{ format_price($product->price) }}</del>
                            </small>
                        @endif
                        (x{{ $cartItem->qty }})
                    </p>
                    @if(! empty($cartItem->options['attributes']))
                        <p class="product-attributes">
                            <small>
                                <small>{{ $cartItem->options['attributes'] }}</small>
                            </small>
                        </p>
                    @endif

                    @if (EcommerceHelper::isEnabledProductOptions() && !empty($cartItem->options['options']))
                        {!! render_product_options_html($cartItem->options['options'], $product->original_price) !!}
                    @endif

                    @include('plugins/ecommerce::themes.includes.cart-item-options-extras', [
                        'options' => $cartItem->options,
                    ])
                </div>
                <div class="col-1">
                    <a href="{{ route('public.cart.remove', $cartItem->rowId) }}" class="remove-cart-item-sidebar">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 16px; width: 16px;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75L14.25 12m0 0l2.25 2.25M14.25 12l2.25-2.25M14.25 12L12 14.25m-2.58 4.92l-6.375-6.375a1.125 1.125 0 010-1.59L9.42 4.83c.211-.211.498-.33.796-.33H19.5a2.25 2.25 0 012.25 2.25v10.5a2.25 2.25 0 01-2.25 2.25h-9.284c-.298 0-.585-.119-.796-.33z" />
                        </svg>
                    </a>
                </div>
            </div>
        @empty
            <div class="cart_no_items py-3 px-3">
                <span class="cart-empty-message">{{ __('No products in the cart.') }}</span>
            </div>
        @endforelse
    @endif
@else
    <div class="cart_no_items text-center">
        <span class="cart-empty-message">{{ __('No products in the cart.') }}</span>
    </div>
@endif
