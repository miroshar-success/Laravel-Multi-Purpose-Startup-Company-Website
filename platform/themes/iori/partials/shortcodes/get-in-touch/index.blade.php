<section class="section pt-50 pb-40">
    <div class="container">
        <div class="box-cover-border">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    @if ($image = $shortcode->image)
                        <div class="img-reveal">
                            <img class="d-block" src="{{ RvMedia::getImageUrl($image) }}" alt="{{ __('Banner Image') }}" />
                        </div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <div class="box-info-video">
                        @if ($subtitle = $shortcode->subtitle)
                            <span class="btn btn-tag wow animate__animated animate__fadeInUp" data-wow-delay=".0s">{!!BaseHelper::clean($subtitle) !!}</span>
                        @endif

                        @if ($title = $shortcode->title)
                            <h2 class="color-brand-1 mt-15 mb-20 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                {!! BaseHelper::clean($title) !!}
                            </h2>
                        @endif

                        @if ($description = $shortcode->description)
                            <p class="font-md color-grey-500 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                                {!! BaseHelper::clean($description) !!}
                            </p>
                        @endif

                        <div class="box-button text-start mt-65 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                            @if ($shortcode->button_primary_url && $shortcode->button_primary_label)
                                <a class="btn btn-brand-1 hover-up" href="{{ $shortcode->button_primary_url }}">{{ $shortcode->button_primary_label }}</a>
                            @endif

                            @if ($shortcode->button_secondary_url && $shortcode->button_secondary_label)
                                <a class="btn btn-default font-sm-bold hover-up" href="{{ $shortcode->button_secondary_url }}">
                                    {!! BaseHelper::clean($shortcode->button_secondary_label) !!}
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
</section>

