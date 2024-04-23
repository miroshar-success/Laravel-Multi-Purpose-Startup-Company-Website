<section class="section mt-50 bg-plant testimonial-style-1">
    @if ($image = $shortcode->image)
        <img class="image wow animate__animated animate__fadeInUp" src="{{ RvMedia::getImageUrl($image) }}" alt="image" />
    @endif
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-8 col-md-8">
                @if ($title = $shortcode->title)
                    <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">{!! BaseHelper::clean($title) !!}</h2>
                @endif

                @if ($subtitle = $shortcode->subtitle)
                    <p class="font-lg color-gray-500 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                        {!! BaseHelper::clean($subtitle) !!}
                    </p>
                @endif
            </div>
        </div>
        <div class="mt-50 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
            <div class="box-swiper">
                <div class="swiper-container swiper-group-3">
                    <div class="swiper-wrapper">
                        @foreach($testimonials as $testimonial)
                            <div class="swiper-slide">
                            <div class="card-testimonial-grid">
                                <div class="box-author mb-10">
                                    <img src="{{ RvMedia::getImageUrl($testimonial->image) }}" alt="{{ $testimonial->name }}" />
                                    <div class="author-info">
                                        <span class="font-md-bold color-brand-1 author-name">{{ $testimonial->name }}</span>
                                        <span class="font-xs color-grey-500 department">{{ $testimonial->company }}</span>
                                    </div>
                                </div>
                                <p class="font-md color-grey-500">
                                    {!! BaseHelper::clean($testimonial->content) !!}
                                </p>
                                <div class="card-bottom-info">
                                    <span class="font-xs color-grey-500 date-post">{{ $testimonial->created_at->translatedFormat('d M Y') }}</span>
                                    <div class="rating text-end">
                                        <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Star') }}" />
                                        <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Star') }}" />
                                        <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Star') }}" />
                                        <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Star') }}" />
                                        <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Star') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination swiper-pagination-2 swiper-pagination-group-3"></div>
                </div>
            </div>
        </div>
    </div>
</section>

