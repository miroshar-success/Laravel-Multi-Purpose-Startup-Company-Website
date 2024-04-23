<section>
    <div class="container">
        <div class="mt-20 mb-50">
            @if ($title = $shortcode->title)
                <h3 class="color-brand-1 title-line-right line-info">{!! BaseHelper::clean($title) !!}</h3>
            @endif
        </div>
        @if ($category->posts->isNotEmpty())
            {!! Theme::partial('posts.posts', ['posts' => $category->posts]) !!}
        @endif
    </div>
</section>
