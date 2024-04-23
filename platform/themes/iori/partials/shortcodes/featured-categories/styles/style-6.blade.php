<section class="section mt-50">
    <div class="container">
        <div class="row mt-50 align-items-end">
            <div class="col-xl-4 col-lg-4 mb-30">
                @if ($title = $shortcode->title)
                    <h4 class="color-brand-1 mb-5 wow animate__animated animate__fadeInUp">{!! BaseHelper::clean($title) !!}</h4>
                @endif
                <div class="row">
                    @foreach($tabs as $tab)
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 mt-20">
                            <h2 class="color-brand-1"><span class="count">{{ $tab['data'] }}</span><span>{{ $tab['unit'] }}</span></h2>
                            <p class="font-lg color-brand-1">{{ $tab['title'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            @if ($categories->count() > 0)
                <div class="col-xl-8 col-lg-8 mb-30">
                    <ul class="list-partners list-partners-2 text-start">
                        @foreach ($categories as $category)
                            <li class="wow animate__animated animate__fadeInUp" data-wow-delay=".{{ $loop->index }}s">
                                <a href="{{ $category->url }}">
                                    <img src="{{ RvMedia::getImageUrl($category->image) }}" alt="{{ $category->title }}">
                                    {{ $category->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</section>
