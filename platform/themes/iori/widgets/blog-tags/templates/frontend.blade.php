@if (is_plugin_active('blog'))
    @php
        $limit = (int) Arr::get($config, 'limit', 10);
        $type = Arr::get($config, 'type');

        if ($limit > 0) {
            $tags = get_popular_tags($limit);
        } else {
            $tags = get_all_tags();
        }
    @endphp

    @if ($tags->isNotEmpty())
        <div class="card tag-sidebar">
            @if ($title = $config['name'])
                <p class="title-tag-sidebar">{{ $title }}</p>
            @endif
            <div class="card-content p-4">
                @foreach($tags as $tag)
                    <a class="btn btn-border mr-10 mb-10 btn-tag" href="{{ $tag->url }}">{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>
    @endif
@endif
