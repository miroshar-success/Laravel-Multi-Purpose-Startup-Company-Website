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
    <label class="form-label">{{ __('Show newsletter form?') }}</label>
    {!! Form::onOff('show_newsletter_form', Arr::get($attributes, 'show_newsletter_form')) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Subtitle platform') }}</label>
    <input name="subtitle_platform" value="{{ Arr::get($attributes, 'subtitle_platform') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Google play logo') }}</label>
    {!! Form::mediaImage('google_play_logo', Arr::get($attributes, 'google_play_logo')) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Google play URL') }}</label>
    <input name="google_play_url" value="{{ Arr::get($attributes, 'google_play_url') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Apple store logo') }}</label>
    {!! Form::mediaImage('apple_store_logo', Arr::get($attributes, 'apple_store_logo')) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Apple Store URL') }}</label>
    <input name="apple_store_url" value="{{ Arr::get($attributes, 'apple_store_url') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Button URL') }}</label>
    <input name="button_url" value="{{ Arr::get($attributes, 'button_url') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Button label') }}</label>
    <input name="button_label" value="{{ Arr::get($attributes, 'button_label') }}" class="form-control" />
</div>
