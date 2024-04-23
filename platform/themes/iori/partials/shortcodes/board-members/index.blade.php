<section class="section mt-60">
    <div class="container">
        @if ($subtitle = $shortcode->subtitle)
            <h6 class="color-brand-1 mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($subtitle) !!}</h6>
        @endif

        @if ($title = $shortcode->title)
            <h2 class="color-brand-1 mb-50 wow animate__animated animate__fadeIn" data-wow-delay=".2s">{!! BaseHelper::clean($title) !!}</h2>
        @endif
        <div class="row">
            @if(count($teams) > 0)
                @foreach($teams as $team)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow animate__animated animate__fadeIn">
                        <div class="card-member">
                            <div class="card-top">
                                <div class="card-image"><img src="{{ RvMedia::getImageUrl($team->photo) }}" alt="{{ $team->name }}"></div>
                                <div class="card-info"><span class="font-lg-bold color-brand-1">{{ $team->name }}</span>
                                    <p class="font-xs color-grey-400">{{ $team->title }}</p>
                                    <div class="list-socials">
                                        @foreach (collect($team->socials)->toArray() as $key => $value)
                                            <a class="icon-socials icon-{{ $key }}" href="{{ $value }}"></a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card-bottom">
                                @if ($description = $team->getMetaData('description', true))
                                    <p class="font-xs color-grey-500">{{ Str::limit($description) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
