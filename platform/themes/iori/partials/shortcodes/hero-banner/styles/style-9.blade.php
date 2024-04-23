<section class="section banner-9 mb-100">
    <div class="box-banner-home9">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-30">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="title-line line-48 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h2 class="color-brand-1 mb-15 mt-0 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">{!! BaseHelper::clean($title) !!} </h2>
                    @endif

                    @if ($description = $shortcode->description)
                        <p class="font-md color-grey-500 mb-20 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">{!! BaseHelper::clean($description) !!}</p>
                    @endif

                    @if ($shortcode->youtube_video_id && $shortcode->button_youtube_label)
                        <div class="mt-10 wow animate__animated animate__fadeInUp" data-wow-delay=".6s">
                            <a class="btn btn-play btn-play-white font-sm-bold popup-youtube" href="https://www.youtube.com/watch?v={{ $shortcode->youtube_video_id }}">
                                {{ $shortcode->button_youtube_label }}

                                <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="22" cy="22" r="22" fill="currentColor"/>
                                    <path d="M17.5306 13.5726L31.6884 21.7802L17.5015 29.9374L17.5306 13.5726Z" fill="currentColor"/>
                                </svg>
                            </a>
                        </div>
                    @endif
                </div>

                @if (is_plugin_active('ecommerce') && $customers)
                    <div class="col-lg-5 mb-30 wow animate__animated animate__fadeInLeft" data-wow-delay=".0s">
                        <div class="box-joined">
                            <div class="box-authors">
                                @foreach($customers as $customer)
                                    <span class="item-author"><img src="{{ RvMedia::getImageUrl($customer->avatar_url) }}" alt="{{ $customer->name }}"></span>
                                @endforeach
                                <span class="item-author">
                                <span class="text-num-author font-md-bold color-brand-1 bg-grey-60">+{{ Botble\Ecommerce\Models\Customer::query()->count() -  $customers->count()}}</span>
                            </span>
                            </div>
                            @if ($customerDescription = $shortcode->customer_desciption)
                                <span class="join-thousands font-sm color-grey-400 d-inline-block">{!! BaseHelper::clean($customerDescription) !!}</span>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
            <div class="box-image-banner-9 wow animate__animated animate__fadeIn">
                @if ($image = $shortcode->banner_primary)
                    <img src="{{ RvMedia::getImageUrl($image) }}" alt="{{ __('Banner image') }}">
                @endif
            </div>
            <div class="box-ticks">
                <div class="row">
                    @foreach($tabs as $tab)
                        <div class="col-lg-4 mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->index * 2 }}s">
                            <span class="item-tick color-brand-1 font-xl-bold">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>

                                {{ $tab['title'] }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
