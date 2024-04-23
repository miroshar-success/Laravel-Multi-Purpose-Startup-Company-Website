<div class="col-lg-3 width-16 mb-30">
    @if ($name = Arr::get($config, 'name'))
        <h5 class="mb-10 color-brand-1">{!! BaseHelper::clean($name) !!}</h5>
    @endif
    <ul class="menu-footer">
        @foreach($items as $item)
            @if (($label = $item->label) && ($url = $item->url))
                <li>
                    <a href="{{ url($url) }}"
                       @if ($item->is_open_new_tab) target="_blank" @endif
                       {!! $item->attributes ? BaseHelper::clean($item->attributes) : null !!}
                       title="{{ $label}}"
                    >
                        {!! BaseHelper::clean($label) !!}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>

