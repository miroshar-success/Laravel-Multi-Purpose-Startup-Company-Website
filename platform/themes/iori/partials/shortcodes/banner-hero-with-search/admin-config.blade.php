<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Subtitle') }}</label>
    <input name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Suggested') }}</label>
    <input name="suggested" value="{{ Arr::get($attributes, 'suggested') }}" placeholder="invoice, security" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Description') }}</label>
    <input name="description" value="{{ Arr::get($attributes, 'description') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Image 1') }}</label>
    {!! Form::mediaImage('image_1', Arr::get($attributes, 'image_1')) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Image 2') }}</label>
    {!! Form::mediaImage('image_2', Arr::get($attributes, 'image_2')) !!}
</div>
