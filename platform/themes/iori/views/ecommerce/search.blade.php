@php
    Theme::layout('full-width');
    $layout = $layout ?? 'grid';
@endphp

<section>
    {!! Theme::partial('page-header') !!}
</section>

<section class="section mt-50">
    <div class="container product-area">
        <div class="row align-items-start align-items-md-center">
            <div class="col-lg-3 col-md-2 col-sm-3 col-3 pe-0">
                <a
                    data-layout="grid"
                    href="#"
                    @class([
                        'filter-layout filter-link btn-grid',
                        'active' => request()->input('layout') === 'grid',
                    ])
                > </a>
                <a
                    data-layout="list"
                    href="#"
                    @class([
                        'filter-layout filter-link btn-list',
                        'active' => request()->input('layout') === 'list',
                    ])
                > </a>
            </div>
            <div class="col-lg-9 col-md-10 col-sm-9 col-9 text-end">
                <div class="d-inline-block">
                    <div class="d-flex align-items-center box-filter-text">
                        <div class="show-information-product">
                            {!! Theme::partial('ecommerce.product-count', compact('products')) !!}
                        </div>
                        <div class="box-sortby d-flex align-items-center">
                            <span class="font-md color-grey-400 d-inline-block mr-10">{{ __('Sort by') }}:</span>
                            <div>
                                <select
                                    class="form-select form-select-soft-by"
                                    name="sort-by"
                                    aria-label=""
                                >
                                    @foreach (EcommerceHelper::getSortParams() as $key => $value)
                                        <option
                                            value="{{ $key }}"
                                            @selected(request()->input('sort-by') === $key)
                                        >{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="position-relative w-100 h-100">
            <div class="loading-spinner-wrapper">
                <div class="loading-spinner"></div>
            </div>
            <div
                class="tab-pane fade show active"
                role="tabpanel"
                aria-labelledby="nav-all-tab"
            ></div>
        </div>
        <div class="row">
            <div class="col-lg-3 order-lg-1 order-2">
                @include(Theme::getThemeNamespace('views.ecommerce.includes.filters'))
                {!! dynamic_sidebar('product_list_sidebar') !!}
            </div>
            <div class="col-lg-9 order-lg-1 order-1">
                @if (count($products) > 0)
                    <div class="product-list">
                        <div class="row mt-50 ">
                            @foreach ($products as $product)
                                <div @class([
                                    'col-xl-6 col-lg-12' => $layout === 'list',
                                    'col-lg-4 col-md-6' => $layout === 'grid',
                                ])>
                                    {!! Theme::partial('ecommerce.product.item-' . $layout, compact('product')) !!}
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center mt-30">
                            {!! $products->withQueryString()->links(Theme::getThemeNamespace('partials.pagination')) !!}
                        </div>
                    </div>
                @else
                    <div class="my-5 text-center">
                        <p class="text-muted">{{ __('No products found!') }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
