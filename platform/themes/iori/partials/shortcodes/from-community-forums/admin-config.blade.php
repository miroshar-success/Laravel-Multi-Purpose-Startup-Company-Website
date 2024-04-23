<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Subtitle') }}</label>
    <input name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" />
</div>

{!! Shortcode::fields()->tabs([
       'title' => [
           'title' => __('Title'),
       ],
       'description' => [
           'title' => __('Description')
       ],
       'image' => [
           'title' => __('Image'),
           'type' => 'image'
       ],
       'topics' => [
           'title' => __('Topics')
       ],
       'comments' => [
           'title' => __('Comments')
       ],
       'account' => [
            'title' => __('Account'),
            'type' => 'select',
            'options' => $teams
        ]
   ], $attributes) !!}
