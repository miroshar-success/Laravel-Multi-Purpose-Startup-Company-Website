<ul {!! BaseHelper::clean($options) !!}>
    @foreach($menu_nodes->loadMissing('metadata') as $item)
        <li class="font-sm color-grey-300">
            <a href="{{ url($item->url) }}" @if ($item->target !== '_self') target="{{ $item->target }}" @endif title="{{ $item->title }}">{{ $item->title }}</a>
        </li>
    @endforeach
</ul>
