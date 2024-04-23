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
    <textarea name="description" class="form-control">{{ Arr::get($attributes, 'description') }}</textarea>
</div>

@foreach(range(1, 3) as $i)
    <div class="mb-3">
        <label class="form-label">{{ __('Image :number', ['number' => $i]) }}</label>
        {!! Form::mediaImage('image_' . $i, Arr::get($attributes, 'image_' . $i)) !!}
    </div>
@endforeach

<div class="mb-3">
    <label class="form-label">{{ __('Choose testimonials') }}</label>
    {!! Shortcode::fields()->ids('testimonial_ids', $attributes, $testimonials) !!}
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
