<section class="section mt-50">
    <div class="container">
        <div class="row">
            @foreach($tabs as $tab)
                <div class="col-lg-3 col-md-6 col-sm-6 wow animate__animated animate__fadeIn" data-wow-delay="{{ Arr::get($tab, 'data_wow_delay')  }}">
                    <div class="card-small card-small-2">
                        <div class="card-image">
                            <div class="box-image">
                                <img src="{{ RvMedia::getImageUrl(Arr::get($tab, 'image'), null, false, RvMedia::getDefaultImage()) }}" alt="{{ Arr::get($tab, 'title') }}">
                            </div>
                        </div>
                        <div class="card-info">
                            <h6 class="color-brand-1 mb-10">{{ Arr::get($tab, 'title') }}</h6>
                            <p class="font-xs color-grey-500 mb-2">{!! BaseHelper::clean(Arr::get($tab, 'description')) !!}</p>
                            @if (Arr::get($tab, 'email'))
                                @foreach (explode(', ', $tab['email']) as $key => $email)
                                    <p class="mb-2"><a href="mailto:{{ $email }}" class="color-success">{{ $email }}</a></p>
                                @endforeach
                            @endif
                            @if (Arr::get($tab, 'phone'))
                                @foreach (explode(', ', $tab['phone']) as $phone)
                                    <p class="mb-2"><a href="tel:{{ $phone }}" class="color-success">{{ $phone }}</a></p>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
