<div class="mb-3 mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />

    <div class="mb-3 mb-3">
        <label class="form-label">{{ __('Style') }}</label>
        {!! Form::customSelect('style', [
            'style-1'  => __('Style :number', ['number' => 1]),
            'style-2'  => __('Style :number', ['number' => 2]),
        ], Arr::get($attributes, 'style')) !!}
    </div>
</div>

<div class="mb-3">
    {!! Shortcode::fields()->tabs([
        'title' => [
            'title' => __('Title'),
            'type' => 'text',
        ],
        'icon_image' => [
            'type'  => 'image',
            'title' => __('Icon image'),
            'type' => 'text',
        ],
        'description' => [
            'title' => __('Description'),
            'type' => 'text',
        ],
        'label' => [
            'title' => __('Button label'),
            'type' => 'text',
        ],
        'url' => [
            'title' => __('Button URL'),
            'type' => 'text',
        ],
        'type' => [
           'type' => 'select',
           'title' => __('Type'),
           'options' => [
               'personal' => __('Personal'),
               'enterprise' => __('Enterprise'),
            ]
        ],
    ], $attributes) !!}
</div>
