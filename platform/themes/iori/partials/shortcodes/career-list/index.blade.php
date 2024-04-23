<section class="section mt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                @if ($title = $shortcode->title)
                    <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($title) !!}</h2>
                @endif

                @if ($subtitle = $shortcode->subtitle)
                    <p class="font-lg color-gray-500 wow animate__animated animate__fadeIn" data-wow-delay=".2s">{!! BaseHelper::clean($subtitle) !!}</p>
                @endif
            </div>
        </div>
        <div class="row mt-50">
            @foreach($careers as $career)
                <div class="col-lg-6 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                    <div class="card-offer card-we-do hover-up">
                        @if ($icon = $career->getMetaData('icon', true))
                            <div class="card-image">
                                <img src="{{ RvMedia::getImageUrl($icon) }}" alt="{{ $career->name }}">
                            </div>
                        @endif
                        <div class="card-info">
                            <h4 class="color-brand-1 mb-10">
                                <a class="color-brand-1" href="{{ $career->url }}">{{ $career->name }}</a></h4>
                            <p class="font-md color-grey-500 mb-5">{!! BaseHelper::clean(Str::words($career->description)) !!}</p>
                            <div class="box-button-offer">
                                <a href="{{ $career->url }}" class="btn btn-default font-sm-bold pl-0 color-brand-1">{{ __('Learn More') }}
                                    <svg class="w-6 h-6 icon-16 ml-5" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-40 mb-50 text-center wow animate__animated animate__fadeIn" data-wow-delay=".0s">
            @if (($buttonPrimaryLabel = $shortcode->button_primary_label) && ($buttonPrimaryUrl = $shortcode->button_primary_url))
                <a class="btn btn-brand-1 hover-up" href="{{ $buttonPrimaryUrl }}">{!! BaseHelper::clean($buttonPrimaryLabel) !!}</a>
            @endif

            @if (($buttonSecondaryLabel = $shortcode->button_secondary_label) && ($buttonSecondaryUrl = $shortcode->button_secondary_url))
                <a class="btn btn-default font-sm-bold hover-up" href="{{ $buttonSecondaryUrl }}">{!! BaseHelper::clean($buttonSecondaryLabel) !!}
                    <svg class="w-6 h-6 icon-16 ml-5" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            @endif
        </div>
    </div>
</section>
