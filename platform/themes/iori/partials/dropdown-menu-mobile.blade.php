<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
            @if ($logo = theme_option('logo'))
                <div class="mobile-logo">
                    <a class="d-flex" href="{{ route('public.index') }}">
                        <img src="{{ RvMedia::getImageUrl($logo) }}" alt="logo" >
                    </a>
                </div>
            @endif
            <div class="burger-icon burger-icon-white">
                <span class="burger-icon-top"></span>
                <span class="burger-icon-mid"></span>
                <span class="burger-icon-bottom"></span>
            </div>
            <div class="perfect-scroll">
                <div class="mobile-menu-wrap mobile-header-border w-full">
                    <ul class="nav nav-tabs nav-tabs-mobile mt-25" role="tablist">
                        <li>
                            <a class="active" href="#tab-menu" data-bs-toggle="tab" role="tab" aria-controls="tab-menu" aria-selected="true">
                                <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>{{ __('Menu') }}
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tab-menu" role="tabpanel" aria-labelledby="tab-menu">
                            <nav class="mt-15">
                                <ul class="mobile-menu font-heading">
                                    {!!
                                       Menu::renderMenuLocation('main-menu', [
                                           'view' => 'main-menu',
                                       ])
                                   !!}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    @if(is_plugin_active('language'))
                        {!! Theme::partial('language-switcher') !!}
                    @endif

                    @if(is_plugin_active('ecommerce') && $currencies = get_all_currencies())
                        @if (count($currencies) > 1)
                            <ul class="nav nav-tabs nav-tabs-mobile mt-25" role="tablist">
                                <li>
                                    <a class="active" href="#tab-menu" data-bs-toggle="tab" role="tab" aria-controls="tab-menu" aria-selected="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ __('Currencies') }}
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="tab-menu" role="tabpanel" aria-labelledby="tab-menu">
                                    <nav class="mt-15">
                                        <ul class="mobile-menu font-heading">
                                            @foreach ($currencies as $currency)
                                                @if ($currency->id !== get_application_currency_id())
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('public.change-currency', $currency->title) }}">{{ $currency->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
