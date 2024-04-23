<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Subtitle') }}</label>
    <input name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Icon image') }}</label>
    {!! Form::mediaImage('icon_image', Arr::get($attributes, 'icon_image')) !!}
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
    <label class="form-label">{{ __('Style') }}</label>
    {!! Form::customSelect('style', [
        'style-1'  => __('Style :number', ['number' => 1]),
        'style-2'  => __('Style :number', ['number' => 2]),
    ], Arr::get($attributes, 'style')) !!}
</div>

{!! Shortcode::fields()->tabs([
        'title' => [
            'title' => __('Title'),
        ],
        'subtitle' => [
            'title' => __('Subtitle'),
        ],
        'payment_cycle' => [
            'title' => __('Payment cycle'),
        ],
        'icon_image' => [
            'type' => 'image',
            'title' => __('Icon image'),
        ],
        'month_price' => [
            'title' => __('Month price'),
        ],
        'year_price' => [
            'title' => __('Year price'),
        ],
        'button_label' => [
            'title' => __('Button label'),
            'placeholder' => __('Button label'),
        ],
        'button_url' => [
            'title' => __('Button URL'),
            'placeholder' => __('Button URL'),
        ],
        'checked' => [
            'title' => __('Checked list'),
            'placeholder' => __('Enter a list with checked, separated by semicolons'),
        ],
        'uncheck' => [
            'title' => __('Uncheck list'),
            'placeholder' => __('Enter a list with unchecked, separated by semicolons'),
        ],
        'active' => [
            'type' => 'checkbox',
            'title' => __('Is active?'),
        ],
    ], $attributes) !!}
