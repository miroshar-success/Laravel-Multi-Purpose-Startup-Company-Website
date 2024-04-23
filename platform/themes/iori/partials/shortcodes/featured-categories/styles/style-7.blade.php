<section class="section mt-50">
    <div class="container">
        <div class="text-center">
            @if ($title = $shortcode->title)
                <h3 class="color-brand-1 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                    {!! BaseHelper::clean($title) !!}
                </h3>
            @endif

            @if ($subtitle = $shortcode->subtitle)
                <p class="font-lg color-grey-500 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                    {!! BaseHelper::clean($subtitle) !!}
                </p>
            @endif
        </div>
        <div class="mt-30 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
            <div class="box-swiper pager-style-2">
                <div class="swiper-container swiper-group-8">
                    <div class="swiper-wrapper">
                        @foreach ($categories as $category)
                            <div class="swiper-slide">
                                <a href="{{ $category->url }}"><img src="{{ RvMedia::getImageUrl($category->image) }}" alt="{{ $category->title }}"></a>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination swiper-pagination-group-8"></div>
                </div>
            </div>
        </div>
    </div>
</section>
