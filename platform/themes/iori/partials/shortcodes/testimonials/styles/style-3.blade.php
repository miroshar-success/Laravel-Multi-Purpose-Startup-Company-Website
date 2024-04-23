<section class="section mt-50 box-testimonial-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 text-start pt-50">
                @if ($subtitle = $shortcode->subtitle)
                    <span class="title-line line-48 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($subtitle) !!}</span>
                @endif

                @if ($title = $shortcode->title)
                    <h2 class="color-brand-1 mb-20 mt-15 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                       {!! BaseHelper::clean($title) !!}
                    </h2>
                @endif
                <div class="row">
                    @if ($description = $shortcode->description)
                        <div class="col-lg-10 wow animate__animated animate__fadeIn" data-wow-delay=".3s">
                            <p class="font-md color-gray-500 mb-30">
                                {!! BaseHelper::clean($description) !!}
                            </p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-7 bg-testimonials position-relative">
                @foreach($testimonials as $testimonial)
                    <div @class(['wow animate__animated animate__fadeIn', 'ml-100' => $loop->even]) data-wow-delay=".2s">
                        <div class="card-testimonial-list">
                        <div class="d-flex align-items-center">
                            <div class="box-author mb-10">
                                @if ($image = $testimonial->image)
                                    <img src="{{ RvMedia::getImageUrl($image) }}" alt="{{ $testimonial->name }}" />
                                @endif

                                <div class="author-info">
                                    <span class="font-md-bold color-brand-1 author-name">{{ $testimonial->name }}</span>
                                    <span class="font-xs color-grey-500 department">{{ $testimonial->company }}</span>
                                </div>
                            </div>
                            <div class="rating text-end">
                                <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Star') }}" />
                                <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Star') }}" />
                                <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Star') }}" />
                                <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Star') }}" />
                                <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Star') }}" />
                            </div>
                        </div>
                        <p class="font-md color-grey-500">
                            {!! BaseHelper::clean($testimonial->content) !!}
                        </p>
                    </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
