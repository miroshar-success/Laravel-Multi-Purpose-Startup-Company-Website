<section class="section mt-40">
    <div class="container">
        <div class="box-create-account bg-4">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="title-line line-48 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h2 class="color-brand-1 mb-20 mt-10 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                            {!! BaseHelper::clean($title) !!}
                        </h2>
                    @endif
                    <div class="row">
                        @foreach($tabs as $tab)
                            <div class="col-lg-6 col-sm-6 mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->index * 2 }}s">
                                <div class="box-image-bg-60">
                                @if ($tab['image'])
                                    <img class="d-block" src="{{ RvMedia::getImageUrl($tab['image']) }}" alt="{{ $tab['title'] }}">
                                @endif

                                </div>
                                @if ($tab['title'])
                                    <h6 class="color-brand-1 mb-15">{{ $tab['title'] }}</h6>
                                @endif

                                @if ($tab['description'])
                                    <p class="font-xs color-grey-500">{{ $tab['description'] }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 position-relative mb-30 box-right">
                    <div class="box-image-account">
                        @if ($image = $shortcode->image)
                            <img class="d-block" src="{{ RvMedia::getImageUrl($image) }}" alt="{{ __('Image') }}">
                        @endif
                    </div>

                    @if( $shortcode->title_counter && $shortcode->data_counter)
                        <div class="cardNumber bg-2">
                            <div class="card-head"><span class="count">{{ $shortcode->data_counter }}</span><span>{{ $shortcode->unit_counter }}</span></div>
                            <div class="card-description">{{ $shortcode->title_counter }}</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
