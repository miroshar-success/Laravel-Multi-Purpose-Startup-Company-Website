<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {!! Theme::partial('header-meta') !!}

    {!! Theme::header() !!}
</head>
<body @if (BaseHelper::isRtlEnabled()) dir="rtl" @endif>

    {!! Theme::content() !!}

</body>
</html>
