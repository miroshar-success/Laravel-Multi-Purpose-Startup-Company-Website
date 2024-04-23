<section class="section mt-60">
    <div class="container">
        <div class="text-center">
            @if ($title = $shortcode->title)
                <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                    {!! BaseHelper::clean($title) !!}
                </h2>
            @endif

            @if ($subtitle = $shortcode->subtitle)
                <p class="font-lg color-grey-500 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                    {!! BaseHelper::clean($subtitle) !!}
                </p>
            @endif
        </div>
        <div class="row mt-75 align-items-center">
            <div class="col-lg-4 mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".6s">
                @if (count($tabs) > 0)
                    @foreach($tabs[0] as $tab)
                        <div class="card-become">
                            <div class="card-title text-end">
                                <h6 class="color-brand-1 mb-15">
                                <span>{{ $tab['title'] }}</span>
                                <img class="ml-15" src="{{ RvMedia::getImageUrl($tab['image']) }}" alt="{{ $tab['title'] }}"></h6>
                            </div>

                            @if ($tab['description'])
                                <div class="card-desc">
                                    <p class="text-end color-grey-500">{{ $tab['description'] }}</p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="col-lg-4 mb-30 text-center wow animate__animated animate__fadeIn" data-wow-delay=".8s">
                @if ($image = $shortcode->image)
                    <img src="{{ RvMedia::getImageUrl($image) }}" alt="{{ __('Image') }}">
                @endif
            </div>
            <div class="col-lg-4 mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".s">
                @if (count($tabs) > 1)
                    @foreach($tabs[1] as $tab)
                        <div class="card-become">
                            <div class="card-title text-start">
                                <h6 class="color-brand-1 mb-15">
                                    <img class="mr-15" src="{{ RvMedia::getImageUrl($tab['image']) }}" alt="{{ $tab['title'] }}">
                                    <span>{{ $tab['title'] }}</span>
                                </h6>
                            </div>

                            @if ($tab['description'])
                                <div class="card-desc">
                                    <p class="text-start color-grey-500">{{ $tab['description'] }}</p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="border-bottom mt-100"></div>
</section>
