
<section class="section mt-50 mb-30">
    <div class="container">
        <div class="box-container">
            <div class="row mb-0 mt-40 project-revert align-items-center">
                <div class="col-xl-5 col-lg-6 col-md-6 mt-30">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="btn btn-tag">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h2 class="color-brand-1 mt-10 mb-15">{!! BaseHelper::clean($title) !!}</h2>
                    @endif

                    @if ($description = $shortcode->description)
                        <p class="font-md color-grey-400">{!! BaseHelper::clean($description) !!}</p>
                    @endif
                    <div class="mt-50 text-start">
                        @if ($shortcode->button_primary_label && $shortcode->button_primary_url)
                            <a class="btn btn-brand-1 hover-up" href="{{ $shortcode->button_primary_url }}">{{ $shortcode->button_primary_label }}</a>
                        @endif

                        @if ($shortcode->button_secondary_label && $shortcode->button_secondary_url)
                            <a class="btn btn-default font-sm-bold hover-up" href="{{ $shortcode->button_secondary_url }}">{{ $shortcode->button_secondary_label }}
                                <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-6 mt-30">
                    <div class="box-images-cover text-end">
                        <div class="box-images-inner">
                            @if ($image = $shortcode->image)
                                <div class="img-reveal">
                                    <img class="img-project bd-rd16" src="{{ RvMedia::getImageUrl($image) }}" alt="{{ __('Banner image') }}">
                                </div>
                            @endif

                            @if($iconImage = $shortcode->icon_image)
                                <div class="image-7 shape-3"><img src="{{ RvMedia::getImageUrl($iconImage) }}" alt="{{ __('Icon image') }}"></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
