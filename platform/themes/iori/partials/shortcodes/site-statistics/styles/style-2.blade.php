<section class="section bg-brand-1 box-why-trusted-11">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5 mb-30">
                <div class="rating">
                    @foreach(range(1, 5) as $i)
                        <img src="{{ Theme::asset()->url('imgs/template/icons/star.svg') }}" alt="{{ __('Rating star') }}">
                    @endforeach
                </div>

                @if ($title = $shortcode->title)
                    <h2 class="color-white mb-5">{!! BaseHelper::clean($title) !!}</h2>
                @endif
            </div>
            <div class="col-xl-7 col-lg-7 mb-30">
                @if ($description = $shortcode->description)
                    <p class="font-sm color-white mb-20">{!! BaseHelper::clean($description) !!}</p>
                @endif
                <div class="row">
                    @foreach($tabs as $tab)
                        <div class="col-lg-3 col-md-3 col-sm-3 col-6 mt-20">
                            <h2 class="color-white"><span class="count">{{ $tab['data'] }}</span><span>{{ $tab['unit'] }}</span></h2>
                            <p class="font-lg color-white">{{ $tab['title'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
