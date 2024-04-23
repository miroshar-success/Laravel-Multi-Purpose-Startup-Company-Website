@if ($products->isNotEmpty())
    @php
        $layout = $layout ?? 'grid';
    @endphp

    <div class="row mt-50">
        @foreach($products as $product)
            <div @class(['col-xl-6 col-lg-12' => $layout === 'list', 'col-lg-4 col-md-6' => $layout === 'grid'])>
                {!! Theme::partial('ecommerce.product.item-' . $layout, compact('product')) !!}
            </div>
        @endforeach
    </div>

    <div class="showing-product" style="display: none">
        {!! Theme::partial('ecommerce.product-count', compact('products')) !!}
    </div>

    @if ($products instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
        <div class="text-center mt-30">
            {!! $products->withQueryString()->links(Theme::getThemeNamespace('partials.pagination')) !!}
        </div>
    @endif
@else
    <div class="my-5 text-center">
        <p class="text-muted">{{ __('No products found!') }}</p>
    </div>
@endif
