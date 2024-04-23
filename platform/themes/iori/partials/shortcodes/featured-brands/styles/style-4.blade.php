<section class="section mt-40 mb-30">
    <div class="container">
        <div class="text-start">
            @if($title = $shortcode->title)
                <h3 class="color-brand-1 mb-20 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                    {!! BaseHelper::clean($title) !!}
                </h3>
            @endif

            @if ($subtitle = $shortcode->subtitle)
                <p class="font-lg color-grey-500 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    {!! BaseHelper::clean($subtitle) !!}
                </p>
            @endif
        </div>
        @if (count($tabs) > 0)
            <div class="mt-50 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                <ul class="list-partners list-partners-left text-start">
                    @foreach($tabs as $tab)
                        @continue(! $tab['image'])
                        <li>
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
            </div>
        @endif
    </div>
</section>
