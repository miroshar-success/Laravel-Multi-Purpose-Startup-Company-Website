<section>
    <div class="container">
        @if ($posts->isNotEmpty())
            <div class="row">
                @foreach ($posts as $post)
                    <div
                        class="col-lg-4 col-md-6 wow animate__animated animate__fadeInUp"
                        data-wow-delay=".{{ $loop->index }}s"
                    >
                        <div class="card-blog-grid hover-up">
                            <div class="card-image">
                                <a href="{{ $post->url }}">
                                    <img
                                        src="{{ RvMedia::getImageUrl($post->image) }}"
                                        alt="{{ $post->name }}"
                                    />
                                </a>
                            </div>
                            <div class="card-info">
                                <a href="{{ $post->url }}">
                                    <h4 class="color-brand-1">{{ $post->name }}</h4>
                                </a>
                                <div class="mt-20">
                                    <span class="date-post font-xs color-grey-300">
                                        <svg
                                            class="w-6 h-6 icon-16"
                                            fill="none"
                                            stroke="currentColor"
                                            viewbox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                            ></path>
                                        </svg>
                                        {{ $post->created_at->translatedFormat('d M y') }}
                                    </span>
                                    <span class="time-read font-xs color-grey-300">
                                        <svg
                                            class="w-6 h-6 icon-16"
                                            fill="none"
                                            stroke="currentColor"
                                            viewbox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                            ></path>
                                        </svg>
                                        {{ __(':number mins read', ['number' => number_format(strlen(strip_tags($post->content)) / 300)]) }}
                                    </span>
                                </div>
                                <p class="font-sm color-grey-500 mt-20">
                                    {!! BaseHelper::clean(Str::limit($post->description, 120)) !!}
                                </p>
                                <div class="mt-20 d-flex">
                                    <div class="box-button-more text-start">
                                        <a
                                            class="btn btn-default font-sm-bold p-0"
                                            href="{{ $post->url }}"
                                        >
                                            {{ __(' Learn More') }}
                                            <svg
                                                class="w-6 h-6 icon-16 ms-1"
                                                fill="none"
                                                stroke="currentColor"
                                                viewbox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M14 5l7 7m0 0l-7 7m7-7H3"
                                                ></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
