<section class="section mt-120">
    <div class="container">
        <div class="box-radius-32-style-2">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="title-line line-48 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h1 class="color-brand-1 mb-20 mt-10 wow animate__animated animate__fadeIn" data-wow-delay=".2s">{!! BaseHelper::clean($title) !!}</h1>
                    @endif
                    <div class="row wow animate__animated animate__fadeIn" data-wow-delay=".4s">

                    @if ($description = $shortcode->description)
                        <div class="col-lg-10">
                            <p class="font-md color-grey-500">{!! BaseHelper::clean($description) !!}</p>
                        </div>
                    @endif

                    </div>
                    <div class="mt-30">
                        @if($subtitlePlatform = $shortcode->subtitle_platform)
                            <h5 class="color-brand-1 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{{ $subtitlePlatform }}</h5>
                        @endif
                    </div>
                    <div class="box-button mt-20 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                        @if ($shortcode->google_play_logo && $shortcode->google_play_url)
                            <a class="btn-app mb-15 hover-up" href="{{ $shortcode->google_play_url }}">
                                <img src="{{ RvMedia::getImageUrl($shortcode->google_play_logo) }}" alt="{{ __('Google play') }}">
                            </a>
                        @endif

                        @if ($shortcode->apple_store_logo && $shortcode->apple_store_url)
                            <a class="btn-app mb-15 hover-up" href="{{ $shortcode->apple_store_url }}">
                                <img src="{{ RvMedia::getImageUrl($shortcode->apple_store_logo) }}" alt="{{ __('Apple store') }}">
                            </a>
                        @endif

                        @if ($shortcode->button_url && $shortcode->button_label)
                            <a class="btn btn-default mb-15 pl-10 font-sm-bold hover-up" href="{{ $shortcode->button_url }}">{{ $shortcode->button_label }}
                                <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        @endif

                    </div>
                </div>
                <div class="col-lg-5 text-start position-relative wow animate__animated animate__fadeIn">
                    <span class="arrow-down-banner shape-1"></span>
                    <span class="arrow-right-banner shape-2"></span>
                    @if ($shortcode->show_newsletter_form)
                        <div class="box-signup">
                            <h4 class="color-brand-1 mb-30">{{ __('Subscribe our newsletter') }}</h4>
                            <form action="{{ route('public.newsletter.subscribe') }}" class="newsletter-form">
                                <div class="form-group mb-25">
                                    <label class="font-sm color-grey-900 mb-10">{{ __('Your email') }} *</label>
                                    <input class="form-control" type="email" name="email" placeholder="{{ __('Enter your email...') }}">
                                </div>
                                <div class="form-group mb-15">
                                    <button class="btn btn-brand-1-full" type="submit">{{ __('Subscribe') }}</button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
