@if (is_plugin_active('blog'))
    @php
        $limit = (int) Arr::get($config, 'limit', 10);
        $type = Arr::get($config, 'type');

        if ($limit > 0) {
            $categories = get_popular_categories($limit);
        } else {
            $categories = get_all_categories();
        }
    @endphp

    @if ($categories->isNotEmpty())
        <div class="card category-sidebar">
            @if ($title = $config['name'])
                <p class="title-category-sidebar">{{ $title }}</p>
            @endif
            <div class="card-content p-4">
                <ul>
                    @foreach($categories as $category)
                        <li class="category">
                            <b><a href="{{ $category->url }}">{{ $category->name }}</a></b>
                            <span class="category-count">{{ number_format($category->posts_count) }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
@endif
