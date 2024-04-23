@if (count($tabs) > 0)
    <div class="section home12-logos">
        <div class="container">
            <ul class="lists-logo">
                @foreach ($tabs as $tab)
                    @continue(! $tab['image'])
                    <li class="wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->index }}s">
                        @if ($tab['url'])
                            <a title="{{ $tab['title'] }}" href="{{ $tab['url'] }}" @if ($tab['is_open_new_tab'] == 'yes') target="_blank" @endif>
                                {{ RvMedia::image($tab['image'], $tab['title']) }}
                            </a>
                        @else
                            {{ RvMedia::image($tab['image'], $tab['title']) }}
                        @endif
                    </li>
            @endforeach
        </div>
    </div>
@endif
