<section class="section banner-2">
    <div class="container">
        <div class="banner-1">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    @if ($title = $shortcode->title)
                        <h1 class="color-brand-1 mb-20 text-anim">{!!BaseHelper::clean($title) !!}</h1>
                    @endif

                    @if ($subtitle = $shortcode->subtitle)
                        <div class="row">
                            <div class="col-lg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                                <p class="font-md color-grey-500">{!! BaseHelper::clean($subtitle) !!}</p>
                            </div>
                        </div>
                    @endif

                    <div class="mt-30 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <h5 class="color-brand-1">{{ __('Available on') }}</h5>
                    </div>
                    <div class="box-button mt-20 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                        @if ($logoAppleStore = $shortcode->platform_apple_store_logo)
                            <a class="btn-app mb-15 hover-up" href="{{ $shortcode->platform_apple_store_url ?: 'https://www.apple.com/store' }}">
                                <img src="{{ RvMedia::getImageUrl($logoAppleStore) }}" alt="{{ __('AppStore') }}" />
                            </a>
                        @endif

                        @if ($logoGooglePlay = $shortcode->platform_google_play_logo)
                            <a class="btn-app mb-15 hover-up" href="{{ $shortcode->platform_google_play_url ?: 'https://play.google.com/store/games' }}"><img src="{{ RvMedia::getImageUrl($logoGooglePlay) }}" alt="{{ __('Google play') }}" /></a>
                        @endif

                        @if ($shortcode->button_secondary_label || $shortcode->button_secondary_url)
                            <a class="btn btn-default mb-15 pl-10 font-sm-bold hover-up" href="#">
                                {!! BaseHelper::clean($shortcode->button_secondary_label ?: __('Learn More')) !!}
                                <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
                @if ($bannerPrimary= $shortcode->banner_primary)
                    <div class="col-lg-5 d-none d-lg-block wow animate__animated animate__fadeIn"><img src="{{ RvMedia::getImageUrl($bannerPrimary) }}" alt="{{ __('Banner') }}" /></div>
                @endif
            </div>
        </div>
    </div>
</section>
