<section class="section mt-50 featured-services-style-4">
    <div class="container">
        <div class="row">
            @foreach($tabs as $tab)
                <div class="col-lg-4 wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->index }}s">
                    <div class="card-support">
                        <div class="card-image">
                            <div class="box-circle-img">
                                @if ($tab['image'])
                                    {{ RvMedia::image($tab['image'], $tab['title'], attributes: ['width' => 40, 'height' => 40]) }}
                                @endif
                            </div>
                        </div>
                        <div class="card-info">
                            @if ($tab['title'])
                                <h4 class="color-brand-1 mb-15">{{ $tab['title'] }}</h4>
                            @endif

                            @if($tab['description'])
                                <p class="font-md color-grey-500 mb-15">{{ $tab['description'] }}</p>
                            @endif

                            @if ($tab['action'] && $tab['label'])
                                <a class="btn btn-default pl-0 font-sm-bold hover-up" href="{{ $tab['action'] }}">{{ $tab['label'] }}
                                    <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
