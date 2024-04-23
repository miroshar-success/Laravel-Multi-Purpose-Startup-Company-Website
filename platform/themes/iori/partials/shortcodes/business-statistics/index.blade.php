<section class="section mt-150">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                @if ($subtitle = $shortcode->subtitle)
                    <span class="title-line line-48 wow animate__animated animate__fadeInUp">{!! BaseHelper::clean($subtitle) !!}</span>
                @endif

                @if ($title = $shortcode->title)
                    <h3 class="color-brand-1 mb-20 mt-15 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        {!! BaseHelper::clean($title) !!}
                    </h3>
                @endif

                @if ($description = $shortcode->decription)
                    <div class="row">
                        <div class="col-lg-9">
                            <p class="font-sm color-grey-500 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                                {!! BaseHelper::clean($description) !!}
                            </p>
                        </div>
                    </div>
                @endif

                <div class="mt-35">
                    <div class="row">
                        @foreach($tabs as $tab)
                            @if(! $loop->first)
                                <div class="col-lg-5 col-md-6 col-sm-6 col-6 mb-20">
                                    <h2 class="color-brand-1"><span class="count">{{ $tab['data'] }}</span><span>{{ $tab['unit'] }}</span></h2>
                                    <p class="font-lg color-brand-1">{{ $tab['title'] }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="box-charts">
                    @if ($tab = $tabs[0])
                        <div class="box-chart-1 text-end">
                            <div class="box-number-2 bg-brand-2">
                                <h2 class="color-brand-1"><span class="count">{{ $tab['data'] }}</span><span>{{ $tab['unit'] }}</span></h2>
                                <p class="font-lg color-brand-1 wow animate__animated animate__fadeInUp" data-wow-delay=".6s">{{ $tab['title'] }}</p>
                            </div>
                        </div>
                    @endif

                    @if ($image1 = $shortcode->image_1)
                        <div class="box-chart-2 wow animate__animated animate__fadeIn" data-wow-delay=".s">
                            <div class="item-chart-inner"><img src="{{ RvMedia::getImageUrl($image1) }}" alt="{{ __('Image 1') }}"></div>
                        </div>
                    @endif

                </div>
                <div class="box-charts">
                    @if ($image2 = $shortcode->image_2)
                        <div class="box-chart-1 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                            <div class="item-chart-inner"><img src="{{ RvMedia::getImageUrl($image2) }}" alt="{{ __('Image 2') }}"></div>
                        </div>
                    @endif

                    @if ($image3 = $shortcode->image_3)
                        <div class="box-chart-2 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                            <div class="item-chart-inner"><img src="{{ RvMedia::getImageUrl($image3) }}" alt="{{ 'Image 3' }}"></div>
                        </div>
                    @endif

                </div>
                <div class="box-charts">
                    <div class="box-reviews">
                        <div class="item-chart-inner">
                            <div class="row">
                                @foreach($testimonials as $testimonial)
                                    <div class="col-lg-6 mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->iteration * 2 }}s">
                                        <div class="card-comment">
                                            <div class="card-image"><img src="{{ RvMedia::getImageUrl($testimonial->image) }}" alt="{{ $testimonial->name }}"></div>
                                            <div class="card-info">
                                                <div class="card-title"><span class="font-md-bold color-brand-1 title-comment">{{ $testimonial->name }}</span>
                                                    <div class="rating">
                                                        <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Star') }}">
                                                        <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Star') }}">
                                                        <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Star') }}">
                                                        <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Star') }}">
                                                        <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Star') }}">
                                                    </div>
                                                </div>
                                                <p class="font-xs color-grey-500">{!! BaseHelper::clean($testimonial->content) !!}</p>
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
    </div>
    <div class="border-bottom mt-40"></div>
</section>
