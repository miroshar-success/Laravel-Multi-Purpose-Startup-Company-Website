<section class="section mt-40 pt-50 pb-15 bg-grey-80">
    <div class="container">
        <div class="box-swiper">
            <div class="swiper-container swiper-group-3">
                <div class="swiper-wrapper">
                    @foreach($tabs as $tab)
                        <div class="swiper-slide">
                            <div class="card-guide">
                                @if($tab['image'])
                                    <div class="card-image">
                                        {{ RvMedia::image($tab['image'], $tab['title']) }}
                                    </div>
                                @endif
                                <div class="card-info">
                                    <h5 class="color-brand-1 mb-15">{{ $tab['title'] }}</h5>
                                    <p class="font-xs color-grey-500">{{ $tab['description'] }}</p>
                                    <div class="mt-10">
                                        @if ($tab['action'] && $tab['label'])
                                            <a class="btn btn-default font-sm-bold pl-0" href="{{ $tab['action'] }}">{!! BaseHelper::clean($tab['label']) !!}
                                                <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
