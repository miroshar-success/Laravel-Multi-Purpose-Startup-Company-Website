<section class="section banner-12">
    <div class="asset-1 shape-1"></div>
    <div class="asset-2 shape-2"></div>
    <div class="asset-3 shape-3"></div>
    <div class="asset-4 shape-1"></div>
    <div class="asset-5 shape-2"></div>
    <div class="container text-center">
        <div class="row mt-150">
            <div class="col-xl-8 col-lg-10 m-auto">
                @if ($subtitle = $shortcode->subtitle)
                    <span class="font-md color-grey-400 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($subtitle) !!}</span>
                @endif

                @if ($title = $shortcode->title)
                    <h1 class="color-brand-1 mb-25 mt-10 wow animate__animated animate__fadeIn" data-wow-delay=".2s">{!! BaseHelper::clean($title) !!}</h1>
                @endif

                @if ($description = $shortcode->description)
                    <p class="font-md color-grey-500 mb-25 wow animate__animated animate__fadeIn" data-wow-delay=".4s">{!! BaseHelper::clean($description) !!}</p>
                @endif

                <div class="wow animate__animated animate__fadeIn" data-wow-delay=".6s">
                    @if ($shortcode->platform_google_play_logo && $shortcode->platform_google_play_url)
                        <a href="{{ $shortcode->platform_google_play_url }}"><img class="ms-2" src="{{ RvMedia::getImageUrl($shortcode->platform_google_play_logo) }}" alt="{{ __('Google play') }}"></a>
                    @endif

                    @if ($shortcode->platform_apple_store_logo && $shortcode->platform_apple_store_url)
                        <a href="{{ $shortcode->platform_apple_store_url }}"><img src="{{ RvMedia::getImageUrl($shortcode->platform_apple_store_logo)  }}" alt="{{ __('Apple store') }}"></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@if ($imageSlider = $shortcode->banner_primary)
    <section class="members">
        <div class="image-slideshow">
            <div class="mover-1" style="background-image: url({{ RvMedia::getImageUrl($imageSlider) }})"></div>
            <div class="mover-2"></div>
        </div>
    </section>
@endif

