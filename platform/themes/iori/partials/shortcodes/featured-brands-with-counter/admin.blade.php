<section>
    <div class="form-group">
        <label class="control-label">{{ __('Title') }}</label>
        <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Subtitle') }}</label>
        <input name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" />
    </div>

    <div class="mb-3 p-3" style="border: 1px black solid">
        <h5 class="control-label mb-2">{{ __('Counter') }}</h5>
        {!! Shortcode::fields()->tabs([
            'number' => [
                'title' => __('Number'),
                'type' => 'text',
            ],
            'name' => [
                'title' => __('Name'),
                'type' => 'text',
            ],
        ], $attributes) !!}
    </div>

    <div class="mb-3 p-3" style="border: 1px black solid">
        <h5 class="control-label mb-2">{{ __('Brands') }}</h5>
        {!! Shortcode::fields()->tabs([
            'title' => [
                'title' => __('Title'),
                'type' => 'text',
            ],
            'image' => [
                'title' => __('Image'),
                'type' => 'image',
            ],
            'url' => [
                'title' => __('URL'),
                'type' => 'text',
            ],
            'is_open_new_tab' => [
                'title' => __('Is open new tab?'),
                'type' => 'checkbox',
            ],
        ], $attributes) !!}
    </div>
</section>
