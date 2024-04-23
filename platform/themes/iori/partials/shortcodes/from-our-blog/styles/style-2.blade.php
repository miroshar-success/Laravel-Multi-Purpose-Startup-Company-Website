<section class="section mt-50">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-8 col-md-8">
                @if ($title = $shortcode->title)
                    <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">{!! BaseHelper::clean($title) !!}</h2>
                @endif

                @if ($subtitle = $shortcode->subtitle)
                    <p class="font-lg color-gray-500 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                       {!! BaseHelper::clean($subtitle) !!}
                    </p>
                @endif
            </div>
            <div class="col-lg-4 col-md-4 text-md-end text-start wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                @if($shortcode->button_label && $shortcode->button_url)
                    <a href="{{ $shortcode->button_url }}" class="btn btn-default font-sm-bold pl-0">
                        {!! BaseHelper::clean($shortcode->button_label) !!}
                        <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                @endif
            </div>
        </div>
        <div class="row mt-55">
            @foreach($posts as $post)
                @php($timeReading = number_format(strlen(strip_tags($post->content)) / 300))
                <div class="col-xl-3 col-lg-6 col-md-6 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                <div class="card-blog-grid card-blog-grid-2 hover-up">
                    <div class="card-image img-reveal">
                        <a href="{{ $post->url }}"><img src="{{ RvMedia::getImageUrl($post->image) }}" alt="{{ $post->name }}" /></a>
                    </div>
                    <div class="card-info">
                        <a href="{{ $post->url }}"> <h6 class="color-brand-1">{{ $post->name }}</h6></a>
                        <p class="font-sm color-grey-500 mt-20">
                            {!! BaseHelper::clean(Str::limit($post->description, 120)) !!}
                        </p>
                        <div class="mt-20 d-flex align-items-center border-top pt-20">
                            @if($post->firstCategory)
                                <a class="btn btn-border-brand-1 mr-15" href="{{ $post->firstCategory->url }}">{{ $post->firstCategory->name  }}</a>
                            @endif

                            <span class="date-post font-xs color-grey-300 mr-15">
                                <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                               {{ $post->created_at->translatedFormat('d M y') }}
                            </span>
                            <span class="time-read font-xs color-grey-300">
                                <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ __(':number mins read', ['number' => $timeReading]) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

