@php
    Theme::layout('full-width');

    if (!($layout = request()->input('layout'))) {
        $layout = $layout ?? theme_option('layout_products', 'grid');
    }

    $layout = in_array($layout, ['grid', 'list']) ? $layout : 'grid';
@endphp

<section>
    {!! $sidebar = dynamic_sidebar('product_sidebar') !!}

    @if (!$sidebar)
        {!! Theme::partial('page-header') !!}
    @endif
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
                        'active' => $layout === 'grid',
                    ])
                >
                    <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <g clip-path="url(#clip0_222_15978)">
                            <path
                                d="M5 0H1C0.448 0 0 0.448 0 1V5C0 5.552 0.448 6 1 6H5C5.552 6 6 5.552 6 5V1C6 0.448 5.552 0 5 0Z"
                                fill="currentColor"
                            />
                            <path
                                d="M5 9H1C0.448 9 0 9.448 0 10V14C0 14.552 0.448 15 1 15H5C5.552 15 6 14.552 6 14V10C6 9.448 5.552 9 5 9Z"
                                fill="currentColor"
                            />
                            <path
                                d="M5 18H1C0.448 18 0 18.448 0 19V23C0 23.552 0.448 24 1 24H5C5.552 24 6 23.552 6 23V19C6 18.448 5.552 18 5 18Z"
                                fill="currentColor"
                            />
                            <path
                                d="M14 0H10C9.448 0 9 0.448 9 1V5C9 5.552 9.448 6 10 6H14C14.552 6 15 5.552 15 5V1C15 0.448 14.552 0 14 0Z"
                                fill="currentColor"
                            />
                            <path
                                d="M14 9H10C9.448 9 9 9.448 9 10V14C9 14.552 9.448 15 10 15H14C14.552 15 15 14.552 15 14V10C15 9.448 14.552 9 14 9Z"
                                fill="currentColor"
                            />
                            <path
                                d="M14 18H10C9.448 18 9 18.448 9 19V23C9 23.552 9.448 24 10 24H14C14.552 24 15 23.552 15 23V19C15 18.448 14.552 18 14 18Z"
                                fill="currentColor"
                            />
                            <path
                                d="M23 0H19C18.448 0 18 0.448 18 1V5C18 5.552 18.448 6 19 6H23C23.552 6 24 5.552 24 5V1C24 0.448 23.552 0 23 0Z"
                                fill="currentColor"
                            />
                            <path
                                d="M23 9H19C18.448 9 18 9.448 18 10V14C18 14.552 18.448 15 19 15H23C23.552 15 24 14.552 24 14V10C24 9.448 23.552 9 23 9Z"
                                fill="currentColor"
                            />
                            <path
                                d="M23 18H19C18.448 18 18 18.448 18 19V23C18 23.552 18.448 24 19 24H23C23.552 24 24 23.552 24 23V19C24 18.448 23.552 18 23 18Z"
                                fill="currentColor"
                            />
                        </g>
                        <defs>
                            <clipPath id="clip0_222_15978">
                                <rect
                                    width="24"
                                    height="24"
                                    fill="white"
                                />
                            </clipPath>
                        </defs>
                    </svg>
                </a>

                <a
                    data-layout="list"
                    href="#"
                    @class([
                        'filter-layout filter-link btn-list',
                        'active' => $layout === 'list',
                    ])
                >
                    <svg
                        width="25"
                        height="24"
                        viewBox="0 0 25 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <g clip-path="url(#clip0_222_15988)">
                            <path
                                d="M1.125 3.75H23.625C23.9234 3.75 24.2095 3.55246 24.4205 3.20082C24.6315 2.84919 24.75 2.37228 24.75 1.875C24.75 1.37772 24.6315 0.900806 24.4205 0.549175C24.2095 0.197544 23.9234 0 23.625 0H1.125C0.826631 0 0.540483 0.197544 0.329505 0.549175C0.118526 0.900806 0 1.37772 0 1.875C0 2.37228 0.118526 2.84919 0.329505 3.20082C0.540483 3.55246 0.826631 3.75 1.125 3.75V3.75Z"
                                fill="currentColor"
                            />
                            <path
                                d="M1.125 10.5H23.625C23.9234 10.5 24.2095 10.3025 24.4205 9.95082C24.6315 9.59919 24.75 9.12228 24.75 8.625C24.75 8.12772 24.6315 7.65081 24.4205 7.29918C24.2095 6.94754 23.9234 6.75 23.625 6.75H1.125C0.826631 6.75 0.540483 6.94754 0.329505 7.29918C0.118526 7.65081 0 8.12772 0 8.625C0 9.12228 0.118526 9.59919 0.329505 9.95082C0.540483 10.3025 0.826631 10.5 1.125 10.5V10.5Z"
                                fill="currentColor"
                            />
                            <path
                                d="M23.625 13.5H1.125C0.826631 13.5 0.540483 13.6975 0.329505 14.0492C0.118526 14.4008 0 14.8777 0 15.375C0 15.8723 0.118526 16.3492 0.329505 16.7008C0.540483 17.0525 0.826631 17.25 1.125 17.25H23.625C23.9234 17.25 24.2095 17.0525 24.4205 16.7008C24.6315 16.3492 24.75 15.8723 24.75 15.375C24.75 14.8777 24.6315 14.4008 24.4205 14.0492C24.2095 13.6975 23.9234 13.5 23.625 13.5Z"
                                fill="currentColor"
                            />
                            <path
                                d="M23.625 20.25H1.125C0.826631 20.25 0.540483 20.4475 0.329505 20.7992C0.118526 21.1508 0 21.6277 0 22.125C0 22.6223 0.118526 23.0992 0.329505 23.4508C0.540483 23.8025 0.826631 24 1.125 24H23.625C23.9234 24 24.2095 23.8025 24.4205 23.4508C24.6315 23.0992 24.75 22.6223 24.75 22.125C24.75 21.6277 24.6315 21.1508 24.4205 20.7992C24.2095 20.4475 23.9234 20.25 23.625 20.25Z"
                                fill="currentColor"
                            />
                        </g>
                        <defs>
                            <clipPath id="clip0_222_15988">
                                <rect
                                    width="24.75"
                                    height="24"
                                    fill="white"
                                />
                            </clipPath>
                        </defs>
                    </svg>
                </a>
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
            @if ($enableSidebar = theme_option('enable_sidebar_products', true))
                <div class="col-lg-3 order-lg-1 order-2">
                    @include(Theme::getThemeNamespace('views.ecommerce.includes.filters'))
                    {!! dynamic_sidebar('product_list_sidebar') !!}
                </div>
            @else
                <form
                    class="mt-50"
                    id="products-filter-form"
                    data-action="{{ route('public.ajax.products') }}"
                    action="{{ route('public.ajax.products') }}"
                    method="GET"
                >
                    <input
                        class="product-filter-item"
                        name="sort-by"
                        type="hidden"
                        value="{{ BaseHelper::stringify(request()->input('sort-by')) }}"
                    >
                    <input
                        class="product-filter-item"
                        name="layout"
                        type="hidden"
                        value="{{ BaseHelper::stringify(request()->input('layout')) }}"
                    >
                    <input
                        name="page"
                        type="hidden"
                        value="{{ BaseHelper::stringify(request()->query('page', 1)) }}"
                    >
                </form>
            @endif
            <div @class([
                'order-lg-1 order-1',
                'col-lg-9' => $enableSidebar,
                'col-lg-12' => !$enableSidebar,
            ])>
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
            </div>
        </div>
    </div>
</section>
