<div class="mb-3">
    <label class="form-label" for="widget-name">{{ __('Title') }}</label>
    <input type="text" id="title" name="title" class="form-control" value="{{ Arr::get($config, 'title') }}">
</div>

<div class="mb-3">
    <label class="form-label" for="widget-name">{{ __('Subtitle') }}</label>
    <input type="text" id="subtitle" name="subtitle" class="form-control" value="{{ Arr::get($config, 'subtitle') }}">
</div>

<div class="mb-3">
    <label class="form-label" for="platform_google_play_logo">{{ __('GooglePlay Logo') }}</label>
    {!! Form::mediaImage('platform_google_play_logo', Arr::get($config, 'platform_google_play_logo')) !!}
</div>

<div class="mb-3">
    <label class="form-label" for="platform_google_play_url">{{ __('GooglePlay URL') }}</label>
    <input type="text" id="platform_google_play_url" name="platform_google_play_url" class="form-control" value="{{ Arr::get($config, 'platform_google_play_url') }}">
</div>

<div class="mb-3">
    <label class="form-label" for="logo">{{ __('AppleStore Logo') }}</label>
    {!! Form::mediaImage('platform_apple_store_logo', Arr::get($config, 'platform_apple_store_logo')) !!}
</div>

<div class="mb-3">
    <label class="form-label" for="platform_apple_store_url">{{ __('AppleStore URL') }}</label>
    <input type="text" id="platform_apple_store_url" name="platform_apple_store_url" class="form-control" value="{{ Arr::get($config, 'platform_apple_store_url') }}">
</div>
