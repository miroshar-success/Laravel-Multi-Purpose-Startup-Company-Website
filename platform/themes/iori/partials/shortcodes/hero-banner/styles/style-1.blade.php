@php
    $title = preg_replace('/\{\{(.*)\}\}/', '<span class="line-under"><span>${1}</span></span>', $shortcode->title ?: '');
@endphp

<div class="container">
    <div class="banner-1">
        <div class="row align-items-center">
            <div class="col-lg-7">
                @if ($title)
                    <h1 class="color-brand-1 mb-20 text-anim">{!! BaseHelper::clean($title) !!}</h1>
                @endif

                @if ($subtitle = $shortcode->subtitle)
                    <div class="row">
                        <div class="col-lg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                            <p class="font-md color-grey-500 mb-30">
                               {!! BaseHelper::clean($subtitle) !!}
                            </p>
                        </div>
                    </div>
                @endif
                <div class="box-button mt-30 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                    @if ($shortcode->button_primary_label && $shortcode->button_primary_url)
                        <a class="btn btn-brand-1 hover-up" href="{{ $shortcode->button_primary_url }}">{!! BaseHelper::clean($shortcode->button_primary_label) !!}</a>
                    @endif

                    @if($shortcode->button_secondary_label && $shortcode->button_secondary_url)
                        <a class="btn btn-default font-sm-bold hover-up" href="{{ $shortcode->button_secondary_url }}">
                            {!! BaseHelper::clean($shortcode->button_secondary_label) !!}
                            <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
            @if ($bannerPrimary = $shortcode->banner_primary )
                <div class="col-lg-5 d-none d-lg-block wow animate__animated animate__fadeIn">
                    <img src="{{ RvMedia::getImageUrl($bannerPrimary) }}" alt="{{ __('Banner Image') }}" />
                </div>
            @endif
        </div>
    </div>
</div>
