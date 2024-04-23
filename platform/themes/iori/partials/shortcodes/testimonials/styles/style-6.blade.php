<section class="section mt-50 mb-40 box-testimonial-2 bg-grey-60 pt-120 pb-120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 text-center mb-40">
                @if ($title = $shortcode->title)
                    <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".s">{!! BaseHelper::clean($title) !!}</h2>
                @endif

                @if ($subtitle = $shortcode->subtitle)
                    <p class="font-lg color-gray-500 wow animate__animated animate__fadeIn" data-wow-delay=".2s">{!! BaseHelper::clean($subtitle) !!}</p>
                @endif
            </div>
        </div>
        <div class="row align-items-start" data-masonry="{&quot;percentPosition&quot;: true }">
            @foreach($testimonials as $testimonial)
                <div class="col-lg-4 col-md-6 mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->iteration }}s">
                <div class="card-testimonial-grid">
                    <div class="box-author mb-10">
                        <p><img src="{{ RvMedia::getImageUrl($testimonial->image) }}" alt="{{ $testimonial->name }}"></p>
                        <div class="author-info">
                            <a><span class="font-md-bold color-brand-1 author-name">{{ $testimonial->name }}</span></a>
                            <span class="font-xs color-grey-500 department">{{ $testimonial->company }}a</span>
                        </div>
                    </div>
                    <p class="font-md color-grey-500">{!! BaseHelper::clean($testimonial->content) !!}</p>
                    <div class="card-bottom-info"><span class="font-xs color-grey-500 date-post">{{ $testimonial->created_at->translatedFormat('d M Y') }}</span>
                        <div class="rating text-end">
                            <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Ratting star') }}">
                            <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Ratting star') }}">
                            <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Ratting star') }}">
                            <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Ratting star') }}">
                            <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Ratting star') }}">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
