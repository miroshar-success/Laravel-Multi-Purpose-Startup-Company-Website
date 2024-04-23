<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Description') }}</label>
    <textarea name="description" class="form-control">{{ Arr::get($attributes, 'description') }}</textarea>
</div>

<div class="border p-2">
    <h5 class="form-label mb-2">{{ __('Block left') }}</h5>
    <div class="mb-3">
        <label class="form-label">{{ __('Title') }}</label>
        <input name="block_left_title" value="{{ Arr::get($attributes, 'block_left_title') }}" class="form-control" />
    </div>

    <div class="mb-3">
        <label class="form-label">{{ __('Description') }}</label>
        <input name="block_left_description" value="{{ Arr::get($attributes, 'block_left_description') }}" class="form-control" />
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
        <label class="form-label">{{ __('Image') }}</label>
        {!! Form::mediaImage('block_left_image', Arr::get($attributes, 'block_left_image')) !!}
    </div>
</div>
<div class="border mt-4 p-2">
    <h5 class="form-label mb-2">{{ __('Block right') }}</h5>
    <div class="mb-3">
        <label class="form-label">{{ __('Title') }}</label>
        <input name="block_right_title" value="{{ Arr::get($attributes, 'block_right_title') }}" class="form-control" />
    </div>

    <div class="mb-3">
        <label class="form-label">{{ __('Description') }}</label>
        <input name="block_right_description" value="{{ Arr::get($attributes, 'block_right_description') }}" class="form-control" />
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
        <label class="form-label">{{ __('Image') }}</label>
        {!! Form::mediaImage('block_right_image', Arr::get($attributes, 'block_left_image')) !!}
    </div>
</div>
