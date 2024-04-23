<section class="section mt-50">
    <div class="container">
        <div class="row mt-50 align-items-center">
            <div class="col-xl-5 col-lg-12 mb-40">
                @if ($title = $shortcode->title)
                    <h2 class="color-brand-1 mt-10 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($title) !!}</h2>
                @endif

                @if ($description = $shortcode->description)
                    <div class="row">
                        <div class="col-lg-10 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                            <p class="font-md color-grey-500">{!! BaseHelper::clean($description) !!}</p>
                        </div>
                    </div>
                @endif

                <div class="mt-50 text-start wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                    @if ($shortcode->button_primary_url && $shortcode->button_primary_label)
                        <a class="btn btn-brand-1 hover-up" href="{{ $shortcode->button_primary_url }}">{{ $shortcode->button_primary_label }}</a>
                    @endif

                    @if ($shortcode->button_secondary_url && $shortcode->button_secondary_label)
                        <a class="btn btn-default font-sm-bold hover-up" href="{{ $shortcode->button_secondary_url }}">{{ $shortcode->button_secondary_label }}
                            <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
            <div class="col-xl-7 col-lg-12">
                <div class="box-video-business box-images-team">
                    @if ($image1 = $shortcode->image_1)
                        <div class="item-video wow animate__animated animate__fadeIn" data-wow-delay=".0s"><img src="{{ RvMedia::getImageUrl($image1) }}" alt="{{ __('Image') }}"></div>
                    @endif

                    <div class="box-image-right">
                        @if ($image2 = $shortcode->image_2)
                            <div class="wow animate__animated animate__fadeIn" data-wow-delay=".2s"><img class="mb-20" src="{{ RvMedia::getImageUrl($image2) }}" alt="{{ __('Image') }}"></div>
                        @endif

                        @if($image3 = $shortcode->image_3)
                            <div class="wow animate__animated animate__fadeIn" data-wow-delay=".4s"><img src="{{ RvMedia::getImageUrl($image3) }}" alt="{{ __('Image') }}"></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
