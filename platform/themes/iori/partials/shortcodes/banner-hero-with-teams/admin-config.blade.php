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
    <label class="form-label">{{ __('GooglePlay logo') }}</label>
    {!! Form::mediaImage('google_play_logo', Arr::get($attributes, 'google_play_logo')) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('GooglePlay URL') }}</label>
    <input name="google_play_url" value="{{ Arr::get($attributes, 'google_play_url') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('AppleStore logo') }}</label>
    {!! Form::mediaImage('apple_store_logo', Arr::get($attributes, 'apple_store_logo')) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('AppleStore URL') }}</label>
    <input name="apple_store_url" value="{{ Arr::get($attributes, 'apple_store_url') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Choose teams') }}</label>
    {!! Shortcode::fields()->ids('team_ids', $attributes, $teams) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Style') }}</label>
    {!! Form::customSelect('style', [
        'style-1' => __('Style :number', ['number' => 1]),
        'style-2' => __('Style :number', ['number' => 2]),
    ], Arr::get($attributes, 'style')) !!}
</div>
