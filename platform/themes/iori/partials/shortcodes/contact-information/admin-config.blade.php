<div class="mb-3">
    {!! Shortcode::fields()->tabs([
        'title' => [
            'title' => __('Title'),
            'type' => 'text',
        ],
        'email' => [
            'title' => __('Email'),
            'placeholder' => 'admin@example.com, admin1@example.com',
            'type' => 'text',
        ],
        'phone' => [
            'title' => __('Phone'),
            'placeholder' => '01234567890, 01234567891',
            'type' => 'text',
        ],
        'description' => [
            'title' => __('Description'),
            'type' => 'textarea',
        ],
        'image' => [
            'type'  => 'image',
            'title' => __('Image'),
        ],
    ], $attributes) !!}
</div>
