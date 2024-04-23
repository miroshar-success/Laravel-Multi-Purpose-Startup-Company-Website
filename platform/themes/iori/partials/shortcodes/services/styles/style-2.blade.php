<section class="section mt-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                @if ($title = $shortcode->title)
                    <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">{!! BaseHelper::clean($title) !!}</h2>
                @endif

                @if ($subtitle = $shortcode->subtitle)
                    <p class="font-lg color-gray-500 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        {!! $subtitle !!}
                    </p>
                @endif
            </div>
        </div>
        @if($services->isNotEmpty())
            <div class="row mt-50">
                @foreach($services as $service)
                    <div class="col-lg-6 wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->even ? 0 : 2 }}s">
                        <div class="card-offer card-we-do hover-up">
                            @if ($service->category && ($logo = $service->category->getMetadata('icon', true)))
                                <div class="card-image">
                                    <img src="{{ RvMedia::getImageUrl($logo) }}" alt="{{ $service->name }}" />
                                </div>
                            @endif
                            <div class="card-info">
                                <h4 class="color-brand-1 mb-10">
                                    <a class="color-brand-1" href="{{ $service->url }}">
                                        {{ $service->name }}
                                    </a>
                                </h4>

                                @if ($description = $service->description)
                                    <p class="font-md color-grey-500 mb-5">
                                        {!! BaseHelper::clean($description) !!}
                                    </p>
                                @endif

                                <div class="box-button-offer">
                                    <a href="{{ $service->url }}" class="btn btn-default font-sm-bold ps-0 color-brand-1">{{ __('View Details') }}
                                        <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-40 mb-50 text-center wow animate__animated animate__fadeIn" data-wow-delay=".0s">
            @if ($shortcode->button_primary_url && $shortcode->button_primary_label)
                <a class="btn btn-brand-1 hover-up" href="{{ $shortcode->button_primary_label }}">{{ $shortcode->button_primary_label }}</a>
            @endif

            @if($shortcode->button_secondary_url && $shortcode->button_secondary_label)
                <a class="btn btn-default font-sm-bold hover-up" href="{{ $shortcode->button_secondary_url }}">{{ $shortcode->button_secondary_label }}
                    <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            @endif
        </div>
    </div>
</section>
