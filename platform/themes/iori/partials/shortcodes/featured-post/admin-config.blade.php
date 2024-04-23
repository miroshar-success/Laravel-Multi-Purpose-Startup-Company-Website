<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Choose categories') }}</label>
    {!! Shortcode::fields()->ids('category_ids', $attributes, $categories) !!}
</div>
