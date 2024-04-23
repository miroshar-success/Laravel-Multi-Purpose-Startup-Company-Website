@if(is_plugin_active('newsletter'))
    @switch($config['style'])
        @case(2)
            <section class="section mt-50">
                <div class="box-newsletter box-newsletter-2 wow animate__animated animate__fadeIn" @if ($image = Arr::get($config, 'image')) style="background-image: url('{{ RvMedia::getImageUrl($image) }}')" @endif>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-7 m-auto text-center"><span class="font-lg color-brand-1 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean(__('Newsletter')) !!}</span>
                                @if ($title = $config['title'])
                                    <h2 class="color-brand-1 mb-15 mt-5 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                        {!! BaseHelper::clean($title) !!}
                                    </h2>
                                @endif

                                @if ($subtitle = $config['subtitle'])
                                    <p class="font-md color-grey-500 wow animate__animated animate__fadeIn" data-wow-delay=".2s">{!! BaseHelper::clean($subtitle) !!}</p>
                                @endif
                                <div class="form-newsletter mt-30 wow animate__animated animate__fadeIn position-relative" data-wow-delay=".3s">
                                    {!! $form->renderForm() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @break
        @default
            <section class="section mt-50">
                <div class="box-newsletter">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-12">
                                <div class="box-image-newsletter">
                                    <div class="wow animate__animated animate__zoomIn" data-wow-delay=".0s">
                                        @if ($image = Arr::get($config, 'image'))
                                            <img class="img-main" src="{{ RvMedia::getImageUrl($image) }}" alt="{{ __('Image NewsLetter') }}">
                                        @endif
                                    </div>

                                    @if ($iconPrimary = Arr::get($config, 'icon_primary'))
                                        <div class="shape-2 image-1">
                                            <img src="{{ RvMedia::getImageUrl($iconPrimary) }}" alt="{{ __('Icon primary') }}">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12"><span class="font-lg color-brand-1 wow animate__animated animate__fadeIn" data-wow-delay=".0s">{{ __('Newsletter') }}</span>
                                @if ($title = Arr::get($config, 'title'))
                                    <h2 class="color-brand-1 mb-15 mt-5 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                        {!! BaseHelper::clean($title) !!}</h2>
                                @endif

                                @if ($subtitle = Arr::get($config, 'subtitle'))
                                    <p class="font-md color-grey-500 wow animate__animated animate__fadeIn" data-wow-delay=".2s">{!! BaseHelper::clean($subtitle) !!}</p>
                                @endif
                                <div class="form-newsletter mt-30 wow animate__animated animate__fadeIn d-block position-relative" data-wow-delay=".3s">
                                    {!! $form->renderForm() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    @endswitch
@endif
