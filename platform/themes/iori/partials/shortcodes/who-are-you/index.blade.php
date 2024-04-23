<section class="section pt-40 banner-about">
    <div class="container text-center">
        @if ($subtitle = $shortcode->subtitle)
            <h6 class="color-grey-400 mb-15">{!! BaseHelper::clean($subtitle) !!}</h6>
        @endif

        @if ($title = $shortcode->title)
            <h2 class="color-brand-1 mb-15">{!! BaseHelper::clean($title) !!}</h2>
        @endif

        @if ($description = $shortcode->description)
            <p class="font-md color-grey-400 mb-30">{!! BaseHelper::clean($description) !!}</p>
        @endif

        <div class="box-radius-border mt-50">
            <div class="box-list-numbers">
                @foreach($tabs as $tab)
                    <div class="item-list-number">
                        @if($tab['image'])
                            <div class="box-image-bg">
                                {{ RvMedia::image($tab['image'], $tab['title']) }}
                            </div>
                        @endif
                        @if($tab['data'] || $tab['unit'])
                            <h2 class="color-brand-1">
                                @if($tab['data'])
                                    <span class="count">{{ $tab['data'] }}</span>
                                @endif
                                @if($tab['unit'])
                                    <span>{{ $tab['unit'] }}</span>
                                @endif
                            </h2>
                        @endif

                        @if($tab['title'])
                            <p class="color-brand-1 font-lg">{{ $tab['title'] }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
