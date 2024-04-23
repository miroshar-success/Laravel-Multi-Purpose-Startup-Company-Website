<section class="section mt-50">
    <div class="container">
        <div class="text-center">
            @if ($title = $shortcode->title)
                <h2 class="color-brand-1 mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($title) !!}</h2>
            @endif

            @if($description = $shortcode->description)
                <p class="color-grey-500 font-md wow animate__animated animate__fadeIn" data-wow-delay=".2s">{!! BaseHelper::clean($description) !!}</p>
            @endif
        </div>
        <div class="row align-items-start mt-50">
            <div class="col-xl-6 col-lg-6 mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                <div class="card-radius-32 bg-2">
                    <div class="card-info text-start">
                        @if ($titleLeft = $shortcode->block_left_title)
                            <h3 class="color-brand-1 mb-20">{{ $titleLeft }}</h3>
                        @endif

                        @if ($descriptionLeft = $shortcode->block_left_description)
                            <p class="font-md color-grey-500 mb-20">{{ $descriptionLeft }}</p>
                        @endif

                        <div class="text-start">
                            @if ($shortcode->google_play_logo && $shortcode->google_play_url)
                                <a href="{{ $shortcode->google_play_url }}">
                                    <img class="ms-2" src="{{ RvMedia::getImageUrl($shortcode->google_play_logo) }}" alt="{{ __('GooglePlay') }}">
                                </a>
                            @endif

                            @if ($shortcode->apple_store_logo && $shortcode->apple_store_url)
                                <a href="{{ $shortcode->apple_store_url }}">
                                    <img src="{{ RvMedia::getImageUrl($shortcode->apple_store_logo) }}" alt="{{ __('AppleStore') }}">
                                </a>
                            @endif
                        </div>
                    </div>

                    @if ($imageLeft = $shortcode->block_left_image)
                        <div class="card-image mb-10">
                            <img src="{{ RvMedia::getImageUrl($imageLeft) }}" alt="{{ __('Image block left') }}">
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                <div class="card-radius-32 bg-11">
                    <div class="card-info text-start">
                        @if ($titleRight = $shortcode->title_right)
                            <h3 class="color-brand-1 mb-20">{{ $titleRight }}</h3>
                        @endif

                        @if ($descriptionRight = $shortcode->description_right)
                            <p class="font-md color-grey-500 mb-20">{{ $descriptionRight }}</p>
                        @endif

                        <div class="mt-0">
                            @if($shortcode->button_url && $shortcode->button_label)
                                <a class="btn btn-brand-1-small" href="{{ $shortcode->button_url }}">{{ $shortcode->button_label }}
                                    <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>

                    @if ($imageRight = $shortcode->block_right_image)
                        <div class="card-image image-automated">
                            <img class="d-block" src="{{ RvMedia::getImageUrl($imageRight) }}" alt="{{ __('Image block right') }}">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
