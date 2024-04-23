@php
    $footerMenu = (bool) $sidebar == 'footer_menu';
@endphp

@if ($footerMenu)
    <div class="col-lg-3 width-16 mb-30">
        @endif
        @if ($name = Arr::get($config, 'name'))
            <h5 class="mb-10 color-brand-1">{!! BaseHelper::clean($name) !!}</h5>
        @endif

        @if ($content = Arr::get($config, 'content'))
            <div class="font-md mb-20 color-grey-400">
                {!! BaseHelper::clean($content) !!}
            </div>
        @endif
        @if($footerMenu)
    </div>
@endif
