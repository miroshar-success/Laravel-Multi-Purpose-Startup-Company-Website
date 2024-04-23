<section class="section pt-50 pb-100">
    <div class="container">
        @if ($image = $career->getMetaData('image', true))
            <div class="box-image-detail">
                <img
                    class="bd-rd16 d-block"
                    src="{{ RvMedia::getImageUrl($image) }}"
                    alt="{{ $career->name }}"
                >
            </div>
        @endif
        <div class="content-detail">
            <div class="row">
                <div class="col-lg-10 col-11 m-auto">
                    <div class="box-detail-content">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12 mb-30">
                                <h3 class="color-brand-1 mb-10 mt-0">{{ $career->name }}</h3>
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
                                    {{ $career->created_at->translatedFormat('d M Y') }}
                                </span>
                                <span class="time-read font-xs color-grey-300">
                                    <svg
                                        class="icon-16"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                                        />
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                        />
                                    </svg>
                                    {{ number_format($career->views) }}
                                </span>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-start text-md-end mb-30">
                                <a
                                    class="btn btn-brand-1 btn-apply"
                                    href="{{ $career->getMetaData('apply_url', true) }}"
                                >
                                    <svg
                                        class="w-6 h-6 icon-18 mr-10"
                                        fill="none"
                                        stroke="currentColor"
                                        viewbox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"
                                        ></path>
                                    </svg>
                                    {{ __('Apply Now') }}
                                </a>
                            </div>
                        </div>
                        <div class="border-bottom bd-grey-80 mb-40 pt-0"></div>
                        <h4 class="color-brand-1 mb-25">{{ __('Job summary') }}</h4>
                        <div class="box-info-job">
                            <div class="row align-items-start">
                                @if ($salary = $career->salary)
                                    <div class="col-lg-6 col-md-6">
                                        <div class="item-job">
                                            <div class="left-title">
                                                <svg
                                                    class="icon-16"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                    />
                                                </svg>
                                                <span class="ps-1">{{ __('Salary') }}</span>
                                            </div>
                                            <div class="right-info">
                                                {{ $salary }}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($location = $career->location)
                                    <div class="col-md-6 col-lg-6">
                                        <div class="item-job">
                                            <div class="left-title">
                                                <svg
                                                    class="icon-16"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"
                                                    />
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"
                                                    />
                                                </svg>
                                                <span class="ps-1">{{ __('Location') }}</span>
                                            </div>
                                            <div class="right-info">
                                                {{ $location }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {!! BaseHelper::clean($career->content) !!}

                        <div class="box-info-bottom">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6 col-sm-5 col-12 mb-30">
                                    <a
                                        class="btn btn-brand-1 btn-apply"
                                        href="{{ $career->getMetaData('apply_url', true) }}"
                                    >
                                        <svg
                                            class="w-6 h-6 icon-18 mr-10"
                                            fill="none"
                                            stroke="currentColor"
                                            viewbox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"
                                            ></path>
                                        </svg>
                                        {{ __('Apply Now') }}
                                    </a>
                                </div>
                                @php($tags = collect(json_decode($career->getMetaData('tags', true), true))->pluck('value'))

                                @if ($tags->isNotEmpty())
                                    <div
                                        class="d-flex gap-2 justify-content-end col-lg-6 col-md-6 col-sm-7 col-12 text-start text-sm-end mb-30">
                                        @foreach ($tags as $tag)
                                            <span class="btn btn-tag gap-2">{{ $tag }}</span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section mt-50">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-8 col-md-8">
                <h2 class="color-brand-1 mb-20">{{ __('More Job Openings') }}</h2>
                <p class="font-lg color-gray-500">
                    {{ __('We regularly recruit at many positions. See related jobs here') }}
                </p>
            </div>
        </div>
        <div class="row mt-50">
            @foreach ($relatedCareers as $career)
                <div
                    class="col-lg-4 col-md-6 col-sm-6 wow animate__animated animate__fadeIn"
                    data-wow-delay=".{!! $loop->index !!}s"
                >
                    <div class="card-offer hover-up">
                        <div class="card-image">
                            <img
                                src="{{ RvMedia::getImageUrl($career->getMetaData('icon', true)) }}"
                                alt="{{ $career->name }}"
                            >
                        </div>
                        <div class="card-info">
                            <h4 class="color-brand-1 mb-15">
                                <a href="{{ $career->url }}">{{ $career->name }}</a>
                            </h4>
                            <p class="font-md color-grey-500 mb-15">{{ Str::words($career->description, 12) }}</p>
                            <div class="box-button-offer">
                                <a
                                    class="btn btn-default font-sm-bold pl-0 color-brand-1"
                                    href="{{ $career->url }}"
                                >
                                    {{ __('Learn More') }}
                                    <svg
                                        class="icon-16 ml-5"
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
            @endforeach
        </div>
    </div>
</section>
