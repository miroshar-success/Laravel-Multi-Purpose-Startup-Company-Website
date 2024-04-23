<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" placeholder="{{ __('Title') }}"/>
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Subtitle') }}</label>
    <input name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" placeholder="{{ __('Subtitle') }}" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Description') }}</label>
    <textarea class="form-control" rows="3" placeholder="{{ __('Description') }}" name="description">{{ Arr::get($attributes, 'description') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Image 1') }}</label>
    {!! Form::mediaImage('image_1', Arr::get($attributes, 'image_1')) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Image 2') }}</label>
    {!! Form::mediaImage('image_2', Arr::get($attributes, 'image_2')) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Choose testimonials') }}</label>
    <select class="select-full" name="testimonial_id">
        @foreach($testimonials as $testimonial)
            <option @selected($testimonial->id === Arr::get($attributes, 'testimonial_id')) value="{{ $testimonial->id }}">{{ $testimonial->name }}</option>
        @endforeach
    </select>
</div>
