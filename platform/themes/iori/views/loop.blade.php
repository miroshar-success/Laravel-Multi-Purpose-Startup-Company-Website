<div class="row">
    @if($posts->isNotEmpty())
        @foreach($posts as $post)
            <div class="col-lg-4 col-md-4 mb-30 item-article featured wow animate__animated" >
                {!! Theme::partial('posts.item', compact('post')) !!}
            </div>
        @endforeach

        @if ($posts instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
            <div class="text-center mt-30">
                {!! $posts->withQueryString()->links(Theme::getThemeNamespace('partials.pagination')) !!}
            </div>
        @endif
    @else
        <p class="text-center">{{ __('No data available') }}</p>
    @endif
</div>
