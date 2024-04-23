<section>
    <div class="col-xl-12 mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
        <div class="card-radius-32 bg-1">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="box-cover-pd box-cover-pd-3 pt-30 pb-30 mb-30">
                        @if ($subtitle = $shortcode->subtitle)
                            <span class="title-line line-48">{!! BaseHelper::clean($subtitle) !!}</span>
                        @endif

                        @if ($title = $shortcode->title)
                            <h2 class="color-brand-1 mt-10 mb-15">{!! BaseHelper::clean($title) !!}</h2>
                        @endif

                        @if ($description = $shortcode->description)
                            <p class="font-md color-grey-400">{!! BaseHelper::clean($description) !!}</p>
                        @endif
                        <div class="mt-40">
                            <ul class="list-ticks">
                                @foreach ($tabs as $tab)
                                    <li>
                                        <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>{{ $tab['title'] }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="mt-40 text-start">
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
                    </div>
                </div>

                <div class="col-lg-6 text-center position-relative">
                    @if ($image = $shortcode->image)
                        <img src="{{ RvMedia::getImageUrl($image) }}" alt="{{ __('Image') }}">
                    @endif

                    @if ($imageSecondary = $shortcode->logo)
                        <div class="shape-1 box-image-4"><img src="{{ RvMedia::getImageUrl($imageSecondary) }}" alt="{{ __('Image secondary') }}"></div>
                    @endif

                    @if ($shortcode->counter_data && $shortcode->counter_title)
                        <div class="box-number-business shape-3">
                            <div class="cardNumber bg-white">
                                <h3><span class="count">{{ $shortcode->counter_data }}</span><span>{{ $shortcode->counter_unit }}</span></h3>
                                <p class="font-xs color-brand-1">{{ $shortcode->counter_title }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
