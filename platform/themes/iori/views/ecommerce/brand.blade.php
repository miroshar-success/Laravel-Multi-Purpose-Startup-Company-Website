@php
    Theme::layout('full-width');
    Theme::set('pageDescription', $brand->description);
@endphp

<div>
    {!! Theme::partial('page-header') !!}
</div>

<div class="container">
    @if ($products->isNotEmpty())
        <div class="row mt-50">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-4">
                    {!! Theme::partial('ecommerce.product.item-grid', compact('product')) !!}
                </div>
            @endforeach
        </div>

        <div
            class="showing-product"
            style="display: none"
        >
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
</div>
