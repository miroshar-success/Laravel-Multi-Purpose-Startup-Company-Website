<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Subtitle') }}</label>
    <input name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Image') }}</label>
    {!! Form::mediaImage('image', Arr::get($attributes, 'image')) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Image icon primary') }}</label>
    {!! Form::mediaImage('image_icon_primary', Arr::get($attributes, 'image_icon_primary')) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Image icon secondary') }}</label>
    {!! Form::mediaImage('image_icon_secondary', Arr::get($attributes, 'image_icon_secondary')) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Style') }}</label>
    {!! Form::customSelect('style', [
        'style-1' => __('Style :number', ['number' => 1]),
        'style-2' => __('Style :number', ['number' => 2]),
    ], Arr::get($attributes, 'style')) !!}
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
    ], $attributes) !!}
</div>
