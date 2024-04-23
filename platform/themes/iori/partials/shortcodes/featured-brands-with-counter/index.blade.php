<section class="section mt-50">
    <div class="container">
        <div class="row mt-50 align-items-end">
            <div class="col-xl-4 col-lg-4 mb-30">
                @if ($title = $shortcode->title)
                    <h4 class="color-brand-1 mb-5 wow animate__animated animate__fadeInUp">{!! BaseHelper::clean($title) !!}</h4>
                @endif

                @if (count($counters) > 0)
                    <div class="row">
                        @foreach($counters as $counter)
                            @if ($counter['name'] && $counter['number'])
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 mt-20">
                                    <h2 class="color-brand-1"><span class="count">{{ $counter['number'] }}</span><span>+</span></h2>
                                    <p class="font-lg color-brand-1">{{ $counter['name'] }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif

            </div>
            @if (count($brands) > 0)
                <div class="col-xl-8 col-lg-8 mb-30">
                    <ul class="list-partners list-partners-2 text-start">
                        @foreach ($brands as $brand)
                            @continue(! $brand['image'])
                            <li class="wow animate__animated animate__fadeInUp" data-wow-delay=".{{ $loop->index }}s">
                                @if ($brand['url'])
                                    <a title="{{ $brand['title'] }}" href="{{ $brand['url'] }}" @if ($brand['is_open_new_tab'] == 'yes') target="_blank" @endif>
                                        <img src="{{ RvMedia::getImageUrl($brand['image']) }}" alt="{{ $brand['title'] }}">
                                    </a>
                                @else
                                    <img src="{{ RvMedia::getImageUrl($brand['image']) }}" alt="{{ $brand['title'] }}">
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</section>
