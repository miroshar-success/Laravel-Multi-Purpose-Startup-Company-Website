<div class="mb-3">
    <label class="form-label" for="widget-name">{{ __('Name') }}</label>
    <input type="text" class="form-control" name="name" value="{{ Arr::get($config, 'mame') }}">
</div>

<div class="mb-3">
    <label class="form-label" for="limit">{{ __('Limit') }}</label>
    <input type="number" class="form-control" name="limit" value="{{ Arr::get($config, 'limit', 5) }}" placeholder="{{ __('Number tags to show, leave empty to show all') }}">
</div>
