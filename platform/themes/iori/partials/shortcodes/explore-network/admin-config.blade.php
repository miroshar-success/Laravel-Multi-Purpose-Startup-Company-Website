<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Subtitle') }}</label>
    <input name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" />
</div>

<div class="mb-3">
    {!! Shortcode::fields()->tabs([
        'key' => [
            'title' => __('Key'),
            'type' => 'text',
        ],
        'title' => [
            'title' => __('Title'),
            'type' => 'text',
        ],
        'subtitle' => [
            'title' => __('Subtitle'),
            'type' => 'text',
        ],
        'description' => [
            'title' => __('Description'),
            'type' => 'textarea',
        ],
        'image' => [
            'title' => __('Image'),
            'type' => 'image'
        ],
        'checklists' => [
            'title' => __('Checklists'),
            'placeholder' => __('Task1, Task2,...'),
            'type' => 'text',
        ],
    ], $attributes) !!}
</div>
