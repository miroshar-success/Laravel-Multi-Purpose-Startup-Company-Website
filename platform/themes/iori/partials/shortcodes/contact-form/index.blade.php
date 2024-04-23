@php
    $tabs = Shortcode::fields()->getTabsData(['heading', 'description', 'icon'], $shortcode);
@endphp

<section class="section mt-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                @if ($title = $shortcode->title)
                    <h2 class="color-brand-1 mb-15">{!! BaseHelper::clean($title) !!}</h2>
                @endif

                @if ($subtitle = $shortcode->subtitle)
                    <p class="font-sm color-grey-500">{!! BaseHelper::clean($subtitle) !!}</p>
                @endif
                <div class="mt-50">
                    @foreach($tabs as $tab)
                        <div class="wow animate__animated animate__fadeInUp" data-wow-delay="{{ Arr::get($tab, 'data_wow_delay') }}">
                            <div class="card-offer card-we-do card-contact hover-up">
                                <div class="card-image">
                                    <img src="{{ RvMedia::getImageUrl(Arr::get($tab, 'icon'), null, false, RvMedia::getDefaultImage()) }}" alt="{{ Arr::get($tab, 'heading') }}">
                                </div>
                                <div class="card-info">
                                    <h6 class="color-brand-1 mb-10">{{ Arr::get($tab, 'heading') }}</h6>
                                    <p class="font-md color-grey-500 mb-5">{!! BaseHelper::clean(Arr::get($tab, 'description')) !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-7">
                <div class="box-form-contact wow animate__animated animate__fadeIn" data-wow-delay=".6s">
                    {!! $form->renderForm() !!}
                </div>
            </div>
        </div>
    </div>
</section>
