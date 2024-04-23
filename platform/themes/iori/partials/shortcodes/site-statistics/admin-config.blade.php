<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Description') }}</label>
    <textarea class="form-control" name="description">{{ Arr::get($attributes, 'description') }}</textarea>
</div>

<div class="mb-3">
    {!! Shortcode::fields()->tabs([
        'title' => [
            'title' => __('Title'),
        ],
        'data' => [
            'title' => __('Data'),
            'type' => 'number',
        ],
        'unit' => [
            'title' => __('Unit')
        ],
    ], $attributes) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Style') }}</label>
    {!! Form::customSelect('style', [
        'style-1' => __('Style :number', ['number' => 1]),
        'style-2' => __('Style :number', ['number' => 2]),
    ], Arr::get($attributes, 'style')) !!}
</div>
