<div class="section bg-grey-80 pt-40 pb-40">
    <div class="container">
        @if ($categories->count() > 0)
            <ul class="list-partners">
                @foreach($categories as $category)
                    <li class="wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                        <a href="{{ $category->url }}">
                            <img src="{{ RvMedia::getImageUrl($category->image) }}" alt="{{ $category->name }}">
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif

    </div>
</div>
