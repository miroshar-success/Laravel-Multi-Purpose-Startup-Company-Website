<section class="section mt-50">
    <div class="container">
        <div class="row mt-50">
            <div class="col-xl-6 col-lg-5">
                <div class="box-images-project">
                    @if ($subtitle = $shortcode->subtitle)
                        <div class="title-line mb-10 wow animate__animated animate__fadeIn">{!! BaseHelper::clean($subtitle) !!}</div>
                    @endif

                    @if ($title = $shortcode->title)
                        <h2 class="color-brand-1 mb-25 wow animate__animated animate__fadeIn">{!! BaseHelper::clean($title) !!}</h2>
                    @endif

                    @if ($description = $shortcode->description)
                        <div class="color-grey-500 mb-15 wow animate__animated animate__fadeIn">
                            {!! BaseHelper::clean(nl2br($description)) !!}
                        </div>
                    @endif

                    <div class="box-button text-start mt-40 wow animate__animated animate__fadeIn">
                        @if ($shortcode->button_primary_url && $shortcode->button_primary_label)
                            <a class="btn btn-brand-1 hover-up" href="{{ $shortcode->button_primary_url }}" title="{{ $shortcode->button_primary_label }}">{{ $shortcode->button_primary_label }}</a>
                        @endif

                        @if ($shortcode->button_secondary_url && $shortcode->button_secondary_label)
                            <a class="btn btn-default font-sm-bold hover-up" href="{{ $shortcode->button_secondary_url }}" title="{{ $shortcode->button_secondary_label }}">
                                {{ $shortcode->button_secondary_label }}
                                <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <div class="row pt-40">
                    @foreach(array_chunk($tabs, 2) as $tab)
                        <div class="col-lg-6 col-md-6">
                            @foreach($tab as $item)
                                <div @class(['cardNumber wow animate__animated animate__zoomIn', 'mt-50' => $loop->parent->first, 'hasBorder' => $loop->first && $loop->parent->first, $item['color']]) data-wow-delay=".0s">
                                    <div class="card-head">{{ $item['data'] }}</div>
                                    <div class="card-description">{!! BaseHelper::clean($item['title']) !!}</div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
