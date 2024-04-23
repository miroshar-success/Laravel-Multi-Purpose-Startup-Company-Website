<div class="mb-3">
    <label class="form-label" for="logo">{{ __('Logo') }}</label>
    {!! Form::mediaImage('logo', Arr::get($config, 'logo')) !!}
</div>

<div class="mb-3">
    <label class="form-label" for="widget-name">{{ __('URL') }}</label>
    <input type="text" id="url" name="url" class="form-control" value="{{ Arr::get($config, 'url') }}">
</div>

<div class="mb-3">
    <label class="form-label" for="address">{{ __('Address') }}</label>
    <textarea id="address" class="form-control" name="address">{{ Arr::get($config, 'address') }}</textarea>
</div>

<div class="mb-3">
    <label>{{ __('Working hours') }}</label>
    <textarea id="working_hours" class="form-control" name="working_hours">{{ Arr::get($config, 'working_hours') }}</textarea>
</div>

