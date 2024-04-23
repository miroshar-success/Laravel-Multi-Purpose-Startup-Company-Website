<div class="mt-50">
    <div class="row mb-50">
        <div class="col-lg-12 text-center">
            <h2 class="color-brand-1 mb-20 wow animate__ animate__fadeIn animated" data-wow-delay=".0s">{{ $tag->name }}</h2>
        </div>
        <div class="row px-50">
            <p class="font-lg color-grey-500 text-center">{{ $tag->description }}</p>
        </div>
    </div>

    <div class="row">
        @if ($posts->isNotEmpty())
            @foreach($posts as $post)
                <div class="col-lg-4 col-md-4 mb-30 item-article featured wow animate__animated">
                    {!! Theme::partial('posts.item', compact('post')) !!}
                </div>
            @endforeach
            <div class="text-center">
                {!! $posts->withQueryString()->links(Theme::getThemeNamespace('partials.pagination')) !!}
            </div>
        @else
            <div class="text-center">{{ __('No data available') }}</div>
        @endif
    </div>
</div>
