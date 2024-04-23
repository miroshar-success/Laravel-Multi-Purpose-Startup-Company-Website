<section class="section mt-40 pt-50 pb-40">
    <div class="container">
        @foreach ($tabs as $tab)
            @if($loop->odd)
                <div class="bg-brand-1 box-cover-video bd-rd0">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6 pr-mb-0">
                            @if ($tab['image'])
                                <div class="img-reveal">
                                    <img class="d-block" src="{{ RvMedia::getImageUrl($tab['image']) }}" alt="{{ __('Image') }}">
                                </div>
                            @endif
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="box-info-video">
                                @if ($tab['subtitle'])
                                    <span class="btn btn-tag wow animate__animated animate__fadeIn" data-wow-delay=".s">{{ $tab['subtitle'] }}</span>
                                @endif

                                @if ($tab['title'])
                                    <h3 class="color-brand-2 mt-10 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".2s">{{ $tab['title'] }}</h3>
                                @endif

                                @if ($tab['description'])
                                    <p class="font-md color-white wow animate__animated animate__fadeIn" data-wow-delay=".4s">{{ $tab['description'] }}</p>
                                @endif

                                @if ($tab['button_label'] && $tab['youtube_video_id'])
                                    <div class="box-button-video wow animate__animated animate__fadeIn" data-wow-delay=".6s">
                                        <a class="btn btn-play font-sm-bold popup-youtube hover-up" href="https://www.youtube.com/watch?v={{ $tab['youtube_video_id'] }}">
                                            {{ $tab['button_label'] }}

                                            <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="22" cy="22" r="22" fill="currentColor"/>
                                                <path d="M17.5306 13.5726L31.6884 21.7802L17.5015 29.9374L17.5306 13.5726Z" fill="currentColor"/>
                                            </svg>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-brand-1 box-cover-video box-cover-video-convert bd-rd0">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6">
                            <div class="box-info-video">
                                @if ($tab['subtitle'])
                                    <span class="btn btn-tag wow animate__animated animate__fadeIn" data-wow-delay=".s">{{ $tab['subtitle'] }}</span>
                                @endif

                                @if ($tab['title'])
                                    <h3 class="color-brand-2 mt-10 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".2s">{{ $tab['title'] }}</h3>
                                @endif

                                @if ($tab['description'])
                                    <p class="font-md color-white wow animate__animated animate__fadeIn" data-wow-delay=".4s">{{ $tab['description'] }}</p>
                                @endif

                                @if ($tab['button_label'] && $tab['youtube_video_id'])
                                    <div class="box-button-video wow animate__animated animate__fadeIn" data-wow-delay=".6s">
                                        <a class="btn btn-play font-sm-bold popup-youtube hover-up" href="https://www.youtube.com/watch?v={{ $tab['youtube_video_id'] }}">
                                            {{ $tab['button_label'] }}

                                            <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="22" cy="22" r="22" fill="currentColor"/>
                                                <path d="M17.5306 13.5726L31.6884 21.7802L17.5015 29.9374L17.5306 13.5726Z" fill="currentColor"/>
                                            </svg>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 pl-mb-0">
                            @if ($tab['image'])
                                <div class="img-reveal">
                                    <img class="d-block" src="{{ RvMedia::getImageUrl($tab['image']) }}" alt="{{ __('Image') }}">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</section>
