<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Subtitle') }}</label>
    <input name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" />
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
        'description' => [
            'title' => __('Description'),
            'type' => 'textarea',
        ],
    ], $attributes) !!}
</div>
