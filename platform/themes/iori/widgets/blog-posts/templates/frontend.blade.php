@if (is_plugin_active('blog'))
    @php
        $limit = (int) Arr::get($config, 'limit');
        $posts = match (Arr::get($config, 'type')) {
            'recent' => get_recent_posts($limit),
            default => get_popular_posts($limit),
        };
    @endphp

    @switch($config['style'])
        @case('sidebar')
            <div class="card blog-sidebar">
                @if ($title = Arr::get($config, 'title'))
                    <p class="title-blog-sidebar">{{ $title }}</p>
                @endif

                @foreach($posts as $post)
                    <div class="post-item">
                        <a href="{{ $post->url }}">
                            <img class="post-image" src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" alt="{{ $post->name }}"/>
                        </a>
                        <div class="post-meta">
                            <a href="{{ $post->url }}" class="title">{{ $post->name }}</a>
                            <div class="description">
                                @if($author = $post->author)
                                    <img class="avatar-author" src="{{ $author->avatar_url }}" alt="{{ $author->name }}"/>
                                    <span class="name">{!! BaseHelper::clean($author->name) !!}</span>
                                @endif
                                <p class="date">{{ $post->created_at->translatedFormat('M d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @break
        @default
            <div class="section mt-50">
                <div class="container">
                    @if ($title = Arr::get($config, 'title'))
                        <h3 class="color-brand-1">{{ $title }}</h3>
                    @endif
                    <div class="row mt-50">
                        @foreach($posts as $post)
                            <div class="col-lg-4 col-md-6 mb-30 item-article featured wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->index * 2 }}s">
                                {!! Theme::partial('posts.item', ['post' => $post]) !!}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    @endswitch
@endif
