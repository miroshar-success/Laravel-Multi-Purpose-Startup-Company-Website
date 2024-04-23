@if (is_plugin_active('ecommerce'))
    <div class="mb-3">
        <label>{{ trans('core/base::forms.name') }}</label>
        <input type="text" class="form-control" name="name" value="{{ $config['name'] }}">
    </div>

    <div class="mb-3">
        <label>{{ __('Number of display') }}</label>
        <input type="number" class="form-control" name="number_of_display" value="{{ $config['number_of_display'] }}">
    </div>

    <div class="mb-3">
        <label class="form-label">{{ __('Type') }}</label>
        {!! Form::customSelect('type', [
                'popular'   => __('Trending'),
                'on_sale'   => __('On sale'),
                'featured'  => __('Featured'),
            ], Arr::get($config, 'type')) !!}
    </div>
@endif
