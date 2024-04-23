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
                        <svg class="icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                @endif
            </div>
        </div>
        <div class="row mt-50">
            @foreach($packages as $package)
                <div @class(['wow animate__animated animate__fadeIn col-lg-6 col-md-6', 'col-xl-4' => $packages->count() === 3, 'col-xl-3' => $packages->count() === 4]) data-wow-delay=".0s">
                    <div class="card-plan card-plan-2 hover-up">
                        @if ($package->is_popular)
                            <label class="popular">{{ __('Popular') }}</label>
                        @endif
                        <div class="card-image-plan">
                            @if ($icon = $package->getMetaData('icon', true))
                                <div class="icon-plan">
                                    <img src="{{ RvMedia::getImageUrl($icon) }}" alt="{{ $package->name }}" />
                                </div>
                            @endif

                            <div class="info-plan">
                                @if ($package->name)
                                    <h4 class="color-brand-1">{{ $package->name }}</h4>
                                @endif

                                @if ($package->description)
                                    <p class="font-md color-grey-400">{{ $package->description }}</p>
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

                        <div class="mt-30 mb-30">
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

                        <div class="mt-20">
                            <a class="btn btn-brand-1-full hover-up" href="{{ $package->url }}">
                                {{ __('View Detail') }}
                                <svg class="w-6 h-6 icon-16 ml-10" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
