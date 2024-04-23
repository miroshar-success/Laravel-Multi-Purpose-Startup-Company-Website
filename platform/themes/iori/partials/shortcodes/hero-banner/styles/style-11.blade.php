<section class="section banner-service bg-grey-60 position-relative">
    <div class="box-banner-abs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-7 col-lg-12">
                    <div class="box-banner-service">
                        @if($title = $shortcode->title)
                            <h1 class="color-brand-1 mb-2 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($title) !!}</h1>
                        @endif
                        <div class="row">
                            @if ($description = $shortcode->description)
                                <div class="col-lg-9">
                                    <p class="font-md color-grey-500 wow animate__animated animate__fadeIn" data-wow-delay=".2s">{!! BaseHelper::clean($description) !!}</p>
                                </div>
                            @endif
                        </div>
                        <div class="mt-30 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                            @if ($subtitle = $shortcode->subtitle)
                                <h5 class="color-brand-1">{!! BaseHelper::clean($subtitle) !!}</h5>
                            @endif
                        </div>
                        <div class="box-button mt-20">
                            @if ($shortcode->platform_google_play_logo && $shortcode->platform_google_play_url)
                                <a class="btn-app mb-15 hover-up" href="{{ $shortcode->platform_google_play_url }}">
                                    <img src="{{ RvMedia::getImageUrl($shortcode->platform_google_play_logo) }}" alt="{{ __('Google Play') }}">
                                </a>
                            @endif

                            @if ($shortcode->platform_apple_store_url && $shortcode->platform_apple_store_logo)
                                <a class="btn-app mb-15 hover-up" href="{{ $shortcode->platform_apple_store_url }}">
                                    <img src="{{ RvMedia::getImageUrl($shortcode->platform_apple_store_logo) }}" alt="{{ __('Apple Store') }}">
                                </a>
                            @endif

                            @if ($shortcode->button_secondary_label && $shortcode->button_secondary_url)
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
    </div>
    <div class="row m-0">
        <div class="col-xxl-5 col-xl-7 col-lg-6"></div>
        <div class="col-xxl-7 col-xl-5 col-lg-6 pe-0">
            @if ($image = $shortcode->banner_primary)
                <div class="d-none d-xxl-block pl-70">
                    <div class="img-reveal"><img class="w-100 d-block" src="{{ RvMedia::getImageUrl($image) }}" alt="{{ __('Banner image') }}"></div>
                </div>
            @endif
        </div>
    </div>
</section>

