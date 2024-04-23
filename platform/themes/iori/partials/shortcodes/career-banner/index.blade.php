<section class="section mt-90">
    <div class="container">
        <div class="text-center">
            @if ($subtitle = $shortcode->subtitle)
                <h6 class="color-grey-500 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($subtitle) !!}</h6>
            @endif

            @if ($title = $shortcode->title)
                <h2 class="color-brand-1 wow animate__animated animate__fadeIn" data-wow-delay=".2s">{!! BaseHelper::clean($title) !!}</h2>
            @endif
        </div>
        <div class="box-video mt-70">
            @if ($image = $shortcode->image)
                {{ RvMedia::image($image, $shortcode->title) }}
            @endif

            @if ($logo = $shortcode->logo)
                <div class="image-1 shape-1">
                    <img src="{{ RvMedia::getImageUrl($logo) }}" alt="{{ __('Shape logo') }}">
                </div>
            @endif
        </div>
    </div>
</section>
