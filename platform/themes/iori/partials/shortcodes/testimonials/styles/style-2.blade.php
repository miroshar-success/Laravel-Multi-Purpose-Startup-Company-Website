<section class="section mt-50 box-testimonial-2">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-lg-4 text-start pt-50">
                <div class="row">
                    @if ($image = $shortcode->image)
                        <div class="col-md-9">
                            <img class="mb-30" src="{{ RvMedia::getImageUrl($image) }}" alt="{{ __('Image') }}" />
                        </div>
                    @endif
                </div>
                @if ($title = $shortcode->title)
                    <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">{!! BaseHelper::clean($title) !!}</h2>
                @endif

                @if ($subtitle = $shortcode->subtitle)
                    <p class="font-lg color-gray-500 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">{!! BaseHelper::clean($subtitle) !!}</p>
                @endif
            </div>
            <div class="col-lg-8">
                <div class="row">
                    @foreach($testimonials->split(2) as $items)
                        <div class="col-lg-6 col-md-6">
                            @foreach($items as $testimonial)
                                    <div @class(['mb-30 wow animate__animated animate__fadeInUp', 'mt-50' => $loop->parent->first, 'testimonial-warning' => $loop->parent->first && $loop->last]) data-wow-delay=".2s">
                                        <div class="card-testimonial-grid">
                                            <div class="box-author mb-10">
                                                @if($authorAvatar = $testimonial->image)
                                                    <img src="{{ RvMedia::getImageUrl($authorAvatar) }}" alt="{{ $testimonial->name }}" />
                                                @endif
                                                <div class="author-info">
                                                    <span class="font-md-bold color-brand-1 author-name">{{ $testimonial->name }}</span>
                                                    <span class="font-xs color-grey-500 department">{{ $testimonial->company }}</span>
                                                </div>
                                            </div>
                                            <p class="font-md color-grey-500">
                                                {!! BaseHelper::clean($testimonial->content) !!}
                                            </p>
                                            <div class="card-bottom-info">
                                                <span class="font-xs color-grey-500 date-post">{{ $testimonial->created_at->translatedFormat('d M Y') }}</span>
                                                <div class="rating text-end">
                                                    <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Star') }}">
                                                    <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Star') }}">
                                                    <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Star') }}">
                                                    <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Star') }}">
                                                    <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Star') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
