<section class="section banner-4">
    <div class="container"><a class="scrollbar shape-1" href="#"></a>
        <div class="banner-1">
            <div class="row align-items-center">
                <div class="col-lg-7"><span class="title-line line-48 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">{{ __('Get Started') }}</span>
                    @if ($title = $shortcode->title)
                        <h1 class="color-brand-1 mb-20 mt-1 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                            {!! BaseHelper::clean($title) !!}
                        </h1>
                    @endif

                    <div class="row">
                        @if($subtitle = $shortcode->subtitle)
                            <div class="col-lg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                                <p class="font-md color-grey-500">{!! BaseHelper::clean($subtitle) !!}</p>
                            </div>
                        @endif

                    </div>
                    <div class="mt-30 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                        <h5 class="color-brand-1">{{ __('Available on') }}</h5>
                    </div>
                    <div class="box-button mt-20 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        @if ($shortcode->platform_google_play_logo && $shortcode->platform_google_play_url)
                            <a class="btn-app mb-15 hover-up" href="{{ $shortcode->platform_google_play_url }}">
                                <img src="{{ RvMedia::getImageUrl($shortcode->platform_google_play_logo) }}" alt="{{ __('Google Play') }}">
                            </a>
                        @endif

                        @if ($shortcode->platform_apple_store_logo && $shortcode->platform_apple_store_url)
                            <a class="btn-app mb-15 hover-up" href="{{ $shortcode->platform_apple_store_url }}">
                                <img src="{{ RvMedia::getImageUrl($shortcode->platform_apple_store_logo) }}" alt="{{ __('Apple Store') }}">
                            </a>
                        @endif

                        @if ($shortcode->button_secondary_label && $shortcode->button_secondary_url)
                            <a class="btn btn-default mb-15 pl-10 font-sm-bold hover-up" href="{{ $shortcode->button_secondary_url }}">
                                {{ $shortcode->button_secondary_label }}
                                <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        @endif

                    </div>
                </div>
                @if(is_plugin_active('newsletter'))
                    <div class="col-lg-5 text-start position-relative wow animate__animated animate__fadeIn"><span class="arrow-down-banner shape-1"></span><span class="arrow-right-banner shape-2"></span>
                        <div class="box-signup">
                            <h4 class="color-brand-1 mb-30">{{ __('Subscribe our newsletter') }}</h4>
                            <form action="{{ route('public.newsletter.subscribe') }}" class="newsletter-form">
                                <div class="form-group mb-25">
                                    <label class="font-sm color-grey-900 mb-10">{{ __('Your email') }} *</label>
                                    <input class="form-control" type="email" name="email" placeholder="{{ __('Enter your email...') }}">
                                </div>
                                <div class="form-group mb-15">
                                    <button class="btn btn-brand-1-full" type="submit">{{ __('Subscribe') }}</button>
                                </div>
                            </form>

                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
