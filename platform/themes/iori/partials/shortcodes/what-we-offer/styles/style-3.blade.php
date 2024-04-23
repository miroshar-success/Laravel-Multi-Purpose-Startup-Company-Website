@php
    $styleColors = ['head-bg-brand-2', 'head-bg-2', 'head-bg-5', '']
@endphp

<section class="section mt-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                @if($title = $shortcode->title)
                    <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                        {!! BaseHelper::clean($title) !!}
                    </h2>
                @endif

                @if ($subtitle = $shortcode->subtitle)
                    <p class="font-lg color-gray-500 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                        {!! BaseHelper::clean($subtitle) !!}
                    </p>
                @endif
            </div>
        </div>
        <div class="mt-50 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
            <div class="box-swiper">
                <div class="swiper-container swiper-group-4">
                    <div class="swiper-wrapper">
                        @foreach($tabs as $tab)
                            <div class="swiper-slide {{ $styleColors[rand(0, count($styleColors)-1)] }}">
                                <div class="card-offer-style-3">
                                    <div class="card-head">
                                        @if ($tab['image'])
                                            <div class="card-image">
                                                {{ RvMedia::image($tab['image'], $tab['title']) }}
                                            </div>
                                        @endif

                                        @if ($tab['title'])
                                            <div class="card-title">
                                                <h4 class="color-brand-1">{{ $tab['title'] }}</h4>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="card-info">
                                        @if ($tab['description'])
                                            <p class="font-sm color-grey-500 mb-15">{{ $tab['description'] }}</p>
                                        @endif

                                        @if ($tab['label'] && $tab['action'])
                                            <div class="box-button-offer">
                                                <a href="{{ $tab['action'] }}" class="btn btn-default font-sm-bold ps-0 color-brand-1 hover-up">{{ $tab['label'] }}
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
                    <div class="box-button-slider-bottom">
                        <div class="swiper-button-prev swiper-button-prev-group-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                        </div>
                        <div class="swiper-button-next swiper-button-next-group-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
