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

            @if ($categories->count() > 0)
                <div class="mt-30 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                <div class="box-swiper">
                    <div class="swiper-container swiper-group-8">
                        <div class="swiper-wrapper">
                            @foreach($categories as $category)
                                <div class="swiper-slide">
                                    <img src="{{ RvMedia::getImageUrl($category->image) }}" alt="{{ $category->name }}">
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
