<section class="section mt-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                @if ($title = $shortcode->title)
                    <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($title) !!}</h2>
                @endif

                @if ($subtitle = $shortcode->subtitle)
                    <p class="font-lg color-gray-500 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                        {!! BaseHelper::clean($subtitle) !!}
                    </p>
                @endif
            </div>
        </div>
        <div class="row mt-65">
            @foreach($tabs as $tab)
                <div class="col-lg-3 col-md-6 col-sm-6 wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->index * 2 }}s">
                    <div class="card-small card-small-2">
                        <div class="card-image">
                            <a href="{{ $tab['action'] }}">
                                @if ($tab['image'])
                                    <div class="box-image">
                                        {{ RvMedia::image($tab['image'], $tab['title']) }}
                                    </div>
                                @endif
                            </a>
                        </div>
                        <div class="card-info"><a href="{{ $tab['action'] }}">
                                <h6 class="color-brand-1 mb-10">{{ $tab['title'] }}</h6></a>
                            <p class="font-xs color-grey-500">{{ $tab['description'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
