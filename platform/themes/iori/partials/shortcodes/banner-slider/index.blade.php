<section class="section banner-11">
    <div class="box-banner-home11">
        <div class="box-swiper">
            <div class="swiper-container swiper-group-1">
                <div class="swiper-wrapper">
                    @foreach($tabs as $tab)
                        <div class="swiper-slide">
                            <div class="banner-slide-11" @if($tab['image']) style="background-image:url('{{ RvMedia::getImageUrl($tab['image']) }}')" @endif>
                                @if ($tab['title'] || $tab['description'])
                                    <div class="banner-abs">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 col-12">
                                                    <div class="box-info-banner11">
                                                        @if ($tab['title'])
                                                            <h2 class="color-brand-1 mb-30 wow animate__animated animate__fadeInUp">
                                                                {{ $tab['title'] }}
                                                            </h2>
                                                        @endif

                                                        @if ($tab['description'])
                                                            <p class="color-grey-500 font-sm wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                                                                {{ $tab['description'] }}
                                                            </p>
                                                        @endif

                                                        @if(($shortcode->google_play_url && $shortcode->google_play_logo) || ($shortcode->apple_store_url && $shortcode->apple_store_logo))
                                                            <div class="mt-30 d-flex wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                                                                @if ($shortcode->google_play_url && $shortcode->google_play_logo)
                                                                    <a class="w-50 mr-10" href="{{ $shortcode->google_play_url }}"><img src="{{ RvMedia::getImageUrl($shortcode->google_play_logo) }}" alt="{{ __('Google play') }}"></a>
                                                                @endif

                                                                @if ($shortcode->apple_store_url && $shortcode->apple_store_logo)
                                                                    <a class="w-50" href="{{ $shortcode->apple_store_url }}"><img src="{{ RvMedia::getImageUrl($shortcode->apple_store_logo) }}" alt="{{ __('Apple store') }}"></a>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="swiper-pagination swiper-pagination-group-11"></div>
    </div>
</section>
