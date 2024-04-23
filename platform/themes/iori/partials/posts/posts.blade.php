<div class="row">
    @forelse($posts as $post)
        <div class="col-lg-4 col-md-4 mb-30 item-article featured wow animate__animated">
            {!! Theme::partial('posts.item', compact('post')) !!}
        </div>
    @empty
        <p class="text-center">{{ __('No data available') }}</p>
    @endforelse
</div>
