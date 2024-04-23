<div class="cart-main">
    <div class="cart-sidebar">
        <div class="cart-header d-flex align-items-center">
            <p>{{ __('Your Cart') }}</p>
            <a
                class="ms-auto cursor-pointer btn-close-cart"
                href="#"
                style="font-size: 30px"
            >
                &times
            </a>
        </div>
        <div class="cart-content">
            {!! Theme::partial('ecommerce.cart.cart-content') !!}
        </div>
        <div @class([
            'cart-footer',
            'bg-white' =>
                Cart::instance('cart')->count() > 0 &&
                Cart::instance('cart')->products()->count() > 0,
        ])>
            {!! Theme::partial('ecommerce.cart.cart-footer') !!}
        </div>
    </div>

    <div
        class="backdrop"
        style="display: none"
    ></div>
</div>
