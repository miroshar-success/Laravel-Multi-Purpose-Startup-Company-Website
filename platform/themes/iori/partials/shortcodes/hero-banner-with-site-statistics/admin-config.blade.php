<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Subtitle') }}</label>
    <input name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" />
</div>

<div class="mb-3">
    <lable class="form-label">{{ __('Description') }}</lable>
    <textarea class="form-control" name="description" rows="3">{{ Arr::get($attributes, 'description') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Banner') }}</label>
    {!! Form::mediaImage('banner_image', Arr::get($attributes, 'banner_image')) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Button primary URL') }}</label>
    <input name="button_primary_url" value="{{ Arr::get($attributes, 'button_primary_url') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Button primary label') }}</label>
    <input name="button_primary_label" value="{{ Arr::get($attributes, 'button_primary_label') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Button secondary URL') }}</label>
    <input name="button_secondary_url" value="{{ Arr::get($attributes, 'button_secondary_url') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Button primary label') }}</label>
    <input name="button_secondary_label" value="{{ Arr::get($attributes, 'button_secondary_label') }}" class="form-control" />
</div>

<div class="mb-3">
    {!! Shortcode::fields()->tabs([
        'title' => [
            'title' => __('Title'),
            'type' => 'text',
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
