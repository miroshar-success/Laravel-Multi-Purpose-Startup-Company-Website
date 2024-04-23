@if (theme_option('header_top_enabled'))
    {!! Theme::partial('header-top') !!}
@endif

<header class="header sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo">
                    <a class="d-flex" href="{{ route('public.index') }}">
                        <img alt="{{ theme_option('site_name') }}" src="{{ RvMedia::getImageUrl(theme_option('logo')) }}">
                    </a>
                </div>
                <div class="header-nav">
                    <nav class="nav-main-menu d-none d-xl-block">
                        {!!
                            Menu::renderMenuLocation('main-menu', [
                                'options' => ['class' => 'main-menu'],
                                'view' => 'main-menu',
                            ])
                        !!}
                    </nav>
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>

                <div class="header-right">
                    @if(is_plugin_active('blog') || is_plugin_active('ecommerce'))
                        <div class="me-1 d-inline-block box-search-top">
                            <span class="font-lg icon-list search-post" data-bs-toggle="modal" data-bs-target="#search-autocomplete-modal">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </span>
                        </div>
                    @endif
                    @if(is_plugin_active('language'))
                        <div class="d-none d-xl-inline-block">
                            {!! Theme::partial('language-switcher') !!}
                        </div>
                    @endif
                    @if (theme_option('action_button_text') && theme_option('action_button_url'))
                        <div class="d-none d-sm-inline-block">
                            <a class="btn btn-brand-1 hover-up" href="{{ theme_option('action_button_url') }}">{{ theme_option('action_button_text') }}</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if(is_plugin_active('ecommerce'))
        {!! Theme::partial('ecommerce.cart-sidebar') !!}
    @endif
</header>

<div class="modal fade" id="search-autocomplete-modal" tabindex="-1" aria-labelledby="search-autocomplete-modalLabel" aria-hidden="true">
    <div class="search-autocomplete-modal modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                @include(Theme::getThemeNamespace('partials.search-form'))
            </div>
        </div>
    </div>
</div>
