<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Title of feature') }}</label>
    <input name="feature_title" value="{{ Arr::get($attributes, 'feature_title') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Title of free plan') }}</label>
    <input name="free_title" value="{{ Arr::get($attributes, 'free_title') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Title of standard plan') }}</label>
    <input name="standard_title" value="{{ Arr::get($attributes, 'standard_title') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Title of business plan') }}</label>
    <input name="business_title" value="{{ Arr::get($attributes, 'business_title') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Title of enterprise plan') }}</label>
    <input name="enterprise_title" value="{{ Arr::get($attributes, 'enterprise_title') }}" class="form-control" />
</div>

{!! Shortcode::fields()->tabs([
    'title' => [
        'title' => __('Title'),
    ],
    'free' => [
        'title' => __('Free'),
    ],
    'standard' => [
        'title' => __('Standard')
    ],
    'business' => [
        'title' => __('Business')
    ],
    'enterprise' => [
        'title' => __('Enterprise')
    ],
], $attributes) !!}
