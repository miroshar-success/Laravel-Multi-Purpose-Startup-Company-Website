<section class="section banner-8">
    <div class="asset-1 shape-1"></div>
    <div class="asset-2 shape-2"></div>
    <div class="asset-3 shape-3"></div>
    <div class="asset-4 shape-1"></div>
    <div class="asset-5 shape-2"></div>
    <div class="box-banner-home8">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 m-auto">
                    <div class="text-center">
                        @if ($subtitle = $shortcode->subtitle)
                            <span class="font-md color-grey-400 wow animate__animated animate__fadeInUp" data-wow-delay=".s">{!! BaseHelper::clean($subtitle) !!}</span>
                        @endif

                        @if ($title = $shortcode->title)
                            <h1 class="color-brand-1 mb-25 mt-10 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">{!! BaseHelper::clean($title) !!}</h1>
                        @endif

                        @if ($description = $shortcode->description)
                            <p class="font-md color-grey-500 mb-25 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">{!! BaseHelper::clean($description) !!}</p>
                        @endif

                        <div class="text-center wow animate__animated animate__fadeInUp" data-wow-delay=".6s">
                            @if ($shortcode->google_play_logo && $shortcode->google_play_url)
                                <a href="{{ $shortcode->google_play_url }}"><img class="ms-2" src="{{ RvMedia::getImageUrl($shortcode->google_play_logo) }}" alt="{{ __('GooglePlay') }}"></a>
                            @endif

                            @if ($shortcode->apple_store_logo && $shortcode->apple_store_url)
                                <a href=""><img src="{{ RvMedia::getImageUrl($shortcode->apple_store_logo) }}" alt="{{ __('AppleStore') }}"></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-40 wow animate__animated animate__fadeIn">
            <div class="box-swiper">
                <div class="swiper-container swiper-group-7-center">
                    <div class="swiper-wrapper">
                        @foreach($teams as $team)
                            <div class="swiper-slide">
                                <div class="card-member-2 mb-30">
                                    <div class="card-image"><img src="{{ RvMedia::getImageUrl($team->photo) }}" alt="{{ $team->name }}"></div>
                                    <div class="card-info bg-{{ rand(1, 7) }}"><a class="font-lg-bold color-brand-1" href="#">{{ $team->name }}</a>
                                        <div class="d-flex align-items-center">
                                            <p class="font-xs color-grey-400">{{ $team->title }}</p>
                                            <div class="list-socials mt-0">
                                                @php($socials = $team->socials)

                                                @if ($socials)
                                                    @foreach(['facebook', 'twitter', 'instagram'] as $social)
                                                        @if ($url = Arr::get($socials, $social))
                                                            <a class="icon-socials icon-{{ $social }}" href="{{ $url }}"></a>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="box-button-slider-bottom">
                        <div class="swiper-button-prev swiper-button-prev-group-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                        </div>
                        <div class="swiper-button-next swiper-button-next-group-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
