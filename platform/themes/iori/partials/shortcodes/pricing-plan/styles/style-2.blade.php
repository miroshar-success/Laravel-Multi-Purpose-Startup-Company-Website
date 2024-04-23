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
            @foreach($packages as $package)
                <div @class(['wow animate__animated animate__fadeIn col-lg-6 col-md-6', 'col-xl-4' => $packages->count() === 3, 'col-xl-3' => $packages->count() === 4]) data-wow-delay=".0s">
                    <div class="card-plan-style-2 hover-up">
                        <div class="card-plan">
                            <div class="card-image-plan">
                                @if($icon = $package->getMetaData('icon', true))
                                    <div class="icon-plan">
                                        <img src="{{ RvMedia::getImageUrl($icon) }}" alt="{{ $package->name}}" />
                                    </div>
                                @endif
                                <div class="info-plan">
                                    @if($name = $package->name)
                                        <h4 class="color-brand-1">{{ $name }}</h4>
                                    @endif

                                    @if($description = $package->description)
                                        <p class="font-md color-grey-400">{!! BaseHelper::clean($description) !!}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="box-day-trial box-price">
                                @if($package->price)
                                    <div class="month_price">
                                        <span class="font-lg-bold color-brand-1 text-price-enterprise">{{ $package->price }}</span>
                                        <span class="font-md color-grey-500 text-type-enterprise">-{{ $package->duration->label() }}</span><br />
                                    </div>
                                @endif

                                @if($package->annual_price)
                                    <div class="year_price" style="display: none">
                                        <span class="font-lg-bold color-brand-1 text-price-enterprise">{{ $package->annual_price }}</span>
                                        <span class="font-md color-grey-500 text-type-enterprise">-{{ __('Yearly') }}</span><br />
                                    </div>
                                @endif
                            </div>
                            <div class="mt-20">
                                <a class="btn btn-brand-1-full hover-up" href="{{ $package->url }}">
                                    {{ __('View Detail') }}
                                    <svg class="w-6 h-6 icon-16 ml-10" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="mt-30 mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <ul class="list-ticks list-ticks-2">
                                @foreach($package->feature_list as $feature)
                                    <li @class(['mutted' => ! $feature['is_available']])>
                                        @if($feature['is_available'])
                                            <svg class="icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        @else
                                            <svg class="icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        @endif
                                        {{ $feature['value'] }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
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

