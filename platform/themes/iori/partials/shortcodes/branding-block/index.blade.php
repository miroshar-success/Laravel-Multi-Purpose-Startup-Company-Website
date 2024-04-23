@php
    $style = in_array($shortcode->style, ['style-1', 'style-2', 'style-3', 'style-4', 'style-5']) ? $shortcode->style : 'style-1';
@endphp

{!! Theme::partial('shortcodes.branding-block.styles.' . $style, compact('shortcode', 'tabs')) !!}
