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
        @if ($categories->count() > 0)
            <div class="mt-50 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                <ul class="list-partners list-partners-left text-start">
                    @foreach($categories as $category)
                        <li>
                            <a href="{{ $category->url }}">
                                <img src="{{ RvMedia::getImageUrl($category->image) }}" alt="{{ $category->name }}">
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</section>
