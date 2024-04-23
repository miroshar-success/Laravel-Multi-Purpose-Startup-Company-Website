<section class="section banner-contact">
    <div class="container">
        <div class="banner-1">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    @if ($title = $shortcode->title)
                        <span class="title-line line-48 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                            {!! BaseHelper::clean($title) !!}
                        </span>
                    @endif

                    @if ($subtitle = $shortcode->subtitle)
                        <h1 class="color-brand-1 mb-20 mt-10 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                            {!! BaseHelper::clean($subtitle) !!}
                        </h1>
                    @endif

                    @if ($description)
                        <div class="row">
                            <div class="col-lg-9">
                                <p class="font-md color-grey-500 wow animate__animated animate__fadeIn" data-wow-delay=".4s">{!! BaseHelper::clean($description) !!}</p>
                            </div>
                        </div>
                    @endif
                    <div class="mt-30 wow animate__animated animate__fadeIn" data-wow-delay=".6s">
                        <h5 class="color-brand-1">{{ __('Install App') }}</h5>
                    </div>
                    <div class="box-button mt-20">
                        @foreach ($tabs as $key => $tab)
                            <a class="btn-app mb-15 hover-up" href="{{ Arr::get($tab, 'link_to') ?: '/' }}">
                                <img src="{{ RvMedia::getImageUrl(Arr::get($tab, 'image'), null, false, RvMedia::getDefaultImage()) }}" alt="{{ Arr::get($tab, 'title') }}">
                            </a>
                        @endforeach

                        @if ($shortcode->button_url && $shortcode->button_label)
                            <a class="btn btn-default mb-15 pl-10 font-sm-bold hover-up" href="{{ $shortcode->button_url}}">{{ $shortcode->button_label }}
                                <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="box-banner-contact"><img src="{{ RvMedia::getImageUrl($shortcode->banner, null, false, RvMedia::getDefaultImage()) }}" alt="{{ Arr::get($shortcode->title, 'title') }}"></div>
                </div>
            </div>
        </div>
    </div>
</section>
