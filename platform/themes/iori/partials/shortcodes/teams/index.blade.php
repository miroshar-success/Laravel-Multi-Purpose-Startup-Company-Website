<section class="section mt-60 team-section-blocks">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-lg-6">
                @if ($subtitle = $shortcode->subtitle)
                    <h6 class="color-brand-1 mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($subtitle) !!}</h6>
                @endif

                @if ($title = $shortcode->title)
                    <h2 class="color-brand-1 mb-50 wow animate__animated animate__fadeIn" data-wow-delay=".2s">{!! BaseHelper::clean($title) !!}</h2>
                @endif
            </div>
        </div>
        <div class="row align-items-start">
            @foreach($teams as $team)
                <div class="col-lg-{{ $teams->count() > 3 ? 3 : (12 / $teams->count()) }} col-md-{{ $teams->count() > 3 ? 4 : (12 / $teams->count()) }} col-sm-6 wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->iteration * 2 }}s">
                    <div class="card-team mb-30">
                        @if ($avatar = $team->photo)
                            <div class="card-image"><img src="{{ RvMedia::getImageUrl($avatar) }}" alt="{{ $team->name }}"></div>
                        @endif

                        <div class="card-info">
                            @if ($name = $team->name)
                                <span class="font-lg">{{ $team->name }}</span>
                            @endif

                            @if ($title = $team->title)
                                <p class="font-sm mt-1 color-grey-400 mb-10">{{ $team->title }}</p>
                            @endif

                            @if ($description = $team->getMetaData('description', true))
                                <p class="font-sm text-muted">
                                   {!! BaseHelper::clean($description) !!}
                                </p>
                            @endif

                            <div class="list-socials">
                                @if ($socials = $team->socials)
                                    @foreach(['facebook', 'twitter', 'instagram'] as $social)
                                        @if ($url = Arr::get($socials, $social))
                                            <a class="icon-socials icon-{{ $social }}" href="{{ $url }}"></a>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
