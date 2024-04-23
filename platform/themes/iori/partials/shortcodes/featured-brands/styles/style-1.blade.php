<section class="section">
    <div class="box-radius-bottom">
        <div class="container">
            <div class="text-center">
                @if ($title = $shortcode->title)
                    <h3 class="color-brand-1 mb-15 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">{!! BaseHelper::clean($title) !!}</h3>
                @endif

                @if ($subtitle = $shortcode->subtitle)
                    <p class="font-lg color-grey-500 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">{!! BaseHelper::clean($subtitle) !!}</p>
                @endif
            </div>

            @if (count($tabs) > 0)
                <div class="mt-30 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                <div class="box-swiper">
                    <div class="swiper-container swiper-group-8">
                        <div class="swiper-wrapper">
                            @foreach($tabs as $tab)
                                @continue(! $tab['image'])
                                <div class="swiper-slide">
                                    @if ($tab['url'])
                                        <a title="{{ $tab['title'] }}" href="{{ $tab['url'] }}" @if ($tab['is_open_new_tab'] == 'yes') target="_blank" @endif>
                                            {{ RvMedia::image($tab['image'], $tab['title']) }}
                                        </a>
                                    @else
                                        {{ RvMedia::image($tab['image'], $tab['title']) }}
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination swiper-pagination-group-8"></div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
