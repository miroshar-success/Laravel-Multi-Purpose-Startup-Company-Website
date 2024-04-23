@if ($products->isNotEmpty())
    <div class="bb-quick-search-content">
        <div class="bb-quick-search-list">
            @foreach ($products as $product)
                <div class="bb-quick-search-item-wrapper">
                    <a class="bb-quick-search-item" href="{{ $product->url }}">
                        <div class="bb-quick-search-item-image">
                            {{ RvMedia::image($product->image, $product->name, 'thumb', useDefaultImage: true, attributes: ['loading' => false]) }}
                        </div>
                        <div class="bb-quick-search-item-info text-start">
                            <div class="bb-quick-search-item-name">
                                {{ $product->name }}
                            </div>

                            @if (EcommerceHelper::isReviewEnabled())
                                @include(EcommerceHelper::viewPath('includes.rating'))
                            @endif

                            @include(EcommerceHelper::viewPath('includes.product-price'))
                        </div>
                    </a>
                </div>
            @endforeach

            @if ($products->hasMorePages() && $products->nextPageUrl())
                <div class="bb-quick-search-load-more text-center">
                    <a href="{{ $products->nextPageUrl() }}" data-bb-toggle="quick-search-load-more">
                        {{ __('Load more') }}
                    </a>
                </div>
            @endif
        </div>
    </div>

    <div class="bb-quick-search-view-all text-center">
        <a href="#" onclick="event.preventDefault(); document.getElementById('bb-form-quick-search').submit();">{{ __('View all results') }}</a>
    </div>
@else
    <div class="bb-quick-search-empty">
        {{ __('No results found!') }}
    </div>
@endif
