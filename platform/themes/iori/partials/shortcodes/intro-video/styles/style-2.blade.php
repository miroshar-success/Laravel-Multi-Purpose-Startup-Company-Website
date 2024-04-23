<section class="section mt-50 pt-50 pb-30">
    <div class="container">
        <div class="bg-brand-1 box-cover-video box-cover-video-revert">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="box-info-video">
                        @if ($tag = $shortcode->tag)
                            <span class="btn btn-tag wow animate__animated animate__fadeInUp" data-wow-delay=".0s">{{ $tag }}</span>
                        @endif

                        @if ($title = $shortcode->title)
                            <h3 class="color-brand-2 mt-10 mb-15 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                {!! BaseHelper::clean($title) !!}
                            </h3>
                        @endif

                        @if ($subtitle = $shortcode->subtitle)
                            <p class="font-md color-white wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                                {!! BaseHelper::clean($subtitle) !!}
                            </p>
                        @endif

                        @if($shortcode->youtube_video_id)
                            <div class="box-button-video wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                                <a class="btn btn-play font-sm-bold popup-youtube hover-up" href="https://www.youtube.com/watch?v={{ $shortcode->youtube_video_id }}">
                                    {{ __('Play Video') }}

                                    <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="22" cy="22" r="22" fill="currentColor"/>
                                        <path d="M17.5306 13.5726L31.6884 21.7802L17.5015 29.9374L17.5306 13.5726Z" fill="currentColor"/>
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    @if ($image = $shortcode->image)
                        <div>
                            <img class="d-block" src="{{ RvMedia::getImageUrl($image) }}" alt="{{ $shortcode->title }}" />
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
