<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Subtitle') }}</label>
    <input name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" />
</div>

<div class="mb-3">
    {!! Shortcode::fields()->tabs([
        'title' => [
            'title' => __('Title'),
            'type' => 'text',
        ],
        'description' => [
            'title' => __('Description'),
            'type' => 'text',
        ],
        'image' => [
            'title' => __('Image'),
            'type' => 'image',
        ],
        'action' => [
            'title' => __('Action'),
            'type' => 'text',
        ],
        'label' => [
            'title' => __('Label'),
            'type' => 'text',
        ],
    ], $attributes) !!}
</div>

<div class="mb-3 mt-3">
    <label class="form-label">{{ __('Style') }}</label>
    {!! Form::customSelect('style', [
        'style-1' => __('Style :number', ['number' => 1]),
        'style-2' => __('Style :number', ['number' => 2]),
        'style-3' => __('Style :number', ['number' => 3]),
        'style-4' => __('Style :number', ['number' => 4]),
    ], Arr::get($attributes, 'style')) !!}
</div>
