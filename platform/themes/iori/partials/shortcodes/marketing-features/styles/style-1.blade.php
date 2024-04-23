<section class="section mt-50">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-12 text-center">
                @if($title = $shortcode->title)
                    <h2 class="color-brand-1 mb-20 px-5 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                        {!! BaseHelper::clean($title) !!}
                    </h2>
                @endif
            </div>
        </div>
        <div class="text-center mt-25 mb-65 wow animate__animated animate__fadeIn" data-wow-delay=".3s">
            <div class="box-social-media">
                <ul class="tabs-plan change-media" role="tablist">
                    <li><a class="active" href="#" data-type="personal">{{ __('Personal') }}</a></li>
                    <li><a href="#" data-type="enterprise">{{ __('Enterprise') }}</a></li>
                </ul>
            </div>
        </div>
        <div class="row mt-50">
            @foreach($tabs as $tab)
                <div class="col-lg-4 col-md-6 social-media {{ $tab['type'] ?: 'personal' }}">
                    <div class="card-offer-style-2 bg-{{ rand(1, 6) }} wow animate__animated animate__fadeInUp" data-wow-delay=".{{ $loop->index }}s">
                        <div class="card-offer hover-up">
                            @if ($iconImage = $tab['icon_image'])
                                <div class="card-image">
                                    {{ RvMedia::image($iconImage, $tab['title']) }}
                                </div>
                            @endif
                            <div class="card-info">
                                @if($tab['title'])
                                    <h4 class="color-brand-1 mb-15">{{ $tab['title'] }}</h4>
                                @endif
                                @if($tab['description'])
                                    <p class="font-md color-grey-500 mb-15">
                                        {{ $tab['description'] }}
                                    </p>
                                @endif

                                @if($tab['label'] && $tab['url'])
                                    <div class="box-button-offer">
                                        <a href="{{ $tab['url'] }}" class="btn btn-default font-sm-bold ps-0 color-brand-1">
                                            {{ $tab['label'] }}
                                            <svg fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                            </svg>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
