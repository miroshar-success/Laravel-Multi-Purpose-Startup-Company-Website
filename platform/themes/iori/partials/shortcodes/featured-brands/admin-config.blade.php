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
        'image' => [
            'title' => __('Image'),
            'type' => 'image',
        ],
        'url' => [
            'title' => __('URL'),
            'type' => 'text',
        ],
        'is_open_new_tab' => [
            'title' => __('Is open new tab?'),
            'type' => 'checkbox',
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
    ], Arr::get($attributes, 'style')) !!}
</div>
