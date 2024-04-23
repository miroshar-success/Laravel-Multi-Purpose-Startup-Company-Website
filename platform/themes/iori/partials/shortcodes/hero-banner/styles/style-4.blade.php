@php
    $title = preg_replace('/\{\{(.*)\}\}/', '<span class="line-under"><span>${1}</span></span>', $shortcode->title ?: '');
@endphp

<section class="section banner-service bg-grey-60 position-relative overflow-hidden">
    <div class="box-banner-abs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-7 col-lg-12">
                    <div class="box-banner-service">
                        @if ($title)
                            <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">{!! BaseHelper::clean($title) !!}</h2>
                        @endif

                        <div class="row">
                            <div class="col-lg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                                @if($subtitle = $shortcode->subtitle)
                                    <p class="font-lg color-grey-500">{!! BaseHelper::clean($subtitle) !!}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row m-0">
        <div class="col-xxl-6 col-xl-6 col-lg-6"></div>
        <div class="col-xxl-6 col-xl-6 col-lg-6 pe-0">
            <div class="d-none d-xxl-block pl-70">
                @if($banner = $shortcode->banner_primary)
                    <div class="img-reveal"><img class="w-100 d-block" src="{{ RvMedia::getImageUrl($banner) }}" alt="{{ __('Banner') }}"></div>
                @endif
            </div>
        </div>
    </div>
</section>
