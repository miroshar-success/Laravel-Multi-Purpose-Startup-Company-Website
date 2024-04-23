<dl class="accordionHeaderWrap">
    @foreach($menu_nodes->loadMissing('metadata') as $key => $row)
        @if ($row->has_child)
            <div class="block mb-[23px]">
                <dt class="accordion"><span class="text-base text-first-brand font-medium">{{ $row->title }}</span></dt>
                <dd class="accordionBox mt-3" >
                    <div class="flex flex-col">
                        @foreach($row->child as $item)
                            <a class="text-gray-900 py-3 pl-3 font-medium text-[14px] leading-[24px]" href="{{ url($item->url) }}" @if ($item->target !== '_self') target="{{ $item->target }}" @endif title="{{ $item->title }}">{{ $item->title }}</a>
                        @endforeach
                    </div>
                </dd>
            </div>
        @else
            <a class="text-base text-first-brand font-medium" href="{{ url($item->url) }}" @if ($item->target !== '_self') target="{{ $item->target }}" @endif title="{{ $item->title }}">{{ $row->title }}</a>
        @endif
    @endforeach
</dl>
