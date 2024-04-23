<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Subtitle') }}</label>
    <input name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Description') }}</label>
    <input name="description" value="{{ Arr::get($attributes, 'description') }}" class="form-control" />
</div>

<div class="mb-3">
    {!! Shortcode::fields()->tabs([
        'title' => [
            'title' => __('Title'),
            'type' => 'text',
        ],
        'image' => [
            'title' => __('Image'),
            'type' => 'image'
        ],
        'data' => [
            'title' => __('Data'),
            'type' => 'number',
        ],
        'unit' => [
            'title' => __('Unit'),
            'type' => 'text',
        ],
    ], $attributes) !!}
</div>
