<section class="section mt-50 mb-30">
    <div class="container">
        <div class="box-container">
            <div class="row mt-50 align-items-center">
                <div class="col-xl-6 col-lg-6 mb-30">
                    <div class="box-images-cover">
                        <div class="box-images-inner">
                            @if($image = $shortcode->image)
                                <div class="img-reveal"><img class="img-project bd-rd16" src="{{ RvMedia::getImageUrl($image) }}" alt="image"></div>
                            @endif

                            @if($iconImage = $shortcode->icon_image)
                                <div class="image-6 shape-3"><img src="{{ RvMedia::getImageUrl($iconImage) }}" alt="image"></div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 mb-30">
                    @if($subtitle = $shortcode->subtitle)
                        <span class="btn btn-tag wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h3 class="color-brand-1 mt-10 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            {!! BaseHelper::clean($title) !!}</h3>
                    @endif

                    @if($description = $shortcode->description)
                        <p class="font-md color-grey-400 wow animate__animated animate__fadeIn" data-wow-delay=".2s">{!! BaseHelper::clean($description) !!}</p>

                    @endif
                    <div class="mt-20">
                        <ul class="list-ticks wow animate__animated animate__fadeIn" data-wow-delay=".3s">
                            @foreach($tabs as $tab)
                                <li>
                                    <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    {{ $tab['title'] }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mt-50 text-start">
                        <div class="row">
                            @foreach(range(1, 3) as $i)
                                <div class="col-lg-4 col-md-4 col-sm-4 col-4 mb-20">
                                    <h2 class="color-brand-1"><span class="count">{{ $shortcode->{'counter_number_' . $i} }}</span><span>k+</span></h2>
                                    <p class="font-lg color-brand-1">{{ $shortcode->{'counter_label_' . $i} }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
