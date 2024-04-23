<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Description') }}</label>
    <textarea class="form-control" name="description">{{ Arr::get($attributes, 'description') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Button label') }}</label>
    <input name="button_label" value="{{ Arr::get($attributes, 'button_label') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Button URL') }}</label>
    <input name="button_url" value="{{ Arr::get($attributes, 'button_url') }}" class="form-control" />
</div>

<div class="mb-3">
    {!! Shortcode::fields()->tabs([
        'title' => [
            'title' => __('Title'),
            'type' => 'text',
        ],
        'image' => [
            'type'  => 'image',
            'title' => __('Image'),
        ],
        'description' => [
            'title' => __('Description'),
            'type' => 'textarea',
        ],
    ], $attributes) !!}
</div>
