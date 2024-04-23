<div class="section">
    <div class="container">
        @if ($categories->count() > 0)
            <div class="mt-40">
                <ul class="list-partners wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                    @foreach($categories as $category)
                        <li><a href="{{ $category->url }}"><img src="{{ RvMedia::getImageUrl($category->image) }}" alt="{{ $category->title }}"></a></li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
