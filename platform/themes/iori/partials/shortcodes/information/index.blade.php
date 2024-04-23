<section class="section pb-50 bg-core-value">
    <div class="container">
        <div class="row box-list-core-value">
            <div class="col-lg-4 mb-40">
                <div class="box-core-value">
                    <div class="shape-left shape-1"></div>
                    @if ($title = $shortcode->title)
                        <h3 class="color-brand-1 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($title) !!}</h3>
                    @endif

                    @if ($subtitle = $shortcode->subtitle)
                        <p class="font-md color-grey-400 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                            {!! BaseHelper::clean($subtitle) !!}
                        </p>
                    @endif
                </div>
            </div>
            @foreach(array_chunk($tabs, 3) as $tabs)
                <div class="col-lg-4">
                    <ul class="list-core-value">
                        @foreach($tabs as $tab)
                            <li class="wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->index * 2 }}s"><span class="ticked"></span>
                                @if ($tab['title'])
                                    <h5 class="color-brand-1 mb-5">{{ $tab['title'] }}</h5>
                                @endif

                                @if ($tab['description'])
                                    <div class="box-border-dashed">
                                        <p class="font-md color-grey-500 mb-20">{{ $tab['description'] }}</p>
                                    </div>
                                @endif

                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</section>
