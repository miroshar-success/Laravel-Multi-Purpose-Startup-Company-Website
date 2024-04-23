<div class="bg-white shadow z-1 start-0 position-absolute blog-sidebar search-results-wrapper">
    @foreach ($posts as $post)
        <div class="post-item">
            <a href="{{ $post->url }}">
                <img
                    class="post-image"
                    src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                    alt="{{ $post->name }}"
                />
            </a>
            <div class="post-meta">
                <a
                    href="{{ $post->url }}"
                    class="title"
                >{{ $post->name }}</a>
                <div class="description">
                    @if ($author = $post->author)
                        <img
                            class="avatar-author"
                            src="{{ $author->avatar_url }}"
                            alt="{{ $author->name }}"
                        />
                        <span class="name">{!! BaseHelper::clean($author->name) !!}</span>
                    @endif
                    <p class="date">{{ $post->created_at->translatedFormat('M d, Y') }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
