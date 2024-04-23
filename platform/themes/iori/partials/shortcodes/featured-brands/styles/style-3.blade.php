<div class="section bg-grey-80 pt-40 pb-40">
    <div class="container">
        @if (count($tabs) > 0)
            <ul class="list-partners">
                @foreach($tabs as $tab)
                    @continue(! $tab['image'])
                    <li class="wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                        @if ($tab['url'])
                            <a title="{{ $tab['title'] }}" href="{{ $tab['url'] }}" @if ($tab['is_open_new_tab'] == 'yes') target="_blank" @endif>
                                {{ RvMedia::image($tab['image'], $tab['title']) }}
                            </a>
                        @else
                            {{ RvMedia::image($tab['image'], $tab['title']) }}
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif

    </div>
</div>
