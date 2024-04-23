<section class="section mt-20 mb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                @if ($title = $shortcode->title)
                    <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">{!! BaseHelper::clean($title) !!}</h2>
                @endif

                @if($subtitle = $shortcode->subtitle)
                    <p class="font-lg color-gray-500 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">{!! BaseHelper::clean($subtitle) !!}</p>
                @endif
            </div>
        </div>
        <div class="table-box-help mt-50">
            <div class="table-responsive">
                <table class="table table-forum">
                    <thead>
                    <tr>
                        <th class="width-50">{{ __('Forum') }}</th>
                        <th class="width-16">{{ __('Topics') }}</th>
                        <th class="width-16">{{ __('Comments') }}</th>
                        <th class="width-18">{{ __('Latest Post') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($tabs as $tab)
                            @php
                                $team = \Botble\Team\Models\Team::query()->find($tab['account']);
                            @endphp
                            @continue(! $team)
                            <tr>
                                <td>
                                    <div class="item-forum">
                                        <div class="item-image"><img src="{{ RvMedia::getImageUrl($tab['image']) }}" alt="{{ __('Image') }}"></div>
                                        <div class="item-info">
                                            <h4 class="color-brand-1 mb-15">{{ $tab['title'] }}</h4>
                                            <p class="font-md color-grey-500">{{ $tab['description'] }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $tab['topics'] }}</td>
                                <td>{{ $tab['comments'] }}</td>
                                <td>
                                    @if($team)
                                        <div class="box-author"><span><img src="{{ RvMedia::getImageUrl($team->photo) }}" alt="{{ $team->name }}"></span>
                                            <div class="author-info"><span class="font-lg color-brand-1 author-name">{{ $team->name }}</span>
                                                <span class="font-sm color-grey-500 department">{{ $team->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    @else
                                        <div>{{ __('No account') }}</div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
