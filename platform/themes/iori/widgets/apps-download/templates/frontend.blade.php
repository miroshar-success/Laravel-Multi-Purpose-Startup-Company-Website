<div class="col-lg-3 width-23">
    @if ($title = Arr::get($config, 'title'))
        <h5 class="mb-10 color-brand-1">{{ $title }}</h5>
    @endif
    <div>
        @if ($subtitle = Arr::get($config, 'subtitle'))
            <p class="font-sm color-grey-400">{{ $subtitle }}</p>
        @endif
        <div class="mt-20 d-flex">
            @if ($logoAppleStore = Arr::get($config, 'platform_apple_store_logo'))
                <a class="pe-2" href="{{ Arr::get($config, 'platform_apple_store_url') ?: 'https://apps.apple.com' }}">
                    <img src="{{ RvMedia::getImageUrl($logoAppleStore) }}" alt="{{ __('Apple Store') }}">
                </a>
            @endif

            @if ($logoGooglePlay = Arr::get($config, 'platform_google_play_logo'))
                <a class="pe-2" href="{{ Arr::get($config, 'platform_google_play_url') ?: 'https://play.google.com' }}">
                    <img src="{{ RvMedia::getImageUrl($logoGooglePlay) }}" alt="{{ __('Google Play') }}">
                </a>
            @endif
        </div>
    </div>
</div>
