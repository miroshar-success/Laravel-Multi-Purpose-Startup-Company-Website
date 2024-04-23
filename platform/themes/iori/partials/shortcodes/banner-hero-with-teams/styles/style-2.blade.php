<section class="section banner-team">
    <div class="container">
        <div class="banner-1">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    @if ($title = $shortcode->title)
                        <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{{ $shortcode->title }}</h2>
                    @endif


                    <div class="box-button mt-30 mb-60 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                        @if ($shortcode->button_primary_label && $shortcode->button_primary_url)
                            <a class="btn btn-brand-1 hover-up" href="{{ $shortcode->button_primary_url }}">{{ $shortcode->button_primary_label }}</a>
                        @endif

                        @if ($shortcode->button_secondary_label && $shortcode->button_secondary_url)
                            <a class="btn btn-default font-sm-bold hover-up" href="{{ $shortcode->button_secodndary_url }}">{{ $shortcode->button_secondary_label }}
                                <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        @endif
                    </div>

                    @if ($description = $shortcode->description)
                        <p class="font-md color-grey-500 mb-25 wow animate__animated animate__fadeIn" data-wow-delay=".4s">{!! BaseHelper::clean($description) !!}</p>
                    @endif

                    @if(count($teams) > 0)
                        <div class="box-author wow animate__animated animate__fadeIn" data-wow-delay=".6s">
                            <img src="{{ RvMedia::getImageUrl($teams[0]->photo) }}" alt="{{ $teams[0]->name }}">
                            <div class="author-info"><span class="font-md-bold color-brand-1 author-name">{{ $teams[0]->name }}</span>
                                <div class="rating d-inline-block">
                                    @foreach(range(1, 5) as $i)
                                        <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Star') }}">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
                @if(count($teams) > 0)
                    <div class="col-lg-7 d-none d-lg-block">
                        <div class="box-banner-team">
                            <div class="arrow-down-banner shape-1"></div>
                            <div class="arrow-right-banner shape-2"></div>

                            @switch(count($teams))
                                @case(1)
                                    <div class="banner-col-1">
                                        <div class="img-banner wow animate__animated animate__zoomIn" data-wow-delay=".0s"><img src="{{ RvMedia::getImageUrl($teams[0]->photo) }}" alt="{{ $teams[0]->name }}"></div>
                                    </div>
                                @break

                                @case(2)
                                    @foreach($teams as $team)
                                        <div class="banner-col-{{ $loop->iteration }}">
                                            <div class="img-banner wow animate__animated animate__zoomIn" data-wow-delay=".0s"><img src="{{ RvMedia::getImageUrl($team->photo) }}" alt="{{ $team->name }}"></div>
                                        </div>
                                    @endforeach
                                @break

                                @case(3)
                                    <div class="banner-col-1">
                                        <div class="img-banner wow animate__animated animate__zoomIn" data-wow-delay=".0s"><img src="{{ RvMedia::getImageUrl($teams[0]->photo) }}" alt="{{ $teams[0]->name }}"></div>
                                    </div>
                                    <div class="banner-col-2">
                                        <div class="img-banner wow animate__animated animate__zoomIn" data-wow-delay=".0s"><img src="{{ RvMedia::getImageUrl($teams[1]->photo) }}" alt="{{ $teams[1]->name }}"></div>
                                        <div class="img-banner hasBorder wow animate__animated animate__zoomIn" data-wow-delay=".0s"><img src="{{ RvMedia::getImageUrl($teams[2]->photo) }}" alt="{{ $teams[2]->name }}"></div>
                                    </div>
                                @break

                                @case(4)
                                    <div class="banner-col-1">
                                        <div class="img-banner wow animate__animated animate__zoomIn" data-wow-delay=".0s"><img src="{{ RvMedia::getImageUrl($teams[0]->photo) }}" alt="{{ $teams[0]->name }}"></div>
                                    </div>
                                    <div class="banner-col-2">
                                        <div class="img-banner wow animate__animated animate__zoomIn" data-wow-delay=".0s"><img src="{{ RvMedia::getImageUrl($teams[1]->photo) }}" alt="{{ $teams[1]->name }}"></div>
                                        <div class="img-banner hasBorder wow animate__animated animate__zoomIn" data-wow-delay=".0s"><img src="{{ RvMedia::getImageUrl($teams[2]->photo) }}" alt="{{ $teams[2]->name }}"></div>
                                    </div>
                                    <div class="banner-col-3">
                                        <div class="img-banner hasBorder2 wow animate__animated animate__zoomIn" data-wow-delay=".6s"><img src="{{ RvMedia::getImageUrl($teams[3]->photo) }}" alt="{{ $teams[3]->name }}"></div>
                                    </div>
                                @break

                                @case(5)
                                    <div class="banner-col-1">
                                        <div class="img-banner wow animate__animated animate__zoomIn" data-wow-delay=".0s"><img src="{{ RvMedia::getImageUrl($teams[0]->photo) }}" alt="{{ $teams[0]->name }}"></div>
                                    </div>
                                    <div class="banner-col-2">
                                        <div class="img-banner wow animate__animated animate__zoomIn" data-wow-delay=".0s"><img src="{{ RvMedia::getImageUrl($teams[1]->photo) }}" alt="{{ $teams[1]->name }}"></div>
                                        <div class="img-banner hasBorder wow animate__animated animate__zoomIn" data-wow-delay=".0s"><img src="{{ RvMedia::getImageUrl($teams[2]->photo) }}" alt="{{ $teams[2]->name }}"></div>
                                    </div>
                                    <div class="banner-col-3">
                                        <div class="img-banner hasBorder2 wow animate__animated animate__zoomIn" data-wow-delay=".6s"><img src="{{ RvMedia::getImageUrl($teams[3]->photo) }}" alt="{{ $teams[3]->name }}"></div>
                                        <div class="img-banner hasBorder2 wow animate__animated animate__zoomIn" data-wow-delay=".6s"><img src="{{ RvMedia::getImageUrl($teams[4]->photo) }}" alt="{{ $teams[4]->name }}"></div>
                                    </div>
                                @break

                                @case(6)
                                    <div class="banner-col-1">
                                        <div class="img-banner wow animate__animated animate__zoomIn" data-wow-delay=".0s"><img src="{{ RvMedia::getImageUrl($teams[0]->photo) }}" alt="{{ $teams[0]->name }}"></div>
                                    </div>
                                    <div class="banner-col-2">
                                        <div class="img-banner wow animate__animated animate__zoomIn" data-wow-delay=".0s"><img src="{{ RvMedia::getImageUrl($teams[1]->photo) }}" alt="{{ $teams[1]->name }}"></div>
                                        <div class="img-banner hasBorder wow animate__animated animate__zoomIn" data-wow-delay=".0s"><img src="{{ RvMedia::getImageUrl($teams[2]->photo) }}" alt="{{ $teams[2]->name }}"></div>
                                    </div>
                                    <div class="banner-col-3">
                                        <div class="img-banner hasBorder2 wow animate__animated animate__zoomIn" data-wow-delay=".6s"><img src="{{ RvMedia::getImageUrl($teams[3]->photo) }}" alt="{{ $teams[3]->name }}"></div>
                                        <div class="img-banner hasBorder2 wow animate__animated animate__zoomIn" data-wow-delay=".6s"><img src="{{ RvMedia::getImageUrl($teams[4]->photo) }}" alt="{{ $teams[4]->name }}"></div>
                                        <div class="img-banner hasBorder2 wow animate__animated animate__zoomIn" data-wow-delay=".6s"><img src="{{ RvMedia::getImageUrl($teams[5]->photo) }}" alt="{{ $teams[5]->name }}"></div>
                                    </div>
                                @break
                            @endswitch
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
