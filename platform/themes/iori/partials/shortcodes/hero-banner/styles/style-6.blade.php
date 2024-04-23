<section class="section banner-5">
    <div class="container">
        <div class="mt-65 mb-100">
            <div class="row align-items-end">
                <div class="col-lg-6 mb-20">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="title-line color-brand-2 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h2 class="color-brand-2 mt-10 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">{!!BaseHelper::clean($title) !!}</h2>
                    @endif
                </div>
                <div class="col-lg-6 mb-20">
                    @if ($topDescription = $shortcode->top_description)
                        <p class="font-md color-grey-50 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">{!! BaseHelper::clean($topDescription) !!}</p>
                    @endif
                </div>
            </div>
            <div class="box-video-banner">
                <div class="image-banner-5 wow animate__animated animate__fadeIn">
                    @if ($image = $shortcode->banner_primary)
                        <img src="{!! RvMedia::getImageUrl($image) !!}" alt="{{ __('Banner image') }}">
                    @endif

                    @if($shortcode->youtube_video_id)
                        <a class="btn btn-play-center popup-youtube" href="https://www.youtube.com/watch?v={{ $shortcode->youtube_video_id }}"></a>
                    @endif
                </div>
            </div>
            <div class="box-info-video-banner">
                <div class="box-inner-video-banner">
                    <div class="row align-items-start">
                        <div class="col-lg-5">
                            @if ($description = $shortcode->description)
                                <p class="color-grey-500 font-lg wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($description) !!}</p>
                            @endif
                        </div>
                        <div class="col-lg-7">
                            <div class="row">
                                @foreach($tabs as $tab)
                                    <div class="col-lg-6 wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->iteration }}s">
                                        <div class="card-small card-small-2">
                                            @if ($tab['image'])
                                                <div class="card-image">
                                                    @if($tab['url'])
                                                        <a href="{{ $tab['url'] }}">
                                                            <div class="box-image">{{ RvMedia::image($tab['image'], $tab['title']) }}</div>
                                                        </a>
                                                    @else
                                                        <div class="box-image">{{ RvMedia::image($tab['image'], $tab['title']) }}</div>
                                                    @endif
                                                </div>
                                            @endif
                                            <div class="card-info">
                                                @if ($tab['title'])
                                                    <a href="{{ $tab['url'] ?: '#' }}">
                                                        <h6 class="color-brand-1 mb-10">{{ $tab['title'] }}</h6>
                                                    </a>
                                                @endif

                                                @if($tab['description'])
                                                    <p class="font-xs color-grey-500">{{ $tab['description'] }}</p>
                                                @endif
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
