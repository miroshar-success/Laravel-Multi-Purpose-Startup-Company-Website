<section class="section mt-40 overflow-hidden">
    <div class="container featured-post">
        <div class="row">
            <div class="col-lg-12 text-center">
                @if ($title = $shortcode->title)
                    <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($title) !!}</h2>
                @endif
            </div>
        </div>
        @if ($categories->isNotEmpty())
            <div class="mt-30 mb-60">
                <ul class="list-buttons">
                    @foreach($categories as $category)
                        <li class="wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->index * 2 }}s">
                            <a @class(['button-click btn-category', 'active' => $loop->first]) data-action="{{ route('public.ajax.posts', $category->id) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="position-relative">
                <div class="loading-featured-blog" style="display:none;">
                    <div class="box-list-blog-loading position-absolute"></div>
                    <div class="backdrop-box-list-blogs"></div>
                </div>
                <div class="box-list-blogs">
                    @php
                        $firstCategory = $categories->first();
                        $firstCategory->loadMissing([
                            'posts' => function ($query) {
                                $query->orderByDesc('created_at')->limit(6);
                            },
                        ]);
                    @endphp
                    {!! Theme::partial('posts.posts', ['posts' => $firstCategory->posts]) !!}
                </div>
            </div>
        @endif
    </div>
</section>

