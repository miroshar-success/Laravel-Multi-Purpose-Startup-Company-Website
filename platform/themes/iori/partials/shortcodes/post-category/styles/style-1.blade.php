<section>
    <div class="container">
        <div class="mt-20 mb-50">
            @if ($title = $shortcode->title)
                <h3 class="color-brand-1 title-line-right line-info">{!! BaseHelper::clean($title) !!}</h3>
            @endif
        </div>
        @if ($category->posts->isNotEmpty())
            <div class="row">
                @php
                    $postFirst = $category->posts->first();
                    $timeReadingFirst = number_format(strlen(strip_tags($postFirst->content)) / 300)
                @endphp

                <div class="col-lg-6 col-md-12 mb-30 item-article featured">
                    <div class="card-blog-grid card-blog-grid-3 hover-up">
                        <div class="card-image">
                            <a href="{{ $postFirst->url }}">
                                <img src="{{ RvMedia::getImageUrl($postFirst->image, 'large') }}" alt="{{ $postFirst->name }}">
                            </a>
                            <label class="lbl-border">{{ $category->name }}</label>
                        </div>
                        <div class="card-info"><a href="{{ $postFirst->url }}">
                                <h4 class="color-brand-1">{{ $postFirst->name }}</h4></a>
                            <div class="mb-25 mt-10"><span class="font-xs color-grey-500">{{ $postFirst->created_at->translatedFormat('M d, Y') }}</span>
                                <span class="font-xs color-grey-500 icon-read">{{ __(':number mins read', ['number' => $timeReadingFirst]) }}</span></div>
                            <p class="font-sm color-grey-500 mt-20">
                                {!! BaseHelper::clean(Str::limit($postFirst->description, 120)) !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-30 item-article featured">
                    @foreach($category->posts as $post)
                        @php
                            $timeReading = number_format(strlen(strip_tags($post->content)) / 300)
                        @endphp

                        @if(! $loop->first)
                            <div class="card-blog-grid card-blog-grid-3 hover-up">
                                <div class="card-info">
                                    <a href="{{ $post->url }}">
                                        <h4 class="color-brand-1">{{ $post->name }}</h4></a>
                                    <div class="mb-25 mt-10"><span class="font-xs color-grey-500">{{ $post->created_at->translatedFormat('M d, Y') }}</span>
                                        <span class="font-xs color-grey-500 icon-read">{{ __(':number mins read', ['number' => $timeReading]) }}</span></div>
                                    <p class="font-sm color-grey-500 mt-20">
                                        {{ Str::limit($postFirst->description, 120) }}
                                    </p>
                                </div>
                            </div>
                        @endif
                        @if(! $loop->last && ! $loop->first)
                            <div class="border-bottom bd-grey-80 mt-0 pt-15 mb-30"></div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="mt-0 mb-30 text-center">
                <a class="btn btn-white-circle font-sm-bold border-brand text-none" href="{{ $category->url }}">{{ __('View more in this category') }}</a>
            </div>
        @endif
    </div>
</section>
