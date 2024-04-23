<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Category') }}</label>
    {!! Form::customSelect('category_id', $categories->pluck('name', 'id'), Arr::get($attributes, 'category_id')) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Number of post') }}</label>
    <input name="limit" value="{{ Arr::get($attributes, 'limit') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Style') }}</label>
    {!! Form::customSelect('style', [
            'style-1'  => __('Style :number', ['number' => 1]),
            'style-2'  => __('Style :number', ['number' => 2]),
        ], Arr::get($attributes, 'style')) !!}
</div>
