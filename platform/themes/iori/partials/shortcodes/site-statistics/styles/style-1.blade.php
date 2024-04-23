<section class="section mt-50">
    <div class="container">
        <div class="row mt-50">
            @if($title = $shortcode->title)
                <div class="col-xl-4 col-lg-3">
                    <h3 class="color-brand-1 mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                        {!! BaseHelper::clean($title) !!}
                    </h3>
                </div>
            @endif
            <div class="col-xl-8 col-lg-9">
                <div class="row">
                    @foreach($tabs as $tab)
                        <div class="col-lg-3 col-md-3 col-sm-6 col-6 text-lg-end text-center mb-20">
                            <h2 class="color-brand-1"><span class="counter">{{ $tab['data'] }}</span><span>{{ $tab['unit'] }}</span></h2>
                            <p class="font-lg color-brand-1">{{ $tab['title'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom"></div>
</section>
