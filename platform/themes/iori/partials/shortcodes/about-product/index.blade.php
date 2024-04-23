<section>
    <div class="row align-items-center">
        <div class="col-lg-1"></div>
        <div class="col-lg-5 mb-30">
            <div class="box-info-collection pl-0">
                @if ($title = $shortcode->title)
                    <h3 class="color-brand-1 mb-25">{!! BaseHelper::clean($title) !!}</h3>
                @endif

                @if ($description = $shortcode->description)
                    <p class="font-md color-grey-500 mb-10">{!! BaseHelper::clean($description) !!}</p>
                @endif
                <div class="mt-20"></div>
                <ul class="list-ticks">
                    @foreach($tabs as $tab)
                        <li>
                            <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            {{ $tab['title'] }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-lg-5 mb-30">
            @if ($image = $shortcode->image)
                <div class="img-reveal">{{ RvMedia::image($image, $shortcode->title) }}</div>
            @endif
        </div>
    </div>
</section>
