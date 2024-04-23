<section class="section banner-7 mt-40">
    <div class="container">
        <div class="box-radius-32 ml-minus-85 mr-minus-85">
            <div class="row align-items-center h-100">
                <div class="col-xl-6">
                    <div class="box-banner-left-home7">
                        @if ($subtitle = $shortcode->subtitle)
                            <span class="title-line line-48 wow animate__animated animate__fadeInUp" data-wow-delay=".s">{!! BaseHelper::clean($subtitle) !!}</span>
                        @endif

                        @if ($title = $shortcode->title)
                            <h1 class="color-brand-1 mb-20 mt-5 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">{!! BaseHelper::clean($title) !!}</h1>
                        @endif
                        <div class="row">
                        @if ($description = $shortcode->description)
                            <div class="col-lg-10">
                                <p class="font-md color-grey-500 mb-25 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">{!! BaseHelper::clean($description) !!}</p>
                            </div>
                        @endif
                        </div>
                        @if(is_plugin_active('newsletter'))
                            <div class="box-join-now">
                                <div class="box-form-join wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                                    <form action="{{ route('public.newsletter.subscribe') }}" class="newsletter-form">
                                        <input class="form-control" name="email" type="email" placeholder="{{ __('Enter your email...') }}">
                                        <button class="btn btn-join" type="submit">{{ __('Join Now') }}
                                            <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif
                        <div class="box-joined wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                            <div class="box-authors">
                                @foreach ($customers as $customer)
                                    <span class="item-author"><img src="{{ RvMedia::getImageUrl($customer->avatar_url) }}" alt="{{ $customer->name }}"></span>
                                @endforeach
                            </div>
                            @if ($customerDescription = $shortcode->customer_desciption)
                                <span class="join-thousands font-sm color-grey-400 d-inline-block">
                                    {{ $customerDescription }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 d-none d-xl-block h-100">
                    <div class="box-banner-7">
                        @foreach(collect($tabs)->split(2) as $items)
                            <div class="banner-7-img-{{ $loop->iteration }} scroll-{{ $loop->iteration }} wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                                @foreach($items as $item)
                                    <img src="{{ RvMedia::getImageUrl($item['image']) }}" alt="{{ __('Image') }}">
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
