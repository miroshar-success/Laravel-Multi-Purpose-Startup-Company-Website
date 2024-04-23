<section class="section mt-50 bg-grey-60">
    <div class="container">
        <div class="pt-60 pb-60">
            @if ($title = $shortcode->title)
                <h2 class="color-brand-1 wow animate__animated animate__fadeInUp">{!! BaseHelper::clean($title) !!}</h2>
            @endif
            <div class="mt-50 wow animate__animated animate__fadeIn">
                <div class="box-swiper">
                    <div class="swiper-container swiper-group-2">
                        <div class="swiper-wrapper">
                            @foreach($testimonials as $testimonial)
                                <div class="swiper-slide">
                                    <div class="card-review">
                                        <div class="card-info">
                                            <div class="rating-review">
                                                <img src="{{ Theme::asset()->url('imgs/page/homepage7/star.png') }}" alt="{{ __('Star rating') }}">
                                                <img src="{{ Theme::asset()->url('imgs/page/homepage7/star.png') }}" alt="{{ __('Star rating') }}">
                                                <img src="{{ Theme::asset()->url('imgs/page/homepage7/star.png') }}" alt="{{ __('Star rating') }}">
                                                <img src="{{ Theme::asset()->url('imgs/page/homepage7/star.png') }}" alt="{{ __('Star rating') }}">
                                                <img src="{{ Theme::asset()->url('imgs/page/homepage7/star.png') }}" alt="{{ __('Star rating') }}">
                                            </div>

                                            @if ($content = $testimonial->content)
                                                <h5 class="color-grey-800 mb-20">{!! BaseHelper::clean($content) !!}</h5>
                                            @endif
                                            <div class="box-author">
                                                @if ($avatar = $testimonial->image)
                                                    <img src="{{ RvMedia::getImageUrl($avatar) }}" alt="{{ $testimonial->name }}">
                                                @endif
                                                <div class="author-info">
                                                    @if ($name = $testimonial->name)
                                                        <span class="font-md-bold color-brand-1 author-name">{{ $name }}</span>
                                                    @endif

                                                    @if($company = $testimonial->company)
                                                        <span class="font-xs color-grey-500 department">{{ $company }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
