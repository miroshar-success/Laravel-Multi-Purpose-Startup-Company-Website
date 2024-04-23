<div class="mb-3">
    <label class="form-label">{{ __('Google play logo') }}</label>
    {!! Form::mediaImage('google_play_logo', Arr::get($attributes, 'google_play_logo')) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Google play URL') }}</label>
    <input name="google_play_url" value="{{ Arr::get($attributes, 'google_play_url') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Apple store logo') }}</label>
    {!! Form::mediaImage('apple_store_logo', Arr::get($attributes, 'apple_store_logo')) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Apple store URL') }}</label>
    <input name="apple_store_url" value="{{ Arr::get($attributes, 'apple_store_url') }}" class="form-control" />
</div>

<div class="mb-3">
    {!! Shortcode::fields()->tabs([
        'title' => [
            'title' => __('Title'),
            'type' => 'text',
        ],
        'description' => [
            'title' => __('Description'),
            'type' => 'textarea',
        ],
        'image' => [
            'title' => __('Image'),
            'type' => 'image'
        ],
    ], $attributes) !!}
</div>
