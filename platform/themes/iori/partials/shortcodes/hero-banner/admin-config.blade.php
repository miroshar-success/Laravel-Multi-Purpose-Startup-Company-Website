<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Subtitle') }}</label>
    <input name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Button youtube label') }}</label>
    <input name="button_youtube_label" value="{{ Arr::get($attributes, 'button_youtube_label') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('YouTube video URL') }}</label>
    <input name="youtube_video_url" value="{{ Arr::get($attributes, 'youtube_video_url') }}" class="form-control" />
</div>

<div class="mb-3">
    <lable class="form-label">{{ __('Description') }}</lable>
    <textarea class="form-control" name="description" rows="3">{{ Arr::get($attributes, 'description') }}</textarea>
</div>

<div class="mb-3">
    <lable class="form-label">{{ __('Top Description') }}</lable>
    <textarea class="form-control" name="top_description" rows="3">{{ Arr::get($attributes, 'top_description') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Banner Primary') }}</label>
    {!! Form::mediaImage('banner_primary', Arr::get($attributes, 'banner_primary')) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Banner image 1') }}</label>
    {!! Form::mediaImage('banner_image_1', Arr::get($attributes, 'banner_image_1')) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Banner image 2') }}</label>
    {!! Form::mediaImage('banner_image_2', Arr::get($attributes, 'banner_image_2')) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Banner image 3') }}</label>
    {!! Form::mediaImage('banner_image_3', Arr::get($attributes, 'banner_image_3')) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Button primary label') }}</label>
    <input name="button_primary_label" value="{{ Arr::get($attributes, 'button_primary_label') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Button primary URL') }}</label>
    <input name="button_primary_url" value="{{ Arr::get($attributes, 'button_primary_url') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Button secondary label') }}</label>
    <input name="button_secondary_label" value="{{ Arr::get($attributes, 'button_secondary_label') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Button secondary URL') }}</label>
    <input name="button_secondary_url" value="{{ Arr::get($attributes, 'button_secondary_url') }}" class="form-control" />
</div>

<div class="mb-3">
    <label for="platform_google_play_logo">{{ __('Google play Logo') }}</label>
    {!! Form::mediaImage('platform_google_play_logo', Arr::get($attributes, 'platform_google_play_logo')) !!}
</div>

<div class="mb-3">
    <label for="platform_google_play_url">{{ __('Google play URL') }}</label>
    <input type="text" id="platform_google_play_url" name="platform_google_play_url" class="form-control" value="{{ Arr::get($attributes, 'platform_google_play_url') }}">
</div>

<div class="mb-3">
    <label for="logo">{{ __('AppleStore Logo') }}</label>
    {!! Form::mediaImage('platform_apple_store_logo', Arr::get($attributes, 'platform_apple_store_logo')) !!}
</div>

<div class="mb-3">
    <label for="platform_apple_store_url">{{ __('Apple store URL') }}</label>
    <input type="text" id="platform_apple_store_url" name="platform_apple_store_url" class="form-control" value="{{ Arr::get($attributes, 'platform_apple_store_url') }}">
</div>

@if (is_plugin_active('ecommerce'))
    <div class="mb-3">
        <label class="form-label">{{ __('Choose customers') }}</label>
        {!! Shortcode::fields()->ids('customer_ids', $attributes, $customers) !!}
    </div>
@endif

<div class="mb-3">
    {!! Shortcode::fields()->tabs([
        'title' => [
            'title' => __('Title'),
            'type' => 'text',
        ],
        'url' => [
            'title' => __('URL'),
            'type' => 'text',
        ],
        'image' => [
            'type' => 'image',
            'title' => __('Image'),
        ],
        'description' => [
            'title' => __('Description'),
            'type' => 'textarea',
        ],
    ], $attributes) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Style') }}</label>
    {!! Form::customSelect('style', [
        'style-1' => __('Style :number', ['number' => 1]),
        'style-2' => __('Style :number', ['number' => 2]),
        'style-3' => __('Style :number', ['number' => 3]),
        'style-4' => __('Style :number', ['number' => 4]),
        'style-5' => __('Style :number', ['number' => 5]),
        'style-6' => __('Style :number', ['number' => 6]),
        'style-7' => __('Style :number', ['number' => 7]),
        'style-8' => __('Style :number', ['number' => 8]),
        'style-9' => __('Style :number', ['number' => 9]),
        'style-10' => __('Style :number', ['number' => 10]),
        'style-11' => __('Style :number', ['number' => 11]),
    ], Arr::get($attributes, 'style')) !!}
</div>
