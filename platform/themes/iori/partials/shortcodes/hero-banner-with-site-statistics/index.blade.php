<section class="section banner-10">
    <div class="box-banner-home10">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-30">
                    @if ($title = $shortcode->title)
                        <h1 class="color-brand-1 mb-50 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                            {!! BaseHelper::clean($title) !!}
                        </h1>
                    @endif

                    @if ($description = $shortcode->description)
                        <p class="font-md color-grey-500 mb-40 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                            {!! BaseHelper::clean($description) !!}
                        </p>
                    @endif
                    <div class="box-button mb-50 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                        @if ($shortcode->button_primary_url && $shortcode->button_primary_label)
                            <a class="btn btn-brand-1 hover-up" href="{{ $shortcode->button_primary_url }}">{{ $shortcode->button_primary_label }}</a>
                        @endif

                        @if ($shortcode->button_secondary_url && $shortcode->button_secondary_label)
                            <a class="btn btn-default font-sm-bold hover-up" href="{{ $shortcode->button_secondary_url }}">{{ $shortcode->button_secondary_label }}
                                <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        @endif
                    </div>
                    <div class="box-count-number">
                        <div class="row">
                            @foreach($tabs as $tab)
                                <div class="col-lg-3 col-md-3 col-sm-6 col-6 text-start mb-20">
                                    <h3 class="color-brand-1"><span class="count">{{ $tab['data'] }}</span><span>{{ $tab['unit'] }}</span></h3>
                                    <p class="font-lg color-brand-1">{{ $tab['title'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-30">
                    @if($image = $shortcode->banner_image)
                        <div class="text-center wow animate__animated animate__fadeIn">
                            <img src="{{ RvMedia::getImageUrl($image) }}" alt="{{ __('Banner image') }}">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
