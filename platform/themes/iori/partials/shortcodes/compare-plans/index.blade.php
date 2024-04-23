<section class="section mt-50">
    <div class="container">
        <div class="text-center">
            @if ($title = $shortcode->title)
                <h2 class="color-brand-1 mb-40 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">{!! BaseHelper::clean($title) !!}</h2>
            @endif
        </div>
        <div class="table-responsive table-responsive-sm table-responsive-md">
            <table class="table table-compare">
                <thead>
                <tr>
                    <th class="width-28 color-success">{{ $shortcode->feature_title ?: __('Feature') }}</th>
                    <th class="width-18">{{ $shortcode->free_title ?: __('Free') }}</th>
                    <th class="width-18">{{ $shortcode->standard_title ?: __('Standard') }}</th>
                    <th class="width-18">{{ $shortcode->business_title ?: __('Business') }}</th>
                    <th class="width-18">{{ $shortcode->enterprise_title ?: __('Enterprise') }}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($tabs as $tab)
                        <tr>
                            <td>{{ $tab['title'] }}</td>
                            @foreach(['free', 'standard', 'business', 'enterprise'] as $name)
                                <td>
                                    @if($tab[$name] === null)
                                        <svg class="w-6 h-6 icon-18 icon-disable" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    @elseif ($tab[$name] === 'true' )
                                        <svg class="w-6 h-6 icon-18 icon-enable" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                        </svg>
                                    @else
                                        {{ $tab[$name] }}
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
