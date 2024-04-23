<section class="section mt-50 mb-50 bg-brand-1 pt-100 pb-100 bg-explore">
    <div class="container">
        <div class="text-center">
            @if ($subtitle = $shortcode->subtitle)
                <span class="font-xl-bold color-white text-uppercase wow animate__animated animate__fadeInUp" data-wow-delay=".0s">{!! BaseHelper::clean($subtitle) !!}</span>
            @endif

            @if ($title = $shortcode->title)
                <h2 class="color-brand-2 mb-60 mt-15 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">{!! BaseHelper::clean($title) !!}</h2>
            @endif
        </div>
        <div class="mt-30 mb-60">
            <ul class="list-buttons list-buttons-circle nav nav-tabs" role="tablist">
                @foreach($tabs as $tab)
                    <li class="wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->index * 2 }}s">
                        <a @class(['active' => $loop->first]) href="#tab-{{ Str::slug($tab['key']) }}" data-bs-toggle="tab" role="tab" aria-controls="tab-explore-1" aria-selected="true">
                            {{ $tab['key'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                @foreach($tabs as $tab)
                    @php
                        $checklists = explode(',', $tab['checklists']);
                    @endphp
                    <div @class(['tab-pane fade', 'active show' => $loop->first]) id="tab-{{ Str::slug($tab['key']) }}" role="tabpanel" aria-labelledby="tab-explore-1">
                        <div class="box-tab-32">
                            <div class="row align-items-center">
                                <div class="col-xl-6 col-lg-5">
                                    @if ($tab['image'])
                                        <img class="bd-rd16" src="{{ RvMedia::getImageUrl($tab['image']) }}" alt="{{ $tab['key'] }}">
                                    @endif
                                </div>
                                <div class="col-xl-6 col-lg-7">
                                    <div class="box-business-tab">
                                        @if ($tab['subtitle'])
                                            <span class="btn btn-tag">{{ $tab['subtitle'] }}</span>
                                        @endif

                                        @if ($tab['title'])
                                            <h3 class="color-brand-1 mt-10 mb-15">{{ $tab['title'] }}</h3>
                                        @endif

                                        @if ($tab['description'])
                                            <p class="font-md color-grey-400">{{ $tab['description'] }}</p>
                                        @endif
                                        <div class="mt-20">
                                            <ul class="list-ticks">
                                                @foreach($checklists as $item)
                                                    <li>
                                                        <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                        </svg>
                                                        {{ $item }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
