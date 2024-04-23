<section class="section mt-50">
    <div class="container">
        <div class="row align-items-center mt-50">
            <div class="col-lg-4 col-md-12 col-sm-12 mb-30">
                @if ($subtitle = $shortcode->subtitle)
                    <span class="title-line line-48 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($subtitle) !!}</span>
                @endif

                @if ($title = $shortcode->title)
                    <h2 class="color-brand-1 mt-10 mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                        {!! BaseHelper::clean($title) !!}
                    </h2>
                @endif

                @if ($description = $shortcode->description)
                    <p class="color-grey-500 font-sm wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                        {!! BaseHelper::clean($description) !!}
                    </p>
                @endif

                <div class="mt-45 wow animate__animated animate__fadeIn" data-wow-delay=".6s">
                    @if ($shortcode->button_primary_url || $shortcode->button_primary_label)
                        <a class="btn btn-brand-1 hover-up" href="{{ $shortcode->button_primary_url }}">{{ $shortcode->button_primary_label ?: __('Download App') }}</a>
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
            @foreach($tabs as $tab)
                @if ($tab['display'] == 'show_full')
                    <div class="col-lg-4 col-md-6 col-sm-6 wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->index + 2 }}s">
                        <div @class(['card-offer-style-2 card-left bg-white', 'bg-grey-60' => $loop->index == 1])>
                            <div class="card-offer hover-up">
                                @if ($tab['icon_image'])
                                    <div class="card-image">
                                        <img src="{{ RvMedia::getImageUrl($tab['icon_image']) }}" alt="{{ $tab['title'] }}" />
                                    </div>
                                @endif

                                <div class="card-info">
                                    @if ($tab['title'])
                                        <h4 class="color-brand-1 mb-15">{{ $tab['title'] }}</h4>
                                    @endif

                                    @if($tab['description'])
                                        <p class="font-md color-grey-500 mb-15">
                                            {{ $tab['description'] }}
                                        </p>
                                    @endif
                                    <div class="box-button-offer">
                                        @if($tab['label'] && $tab['url'])
                                            <a href="{{ $tab['url'] }}" class="btn btn-default font-sm-bold ps-0 color-brand-1">
                                                {{ $tab['label'] }}
                                                <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="row">
            @foreach($tabs as $tab)
                @if ($tab['display'] == 'show_title')
                    <div class="col-lg-2 col-md-4 col-sm-6 col-12 wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->index + 1 }}s">
                        <div class="card-small">
                            <div class="card-image">
                                @if ($tab['icon_image'] && $tab['url'])
                                    <a href="{{ $tab['url'] }}">
                                        <div class="box-image"><img src="{{ RvMedia::getImageUrl($tab['icon_image']) }}" alt="{{ $tab['title'] }}" /></div>
                                    </a>
                                @endif
                            </div>
                            <div class="card-info">
                                @if ($tab['title'] && $tab['url'])
                                    <a href="{{ $tab['url'] }}">
                                        <h6 class="color-brand-1 icon-up">{{ $tab['title'] }}</h6>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
