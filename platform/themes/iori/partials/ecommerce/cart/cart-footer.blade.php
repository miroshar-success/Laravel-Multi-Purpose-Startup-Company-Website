@if (Cart::instance('cart')->count() > 0 && Cart::instance('cart')->products()->count() > 0)
    <div>
        @if (EcommerceHelper::isTaxEnabled())
            <div class="row mb-15">
                <div class="col-6"><strong>{{ __('Sub Total:') }}</strong></div>
                <div class="col-6 text-end">{{ format_price(Cart::instance('cart')->rawSubTotal()) }}</div>
            </div>
            <div class="row mb-15">
                <div class="col-6"><strong>{{ __('Tax:') }}</strong></div>
                <div class="col-6 text-end">{{ format_price(Cart::instance('cart')->rawTax()) }}</div>
            </div>
        @else
            <div class="row mb-15">
                <div class="col-6"><strong>{{ __('Sub Total:') }}</strong></div>
                <div class="col-6 text-end">{{ format_price(Cart::instance('cart')->rawSubTotal()) }}</div>
            </div>
        @endif
        <div class="row mb-15">
            <div class="col-6"><strong>{{ __('Total') }}</strong></div>
            <div class="col-6 text-end">{{ format_price(Cart::instance('cart')->rawSubTotal() + Cart::instance('cart')->rawTax()) }}</div>
        </div>
    </div>
    <div class="cart-action">
        <a class="btn btn-brand-1 hover-up" href="{{ route('public.cart') }}">{{ __('View Cart') }}</a>
        <a class="btn btn-brand-1 hover-up" href="{{ route('public.checkout.information', OrderHelper::getOrderSessionToken()) }}">{{ __('Checkout') }}</a>
    </div>
@endif
