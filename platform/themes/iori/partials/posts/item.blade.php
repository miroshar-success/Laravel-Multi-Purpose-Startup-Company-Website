<div class="card-blog-grid card-blog-grid-3 hover-up">
    <div class="card-image">
        <a href="{{ $post->url }}">
            <img
                src="{{ RvMedia::getImageUrl($post->image, 'large') }}"
                alt="{{ $post->name }}"
            >
        </a>
        @if($category = $post->firstCategory)
            <a href="{{ $category->url }}" title="{{ $category->name }}">
                <span class="lbl-border">{{ $category->name }}</span>
            </a>
        @endif
    </div>
    <div class="card-info"><a href="{{ $post->url }}">
            <h4 class="color-brand-1">{{ $post->name }}</h4>
        </a>
        <div class="mb-25 mt-10"><span
                class="font-xs color-grey-500">{{ $post->created_at->translatedFormat('Y M d') }}</span>
            <span
                class="font-xs color-grey-500 icon-read">{{ __(':number mins read', ['number' => number_format(strlen(strip_tags($post->content)) / 300)]) }}</span>
        </div>
        <p class="font-sm color-grey-500 mt-20">{{ Str::limit($post->description, 120) }}</p>
    </div>
</div>
