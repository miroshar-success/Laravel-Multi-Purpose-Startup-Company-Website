<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        {!! Theme::partial('header-meta') !!}

        {!! Theme::header() !!}

        @if(theme_option('animation_enabled', 'yes') !== 'yes')
            <style>
                .img-reveal {
                    visibility: visible;
                }
            </style>
        @endif
    </head>
    <body {!! Theme::bodyAttributes() !!}>
        {!! Theme::partial('dropdown-menu-mobile') !!}

        {!! Theme::partial('preloader') !!}

        {!! apply_filters(THEME_FRONT_BODY, null) !!}
        <header>
            {!! Theme::partial('top-navigation') !!}
        </header>
