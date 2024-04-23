<section class="section mt-50">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-8 col-md-8">
                @if ($title = $shortcode->title)
                    <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">{!! BaseHelper::clean($title) !!}</h2>
                @endif

                @if ($subtitle = $shortcode->subtitle)
                    <p class="font-lg color-gray-500 wow animate__animated animate__fadeInUp" data-wow-delay=".02s">
                        {!! BaseHelper::clean($subtitle) !!}
                    </p>
                @endif
            </div>

            @if ($shortcode->button_secondary_label && $shortcode->button_secondary_action)
                <div class="col-lg-4 col-md-4 text-md-end text-start">
                    <a href="{{ $shortcode->button_secondary_action }}" title="{{ $shortcode->button_secondary_label }}" class="btn btn-default font-sm-bold pl-0 wow animate__animated animate__fadeInUp" data-wow-delay=".04s">
                        {{ $shortcode->button_secondary_label }}
                        <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            @endif
        </div>
        <div class="row mt-50">
            @foreach($tabs as $tab)
                <div class="col-lg-4 col-md-6 col-sm-6 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <div class="card-offer hover-up">
                        @if ($tab['image'])
                            <div class="card-image">
                                <img src="{{ RvMedia::getImageUrl($tab['image']) }}" alt="{{ $tab['title'] }}" />
                            </div>
                        @endif
                        <div class="card-info">
                            @if ($tab['title'])
                                <h4 class="color-brand-1 mb-15">{{ $tab['title'] }}</h4>
                            @endif

                            @if ($tab['description'])
                                <p class="font-md color-grey-500 mb-15">
                                    {{ $tab['description'] }}
                                </p>
                            @endif

                            @if($tab['label'] && $tab['action'])
                                <div class="box-button-offer">
                                    <a class="btn btn-default font-sm-bold ps-0 color-brand-1" href="{{ $tab['action'] }}">
                                        {{ $tab['label'] }}
                                        <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
