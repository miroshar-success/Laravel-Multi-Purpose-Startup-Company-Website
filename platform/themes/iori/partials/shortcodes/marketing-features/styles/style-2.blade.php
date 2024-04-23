<section class="section mt-40">
    <div class="container">
        <div class="box-radius-16 bg-4">
            <div class="row">
                <div class="col-lg-12 text-center">
                    @if($title = $shortcode->title)
                        <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!!BaseHelper::clean($title) !!}</h2>
                    @endif
                </div>
            </div>
            <div class="row mt-50">
                @foreach($tabs as $tab)
                    <div class="col-lg-6 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->even ? 0 : 2 }}s">
                        <div class="card-offer card-we-do card-marketing hover-up">
                            @if($tab['icon_image'])
                                <div class="card-image">
                                    <span class="cover-image">
                                        {{ RvMedia::image($tab['icon_image'], $tab['title']) }}
                                    </span>
                                </div>
                            @endif
                            <div class="card-info">
                                @if ($tab['url'] && $tab['title'])
                                    <h4 class="color-brand-1 mb-10">
                                        <a class="color-brand-1" href="{{ $tab['url'] }}">{{ $tab['title'] }}</a>
                                    </h4>
                                @endif

                                @if ($tab['description'])
                                    <p class="font-md color-grey-500 mb-5">{{ $tab['description'] }}</p>
                                @endif

                                @if ($tab['url'] && $tab['label'])
                                    <div class="box-button-offer">
                                        <a href="{{ $tab['url'] }}" class="btn btn-default font-sm-bold ps-0 color-brand-1">{{ $tab['label'] }}
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
    </div>
</section>
