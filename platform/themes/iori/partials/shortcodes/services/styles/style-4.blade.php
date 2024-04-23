<section class="section mt-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                @if ($title = $shortcode->title)
                    <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($title) !!}</h2>
                @endif

                @if ($subtitle = $shortcode->subtitle)
                    <p class="font-lg color-gray-500 wow animate__animated animate__fadeIn" data-wow-delay=".2s">{!! BaseHelper::clean($subtitle) !!}</p>
                @endif
            </div>
        </div>
        @if ($services->isNotEmpty())
            <div class="mt-50">
                <div class="row">
                    @foreach($services as $service)
                        @if ($loop->odd)
                            <div class="col-lg-4 wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->index * 2 }}s">
                                <div class="card-offer card-offer-2 hover-up">
                                    <div class="card-image">
                                        @if ($service->category && ($logo = $service->category->getMetadata('icon', true)))
                                            <img src="{{ RvMedia::getImageUrl($logo) }}" alt="{{ $service->name }}">
                                        @endif
                                    </div>
                                    <div class="card-info">
                                        @if ($title = $service->name)
                                            <a href="{{ $service->url }}">
                                                <h4 class="color-brand-1 mb-15">{!! BaseHelper::clean($title) !!}</h4>
                                            </a>
                                        @endif

                                        @if ($description = $service->description)
                                            <p class="font-sm color-grey-500 mb-15">{!! BaseHelper::clean($description) !!}</p>
                                        @endif
                                    </div>

                                    @if (($image = $service->images[0]) && count($service->images) > 0)
                                        <div class="card-image-bottom mt-50">
                                            <img class="w-100 bd-rd16" src="{{ RvMedia::getImageUrl($image) }}" alt="{{ $service->name }}">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="col-lg-4 wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->index * 2 }}s">
                                <div class="card-offer card-offer-2 hover-up">
                                    @if ($image = $service->thumbnail)
                                        <div class="card-image-bottom mb-35">
                                            <img class="w-100 bd-rd16" src="{{ RvMedia::getImageUrl($image) }}" alt="{{ $service->name }}">
                                        </div>
                                    @endif

                                    <div class="card-info">
                                        @if ($title = $service->name)
                                            <a href="{{ $service->url }}">
                                                <h4 class="color-brand-1 mb-15">{!! BaseHelper::clean($title) !!}</h4>
                                            </a>
                                        @endif
                                        @if ($description = $service->description)
                                            <p class="font-sm color-grey-500 mb-15">{!! BaseHelper::clean($description) !!}</p>
                                        @endif
                                        <div class="box-button-offer">
                                            <a href="{{ $service->url }}" class="btn btn-default font-sm-bold ps-0 color-grey-900">{{ __('View Detail') }}
                                                <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
