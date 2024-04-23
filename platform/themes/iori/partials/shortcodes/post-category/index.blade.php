@php
    $style = in_array($shortcode->style, ['style-1', 'style-2']) ? $shortcode->style : 'style-1';
@endphp

{!! Theme::partial('shortcodes.post-category.styles.' . $style, compact('shortcode', 'category')) !!}
