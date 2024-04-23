@php
    [$categories, $brands, $tags, $rand, $categoriesRequest, $urlCurrent, $categoryId, $maxFilterPrice] = EcommerceHelper::dataForFilter($category ?? null);
@endphp

<form action="{{ route('public.ajax.products') }}" data-action="{{ route('public.ajax.products') }}"
    method="GET" id="products-filter-form" class="mt-50">

    <input type="hidden" name="sort-by" class="product-filter-item" value="{{ BaseHelper::stringify(request()->input('sort-by')) }}">
    <input type="hidden" name="layout" class="product-filter-item" value="{{ BaseHelper::stringify(request()->input('layout')) }}">
    <input type="hidden" name="page" value="{{ BaseHelper::stringify(request()->integer('page', 1)) }}">

    {!! Theme::partial('ecommerce.product.search-box') !!}

    <div class="sidebar">
        <div class="widget-title">
            <h3 class="text-heading-5 color-gray-900">{{ __('Filter items') }}</h3>
        </div>
        <div class="widget-content">
            @if ($maxFilterPrice)
                <div class="nonlinear-wrapper">
                    <div class="mt-30">
                        <span class="color-gray-500 d-inline-block mr-5">{{ __('Price Range') }}:</span>
                        <span class="text-heading-6 text-primary d-inline-block">
                            <span class="slider__value">
                                @if (get_application_currency()->is_prefix_symbol)
                                    <span>{{ get_application_currency()->symbol }}<span class="slider__min"></span></span>
                                @else
                                    <span><span class="slider__min"></span>{{ get_application_currency()->symbol }}</span>
                                @endif
                            </span> -
                            <span class="slider__value">
                                @if (get_application_currency()->is_prefix_symbol)
                                    <span>{{ get_application_currency()->symbol }}<span class="slider__max"></span></span>
                                @else
                                    <span><span class="slider__max"></span>{{ get_application_currency()->symbol }}</span>
                                @endif
                            </span>
                        </span>
                        <input class="product-filter-item product-filter-item-price-0" name="min_price"
                            data-min="0" value="{{ BaseHelper::stringify(request()->input('min_price', 0)) }}" type="hidden">
                        <input class="product-filter-item product-filter-item-price-1" name="max_price"
                            data-max="{{ $maxFilterPrice }}" value="{{ BaseHelper::stringify(request()->input('max_price', $maxFilterPrice)) }}"
                            type="hidden">
                    </div>
                    <div class="filter-block mb-50 mt-35">
                        <div class="row mb-20">
                            <div class="col-sm-12">
                                <div class="nonlinear" data-min="0" data-max="{{ $maxFilterPrice }}"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($brands->isNotEmpty())
                <h4 class="text-heading-6 text-primary">{{ __('Brand') }}</h4>
                <ul class="list-type">
                    @foreach ($brands as $brand)
                        <li>
                            <div class="form-check color-gray-500">
                                <input class="form-check-input product-filter-item" type="checkbox" name="brands[]" id="attribute-brand-{{ $rand }}-{{ $brand->id }}"
                                    value="{{ $brand->id }}" @if(in_array($brand->id, request()->input('brands', []))) checked @endif />
                                <label class="form-check-label" for="attribute-brand-{{ $rand }}-{{ $brand->id }}">{{ $brand->name }}</label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif

            @if ($tags->isNotEmpty())
                <h4 class="text-heading-6 text-primary">{{ __('Tag') }}</h4>
                <ul class="list-type">
                    @foreach ($tags as $tag)
                        <li>
                            <div class="form-check color-gray-500">
                                <input class="form-check-input product-filter-item" type="checkbox" name="tags[]" id="attribute-tag-{{ $rand }}-{{ $tag->id }}"
                                    value="{{ $tag->id }}" @if(in_array($tag->id, request()->input('tags', []))) checked @endif />
                                <label class="form-check-label" for="attribute-tag-{{ $rand }}-{{ $tag->id }}">{{ $tag->name }}</label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif

            {!! render_product_swatches_filter([
                'view' => Theme::getThemeNamespace('views.ecommerce.attributes.attributes-filter-renderer')
            ]) !!}
        </div>
    </div>
</form>
