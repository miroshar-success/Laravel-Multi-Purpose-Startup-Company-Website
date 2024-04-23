<section class="section bg-grey-80 bg-plan pt-40 pb-40">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-8 col-md-8">
                @if ($title = $shortcode->title)
                    <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeInUp" data-wow-delay=".s">
                        {!! BaseHelper::clean($title) !!}
                    </h2>
                @endif

                @if ($subtitle = $shortcode->subtitle)
                    <p class="font-lg color-gray-500 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        {!! BaseHelper::clean($subtitle) !!}
                    </p>
                @endif
            </div>
            <div class="col-lg-4 col-md-4 text-md-end text-start wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                @if($shortcode->button_secondary_label && $shortcode->button_secondary_url)
                    <a class="btn btn-default font-sm-bold pl-0" href="{{ $shortcode->button_secondary_url }}">
                        {!! BaseHelper::clean($shortcode->button_secondary_label) !!}
                        <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                @endif
            </div>
        </div>
        <div class="row mt-50">
            @foreach($tabs as $tab)
                <div class="col-xl-3 col-lg-6 col-md-6 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                    <div class="card-plan hover-up">
                        <div class="card-image-plan">
                            @if($iconImage = $tab['icon_image'])
                                <div class="icon-plan bg-1">
                                    <img src="{{ RvMedia::getImageUrl($iconImage) }}" alt="{{ $tab['title'] }}" />
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
                        <div class="box-day-trial">
                            @if ($tab['month_price'])
                                <span class="font-lg-bold color-brand-1">{{ $tab['month_price'] }}</span>
                                <span class="font-md color-grey-500">- {{ __('user / month') }}<br /></span>
                            @endif

                            @if ($tab['payment_cycle'])
                                <span class="font-xs color-grey-500">{!! BaseHelper::clean($tab['payment_cycle']) !!}</span>
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
                                <a class="btn btn-brand-1-full hover-up" href="{{ $tab['button_url'] }}">
                                    {{ $tab['button_label'] }}
                                    <svg class="w-6 h-6 icon-16 ml-10" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
