@php
    Theme::layout('empty');
@endphp
<section class="section mt-60">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-40">
                @if ($subtitle = $shortcode->subtitle)
                    <span class="btn btn-tag wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($subtitle) !!}</span>
                @endif

                @if ($title = $shortcode->title)
                    <h1 class="color-brand-1 mt-15 mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($title) !!}</h1>
                @endif
                <div class="box-count box-count-square mb-50">
                    <div class="deals-countdown" data-countdown="{{ $shortcode->time }}"></div>
                </div>

                @if ($description = $shortcode->description)
                    <p class="font-md color-grey-500 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($description) !!}</p>
                @endif

                @if(is_plugin_active('newsletter'))
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="box-notify-me mt-15 form-newsletter">
                                <form method="POST" action="{{ route('public.newsletter.subscribe') }}" class="newsletter-form">
                                    <div class="inner-notify-me wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                                        @csrf
                                        <input class="form-control" type="email" name="email" placeholder="{{ __('Enter your email...') }}">
                                        <button class="btn btn-brand-1 font-md" type="submit">{{ __('Notify Me') }}
                                            <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="mt-45 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                    @if ($socialLinks = json_decode(theme_option('social_links')))
                        @foreach($socialLinks as $social)
                            @php($social = collect($social)->pluck('value', 'key'))
                            <a class="icon-socials" href="{{ $social->get('social-url') }}" title="{{ $social->get('social-name') }}">
                                @if ($socialIcon = $social->get('social-icon'))
                                    <img src="{{ RvMedia::getImageUrl($socialIcon) }}" alt="{{ $social->get('social-name') }}" />
                                @else
                                    {{ $social->get('social-name') }}
                                @endif
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-lg-5 mb-40">
                @if ($backgroundImage = $shortcode->background_image)
                    <img src="{{ RvMedia::getImageUrl($backgroundImage) }}" alt="{{ $shortcode->title }}"/>
                @endif
            </div>
        </div>
        <div class="border-bottom mb-0 mt-50"></div>
    </div>
</section>
