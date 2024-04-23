<section class="section pt-100 pb-100 bg-2">
    <div class="container">
        @foreach($tabs as $tab)
            @if($loop->odd)
                <div class="box-story box-story-1">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="box-info-video">
                                <div class="img-reveal"><img class="bd-rd8 d-block" src="{{ RvMedia::getImageUrl($tab['image']) }}" alt="{{ $tab['subtitle'] }}"></div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="box-info-video mt-30 mb-30">
                                @if ($tab['subtitle'])
                                    <span class="btn btn-tag wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                                        {{ $tab['subtitle'] }}
                                    </span>
                                @endif

                                @if ($tab['title'])
                                    <h3 class="color-brand-1 mt-10 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{{ $tab['title'] }}</h3>
                                @endif

                                @if($tab['description'])
                                    <p class="font-md color-grey-400 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                                        {{ $tab['description'] }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="box-story box-story-2">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="box-info-video mt-30 mb-30">
                                @if ($tab['subtitle'])
                                    <span class="btn btn-tag wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                                        {{ $tab['subtitle'] }}
                                    </span>
                                @endif

                                @if ($tab['title'])
                                    <h3 class="color-brand-1 mt-10 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{{ $tab['title'] }}</h3>
                                @endif

                                @if($tab['description'])
                                    <p class="font-md color-grey-400 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                                        {{ $tab['description'] }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="box-info-video">
                                <div class="img-reveal"><img class="bd-rd8 d-block" src="{{ RvMedia::getImageUrl($tab['image']) }}" alt="{{ $tab['subtitle'] }}"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</section>
