@if (is_plugin_active('ecommerce'))
    <section>
        <div class="mb-3">
            <label class="form-label" for="widget-title">{{ __('Title') }}</label>
            <input type="text" id="widget-title" class="form-control" name="title" value="{{ $config['title'] }}">
        </div>

        <div class="mb-3">
            <label class="form-label" for="widget-subtitle">{{ __('Subtitle') }}</label>
            <input type="text" id="widget-subtitle" class="form-control" name="subtitle" value="{{ $config['subtitle'] }}">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('Image primary') }}</label>
            {!! Form::mediaImage('image_primary', Arr::get($config, 'image_primary')) !!}
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('Image secondary') }}</label>
            {!! Form::mediaImage('image_secondary', Arr::get($config, 'image_secondary')) !!}
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('Choose categories') }}</label>
            <select class="select-full" name="category_ids[]" multiple>
                @foreach($categories as $category)
                    <option @selected(in_array($category->id, $categoryIds)) value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </section>
@endif
