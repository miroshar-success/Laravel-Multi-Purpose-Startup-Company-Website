<div class="container">
    <div class="col-xl-12 mb-30">
        <div class="card-radius-32 bg-grey-60">
            <div class="row">
                <div class="col-lg-6">
                    <div class="box-cover-pd">
                        <div class="box-image-rd-30">
                            @if ($image = $shortcode->image)
                                <div class="img-reveal">
                                    <img class="w-100" src="{{ RvMedia::getImageUrl($image) }}" alt="{{ __('Image') }}">
                                </div>
                            @endif

                            @if ($subtitle = $shortcode->subtitle)
                                <h4 class="color-brand-1 lbl-on-top wow animate__animated animate__fadeInUp" data-wow-delay="2.s">{!! BaseHelper::clean($subtitle) !!}</h4>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box-cover-pd-2">
                        @if ($title = $shortcode->title)
                            <h2 class="color-brand-1 mb-30">{!! BaseHelper::clean($title) !!}</h2>
                        @endif

                        @foreach($tabs as $tab)
                            <div class="wow animate__animated animate__fadeInUp">
                                <div class="item-number hover-up">
                                    <div class="num-ele">{{ $loop->iteration }}</div>
                                    <div class="info-num">
                                        <h5 class="color-brand-1 mb-15">{{ $tab['title'] }}</h5>
                                        <p class="font-md color-grey-500">{{ $tab['description'] }}</p>
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
