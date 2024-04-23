<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Subtitle') }}</label>
    <input name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" />
</div>

<div class="mb-3 mb-3">
    <label class="form-label">{{ __('Description') }}</label>
    <textarea name="description" class="form-control">{{ Arr::get($attributes, 'description') }}</textarea>
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
    {!! Shortcode::fields()->tabs([
        'title' => [
            'title' => __('Title'),
            'type' => 'text',
        ],
        'description' => [
            'title' => __('Description'),
            'type' => 'textarea',
        ],
        'icon_image' => [
            'type'  => 'image',
            'title' => __('Icon image'),
        ],
        'label' => [
            'title' => __('Label'),
            'type' => 'text',
        ],
        'url' => [
            'title' => __('URL'),
            'type' => 'text',
        ],
        'display' => [
           'type' => 'select',
           'title' => __('Display'),
           'options' => [
               'show_full' => __('Show full'),
               'show_title' => __('Show title'),
            ],
        ],
    ], $attributes) !!}
</div>
