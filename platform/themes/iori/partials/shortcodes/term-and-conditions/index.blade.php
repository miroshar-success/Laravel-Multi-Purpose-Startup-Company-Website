<div class="section pt-40 content-term term-and-conditions">
    <div class="box-bg-term"></div>
    <div class="container">
        {!! Theme::partial('breadcrumb') !!}
        <div class="content-main mt-50">
            <div class="text-center">
                @if ($title = $shortcode->title)
                    <h2 class="color-brand-1 mb-10">{!! BaseHelper::clean($title) !!}</h2>
                @endif

                @if ($subtitle = $shortcode->subtitle)
                    <p class="font-lg color-grey-500">{!! BaseHelper::clean($subtitle) !!}</p>
                @endif

                @if ($image = $shortcode->image)
                    <div class="box-image-head mt-50 mb-50"> <img class="bd-rd8" src="{{ RvMedia::getImageUrl($image) }}" alt="{{ __('Image') }}"></div>
                @endif
            </div>

            @if (!empty($tabs))
                <div class="row mt-40">
                    <div class="col-lg-1 col-md-1"></div>
                    <div class="col-lg-2 col-md-3">
                        <h6 class="color-brand-1 mb-15">{{ __('Table of contents') }}</h6>
                        <ul class="list-terms">
                            @foreach($tabs as $tab)
                                <li> <a href="#{{ Str::slug($tab['title']) }}">{{ $tab['title'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        @foreach($tabs as $tab)
                            <h4 class="color-brand-1 mb-20" id="{{ Str::slug($tab['title']) }}">{{ $tab['title'] }}</h4>
                            <p class="font-md color-grey-500 mb-30">{{ $tab['description'] }}</p>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
