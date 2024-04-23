<ul class="menu-footer">
    @foreach($menu_nodes->loadMissing('metadata') as $item)
        <li @if ($item->css_class) class="{{ $item->css_class }}" @endif>
            <a href="{{ url($item->url) }}" @if ($item->target !== '_self') target="{{ $item->target }}" @endif title="{{ $item->title }}">{{ $item->title }}</a>
        </li>
    @endforeach
</ul>
