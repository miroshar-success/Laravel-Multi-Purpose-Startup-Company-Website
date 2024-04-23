<div class="section home12-logos">
    <div class="container">
        <ul class="lists-logo">
            @foreach ($categories as $category)
                <li class="wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->index }}s">
                    <a href="{{ $category->url }}"><img src="{{ RvMedia::getImageUrl($category->image) }}" alt="{{ $category->name }}"></a>
                </li>
            @endforeach
    </div>
</div>
