<div class="mb-3">
    {!! Shortcode::fields()->tabs([
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
    ], $attributes) !!}
</div>
