<div class="header-top">
    <div class="header-wrap">
        <div class="container">
            <div class="top-bar">
                <div class="text-white header-top-left">
                    @if($hotline = theme_option('hotline'))
                        <a class="hotline" href="tel:{{ $hotline }}">{{ $hotline }}</a>
                    @endif

                    @if(is_plugin_active('ecommerce') && EcommerceHelper::isOrderTrackingEnabled())
                        <a class="tracking d-none d-md-inline-block" href="{{ route('public.orders.tracking') }}">{{ __('Order Tracking') }}</a>
                    @endif
                </div>
                <div class="text-white header-top-right">
                    @if (count($currencies) > 1)
                        <div class="d-none d-xl-inline-flex currencies-switcher ms-3 align-items-center">
                            <button class="btn btn-sm dropdown-toggle" type="button" id="dropdown-currencies" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ get_application_currency()->title }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdown-currencies">
                                @foreach ($currencies as $currency)
                                    @if ($currency->id !== get_application_currency_id())
                                        <li>
                                            <a class="dropdown-item" href="{{ route('public.change-currency', $currency->title) }}">{{ $currency->title }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (is_plugin_active('ecommerce'))
                        @if (EcommerceHelper::isCartEnabled())
                            <a href="{{ route('public.cart') }}" class="ms-3 cart d-inline-flex align-items-center btn-cart-sidebar">
                                <svg class="me-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="20px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                                <span class="name">{{ __('Cart') }}</span>
                                (<span class="cart-counter">{{ Cart::instance('cart')->count() }}</span>)
                            </a>
                        @endif
                        @if (EcommerceHelper::isCompareEnabled())
                            <a href="{{ route('public.compare') }}" class="ms-3 compare d-inline-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="20px" class="me-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>
                                <span class="name">{{ __('Compare') }}</span>
                                (<span class="compare-counter">{{ Cart::instance('compare')->count() }}</span>)
                            </a>
                        @endif
                        @if (EcommerceHelper::isWishlistEnabled())
                            <a href="{{ route('public.wishlist') }}" class="ms-3 wishlist d-inline-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="20px" class="me-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                                <span class="name">{{ __('Wishlist') }}</span>
                                (<span class="wishlist-counter">{{ Cart::instance('wishlist')->count() }}</span>)
                            </a>
                        @endif
                        @if (auth('customer')->check())
                            <a href="{{ route('customer.overview') }}" style="display: flex; align-items: center">
                                <img src="{{ auth('customer')->user()->avatar_url }}" class="rounded-circle ms-3 text-white" title="{{ auth('customer')->user()->name }}" width="16" alt="{{ auth('customer')->user()->name }}">
                                <span class="customer-name text-white ms-1">{{ auth('customer')->user()->name }}</span>
                            </a>
                        @else
                            <a href="{{ route('customer.login') }}" class="ms-3">
                                <i class="fa fa-sign-in-alt"></i>&nbsp;<span class="text-white">{{ __('Login') }}</span>
                            </a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
