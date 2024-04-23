<div class="section">
    <div class="container">
        <div class="box-radius-logo">
            <div class="text-center">
                @if ($title = $shortcode->title)
                    <p class="font-lg color-brand-1 wow animate__animated animate__fadeInUp">{!! BaseHelper::clean($title) !!}</p>
                @endif
            </div>
            @if ($categories->count() > 0)
                <div class="mt-30">
                    <ul class="list-partners wow animate__animated animate__fadeInUp">
                        @foreach($categories as $category)
                            <li><a href="{{ $category->url }}"><img src="{{ RvMedia::getImageUrl($category->image) }}" alt="{{ $category->name }}"></a></li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
