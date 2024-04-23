<section class="section pt-40 pb-40">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 text-center">
                @if ($title = $shortcode->title)
                    <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($title) !!}</h2>
                @endif

                @if ($subtitle = $shortcode->subtitle)
                    <p class="font-lg color-gray-500 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                        {!! BaseHelper::clean($subtitle) !!}
                    </p>
                @endif

                <ul class="tabs-plan change-price-plan" role="tablist">
                    <li class="wow animate__animated animate__fadeIn" data-wow-delay=".0s"><a class="active" href="#" data-type="monthly">{{ __('Monthly') }}</a></li>
                    <li class="wow animate__animated animate__fadeIn" data-wow-delay=".1s"><a href="#" data-type="yearly">{{ __('Yearly') }}</a></li>
                </ul>
            </div>
        </div>
        <div class="row mt-50 price-plan">
            @foreach($tabs as $tab)
                <div class="col-xl-4 col-lg-6 col-md-6 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                    <div class="card-plan card-plan-2 hover-up">
                        @if ($tab['active'])
                            <label class="popular">{{ __('Popular') }}</label>
                        @endif
                        <div class="card-image-plan">
                            @if ($tab['icon_image'])
                                <div class="icon-plan">
                                    <img src="{{ RvMedia::getImageUrl($tab['icon_image']) }}" alt="{{ $tab['title'] }}" />
                                </div>
                            @endif

                            <div class="info-plan">
                                @if ($tab['title'])
                                    <h4 class="color-brand-1">{{ $tab['title'] }}</h4>
                                @endif

                                @if ($tab['subtitle'])
                                    <p class="font-md color-grey-400">{{ $tab['subtitle'] }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="box-day-trial box-trial-two box-price">
                            <div class="trial-col-1">
                                @if($tab['month_price'])
                                    <div class="month_price">
                                        <span class="font-lg-bold color-brand-1 text-price-enterprise">{{ $tab['month_price'] }}</span>
                                        <span class="font-md color-grey-500 text-type-enterprise">-{{ __('user / month') }}</span><br />
                                    </div>
                                @endif

                                @if($tab['year_price'])
                                    <div class="year_price" style="display: none">
                                        <span class="font-lg-bold color-brand-1 text-price-enterprise">{{ $tab['year_price'] }}</span>
                                        <span class="font-md color-grey-500 text-type-enterprise">-{{ __('user / year') }}</span><br />
                                    </div>
                                @endif

                                @if ($tab['payment_cycle'])
                                    <span class="font-xs color-grey-500 mt-2 mb-2 d-inline-block">{!! BaseHelper::clean($tab['payment_cycle']) !!}</span>
                                @endif
                            </div>

                            @if ($tab['button_label'] && $tab['button_url'])
                                <div class="trial-col-2">
                                    <a class="btn btn-brand-1-full hover-up" href="{{ $tab['button_url'] }}">
                                        {{ $tab['button_label'] }}
                                        <svg class="w-6 h-6 icon-16 ml-10" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="mt-30 mb-30">
                            <ul class="list-ticks list-ticks-2">
                                @foreach($tab['checked'] as $item)
                                    <li>
                                        <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        {{ $item }}
                                    </li>
                                @endforeach

                                @foreach($tab['uncheck'] as $item)
                                    <li class="mutted">
                                        <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        {{ $item }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        @if ($tab['button_label'] && $tab['button_url'])
                            <div class="mt-20">
                                <a class="btn btn-default font-sm-bold" href="{{ $tab['button_url'] }}">
                                    {{ $tab['button_label'] }}
                                    <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="box-button text-center mt-20 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
            @if ($shortcode->button_primary_url && $shortcode->button_primary_label)
                <a class="btn btn-brand-1 hover-up" href="{{ $shortcode->button_primary_url }}">{{ $shortcode->button_primary_label }}</a>
            @endif

            @if ($shortcode->button_secondary_url && $shortcode->button_secondary_label)
                <a class="btn btn-default font-sm-bold hover-up" href="{{ $shortcode->button_secondary_url }}">
                    {{ $shortcode->button_secondary_label }}
                    <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            @endif
        </div>
    </div>
</section>
