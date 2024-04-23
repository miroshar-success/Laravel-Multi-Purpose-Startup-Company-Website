<section class="section pt-0 pb-50 bg-core-value bg-7 mb-40 mt-100">
    <div class="container">
        <div class="row box-list-core-value">
            <div class="col-lg-4 mb-40">
                <div class="box-core-value pl-0">
                    @if ($title = $shortcode->title)
                        <h1 class="color-brand-1 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($title) !!}</h1>
                    @endif

                    @if ($subtitle = $shortcode->subtitle)
                        <p class="font-md color-grey-400 wow animate__animated animate__fadeIn" data-wow-delay=".2s">{!! BaseHelper::clean($subtitle) !!}</p>
                    @endif
                    <div class="mt-30 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                        @if ($shortcode->button_url && $shortcode->button_label)
                            <a class="btn btn-white-circle font-sm-bold border-brand" href="{{ $shortcode->button_url }}">{{ $shortcode->button_label }}</a>
                        @endif
                    </div>
                </div>
            </div>
            @foreach(collect($tabs)->split(2) as $tabs)
                <div class="col-lg-4">
                    <ul class="list-core-value list-core-value-white">
                        @foreach($tabs as $tab)
                            <li class="wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->index * 2 }}s"><span class="ticked"></span>
                                @if ($tab['title'])
                                    <h5 class="color-brand-1 mb-5">{{ $tab['title'] }}</h5>
                                @endif
                                <div class="box-border-dashed">
                                    @if($tab['description'])
                                        <p class="font-md color-grey-500 mb-20">{{ $tab['description'] }}</p>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</section>
