<section class="section banner-3">
    <div class="container">
        <div class="banner-1">
            <div class="row align-items-end">
                <div class="col-lg-6 pt-40 pb-50">
                    @if($subtitle = $shortcode->subtitle)
                        <span class="title-line line-48 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                            <span>{!! BaseHelper::clean($subtitle) !!}</span>
                        </span>
                    @endif

                    @if($title = $shortcode->title)
                        <h1 class="color-brand-1 mb-20 mt-15 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                            {!!BaseHelper::clean($title) !!}
                        </h1>
                    @endif
                    <div class="box-button-video wow animate__animated animate__fadeInUp" data-wow-delay=".4s"><a class="btn btn-play font-sm-bold popup-youtube color-brand-1 hover-up" href="https://www.youtube.com/watch?v=sVPYIRF9RCQ">Play Video</a></div>
                    <div class="mt-40 d-flex">
                        @if ($bannerImage2 = $shortcode->banner_image_2)
                            <div class="wow animate__animated animate__zoomIn" data-wow-delay=".0s">
                                <img class="img-banner-1 mr-15" src="{{ RvMedia::getImageUrl($bannerImage2) }}" alt="{{ __('Banner 2') }}">
                            </div>
                        @endif

                        @if ($bannerImage1 = $shortcode->banner_image_1)
                            <div class="wow animate__animated animate__zoomIn" data-wow-delay=".2s">
                                <img class="img-banner-2" src="{{ RvMedia::getImageUrl($bannerImage1) }}" alt="{{ __('Banner 3') }}">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block position-relative">
                    @if($bannerImage = $shortcode->banner_primary)
                        <div class="box-image-main wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                            <img class="image-banner-main d-block" src="{{ RvMedia::getImageUrl($bannerImage) }}" alt="{{ __('Banner') }}">
                        </div>
                    @endif

                    @if ($bannerImage3 = $shortcode->banner_image_3)
                        <div class="box-chart">
                            <img class="image-chart shape-1" src="{{ RvMedia::getImageUrl($bannerImage3) }}" alt="{{ __('Banner Image') }}">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
