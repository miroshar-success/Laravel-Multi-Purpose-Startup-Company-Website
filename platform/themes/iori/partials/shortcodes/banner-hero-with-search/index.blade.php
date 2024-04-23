@php
    $tags = explode(',', $shortcode->suggested);
@endphp

<section class="section mt-60">
    <div class="container">
        <div class="row align-items-center">
            <div class="mb-40 col-lg-5">
                @if ($subtitle = $shortcode->subtitle)
                    <span class="title-line line-48 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">{!! BaseHelper::clean($subtitle) !!}</span>
                @endif

                @if ($title = $shortcode->title)
                    <h2 class="color-brand-1 mt-15 mb-30 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">{!! BaseHelper::clean($title) !!}</h2>
                @endif

                @if ($description = $shortcode->description)
                    <p class="font-md color-grey-500 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">{!! BaseHelper::clean($description) !!}</p>
                @endif
                @if (is_plugin_active('blog'))
                    <div class="row mt-15">
                        <div class="col-lg-12">
                            @include(Theme::getThemeNamespace('partials.search-form'), ['formActionUrl' => route('public.search'), 'formAjaxUrl' => route('public.ajax.search')])
                        </div>
                    </div>

                    <div class="mt-45 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                        <p class="font-sm-bold color-brand-1">{{ __('Suggested Search:') }}</p>
                    </div>

                    <div class="mt-10 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                        @foreach($tags as $tag)
                            <a class="mb-10 mr-10 btn btn-tag-circle" href="{{ route('public.search', ['q' => $tag]) }}">{{ $tag }}</a>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="mb-40 col-lg-7 d-none d-md-block">
                <div class="box-banner-help">
                    @if ($image1 = $shortcode->image_1)
                        <div class="banner-img-1"><img src="{{ RvMedia::getImageUrl($image1) }}" alt="{{ __('Banner') }}"></div>
                    @endif

                    @if($image2 = $shortcode->image_2)
                        <div class="banner-img-2"><img src="{{ RvMedia::getImageUrl($image2) }}" alt="{{ __('Banner') }}"></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
