<section class="section mt-50 overflow-hidden">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center mb-30">
                <div class="box-phones">
                    <div class="box-phones-inner">
                        @if ($image1 = $shortcode->image_1)
                            <div class="img-phone-1 wow animate__animated animate__zoomIn" data-wow-delay=".0s">
                                <img src="{{ RvMedia::getImageUrl($image1) }}" alt="{{ __('Image') }}">
                            </div>
                        @endif

                        @if ($image2 = $shortcode->image_2)
                            <div class="img-phone-2 wow animate__animated animate__zoomIn" data-wow-delay=".0s">
                                <img src="{{ RvMedia::getImageUrl($image2) }}" alt="{{ __('Image') }}">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-30">
                <div class="box-our-app">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="title-line line-48 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h3 class="color-brand-1 mb-20 mt-15 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">{!! BaseHelper::clean($title) !!}</h3>
                    @endif

                    @if ($description = $shortcode->description)
                        <div class="font-sm color-grey-500 mb-40 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                            {!! BaseHelper::clean(nl2br($description)) !!}
                        </div>
                    @endif

                    @if ($testimonial)
                        <div class="box-item-comment wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                            <div class="image-comment"><img src="{{ RvMedia::getImageUrl($testimonial->image) }}" alt="{{ $testimonial->name }}"></div>
                            <div class="info-comment">
                                <p class="font-lg-bold color-grey-500 comment-quote mb-15">{{ $testimonial->content }}</p>
                                <span class="font-md-bold color-brand-1">{{ $testimonial->name }}</span>
                                <p class="font-xs color-grey-500">{{ $testimonial->company }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
