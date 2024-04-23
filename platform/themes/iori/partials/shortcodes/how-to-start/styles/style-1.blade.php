<section class="section mt-50">
    <div class="container">
        <div class="row mt-50 align-items-center">
            <div class="col-lg-6">
                <div class="box-images-project">
                    <div class="box-images wow animate__animated animate__fadeIn">
                        @if ($image = $shortcode->image)
                            <img class="img-main-2" src="{{ RvMedia::getImageUrl($image) }}" alt="{{ __('Banner Image') }}">
                        @endif

                        @if ($imageIconPrimary = $shortcode->image_icon_primary)
                            <div class="shape-1 image-4"><img src="{{ RvMedia::getImageUrl($imageIconPrimary) }}" alt="{{ __('Icon primary') }}"></div>
                        @endif

                        @if ($imageIconSecondary = $shortcode->image_icon_secondary)
                            <div class="shape-2 image-5"><img src="{{ RvMedia::getImageUrl($imageIconSecondary) }}" alt="{{ __('Icon secondary') }}"></div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                @if ($subtitle = $shortcode->subtitle)
                    <div class="title-line mb-10 wow animate__animated animate__fadeIn">{!!BaseHelper::clean($subtitle) !!}</div>
                @endif

                @if ($title = $shortcode->title)
                    <h2 class="color-brand-1 mb-40 wow animate__animated animate__fadeIn">{!! BaseHelper::clean($title) !!}</h2>
                @endif

                @foreach($tabs as $tab)
                    <div class="item-number hover-up">
                        <div class="num-ele">{{ $loop->iteration }}</div>
                        <div class="info-num">
                            @if ($tab['title'])
                                <h5 class="color-brand-1 mb-15">{{ $tab['title'] }}</h5>
                            @endif

                            @if ($tab['description'])
                                <p class="font-md color-grey-500">{{ $tab['description'] }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
