<section class="section banner-6">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-xl-6 d-none d-xl-block">
                <div class="box-banner-6">
                    <div class="img-testimonials-1 shape-1">
                        @if ($testimonial = $tabs[0]['image'])
                            <img src="{{ RvMedia::getImageUrl($testimonial) }}" alt="{{ __('Testimonial') }}">
                        @endif
                    </div>
                    <div class="img-testimonials-2 shape-2">
                        @if ($testimonial1 = $tabs[1]['image'])
                            <img src="{{ RvMedia::getImageUrl($testimonial1) }}" alt="{{ __('Testimonial') }}">
                        @endif
                    </div>
                    @if ($bannerPrimary = $shortcode->banner_primary)
                        <img class="img-main" src="{{ RvMedia::getImageUrl($bannerPrimary) }}" alt="{{ __('Banner') }}">
                    @endif
                </div>
            </div>
            <div class="col-xl-6">
                <div class="box-banner-right-home6">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="title-line line-48 wow animate__animated animate__fadeIn" data-wow-delay=".s">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h1 class="color-brand-1 mb-20 mt-5 wow animate__animated animate__fadeIn" data-wow-delay=".1s">{!! BaseHelper::clean($title) !!}</h1>
                    @endif

                    <div class="row">
                        @if ($description = $shortcode->description)
                            <div class="col-lg-10">
                                <p class="font-md color-grey-500 mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                                    {!! BaseHelper::clean($description) !!}
                                </p>
                            </div>
                        @endif
                    </div>
                    <div class="mt-30">
                        <h5 class="color-brand-1 wow animate__animated animate__fadeIn" data-wow-delay=".3s">{{ __('Available on') }}</h5>
                    </div>
                    <div class="box-button mt-20 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                        @if ($shortcode->platform_apple_store_logo && $shortcode->platform_apple_store_url)
                            <a class="btn-app mb-15 hover-up" href="{{ $shortcode->platform_apple_store_url }}"><img src="{{ RvMedia::getImageUrl($shortcode->platform_apple_store_logo) }}" alt="{{ 'Apple store' }}"></a>
                        @endif

                        @if ($shortcode->platform_google_play_logo && $shortcode->platform_google_play_url)
                            <a class="btn-app mb-15 hover-up" href="{{ $shortcode->platform_google_play_url }}"><img src="{{ RvMedia::getImageUrl($shortcode->platform_google_play_logo) }}" alt="{{ __('Google play') }}"></a>
                        @endif

                        @if($shortcode->button_secondary_label && $shortcode->button_secondary_url)
                            <a class="btn btn-default mb-15 pl-10 font-sm-bold hover-up" href="{{ $shortcode->button_secondary_url }}">{{ $shortcode->button_secondary_label }}
                                <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
