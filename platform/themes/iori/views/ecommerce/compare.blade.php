@php
    Theme::layout('full-width');
@endphp

{!! Theme::partial('page-header') !!}

<div class="section-box mt-40"></div>
<section class="section-box">
    <div class="container">
        <div class="row compare-page-content py-5 mt-3">
            <div class="col-12">
                @if ($products->isNotEmpty())
                    <div class="table-responsive">
                        <table
                            class="table table-bordered table-striped"
                            role="grid"
                            cellpadding="0"
                            cellspacing="0"
                        >
                            <thead>
                                <tr
                                    role="row"
                                    style="height: 0px;"
                                >
                                    <th
                                        style="padding-top: 0; padding-bottom: 0; border-top-width: 0; border-bottom-width: 0; height: 0; width: 0;"
                                        rowspan="1"
                                        colspan="1"
                                    ></th>
                                    @foreach ($products as $product)
                                        <td
                                            style="padding-top: 0; padding-bottom: 0; border-top-width: 0; border-bottom-width: 0; height: 0; width: 0;"
                                            rowspan="1"
                                            colspan="1"
                                        ></td>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="border-top-0">
                                <tr class="d-none">
                                    <th></th>
                                    @foreach ($products as $product)
                                        <td></td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th></th>
                                    @foreach ($products as $product)
                                        <td>
                                            <div style="max-width: 150px">
                                                <div class="img-fluid-eq">
                                                    <div class="img-fluid-eq__dummy"></div>
                                                    <div class="img-fluid-eq__wrap">
                                                        <img
                                                            src="{{ RvMedia::getImageUrl($product->image, 'thumb', false, RvMedia::getDefaultImage()) }}"
                                                            alt="{{ $product->name }}"
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>{{ __('Title') }}</th>
                                    @foreach ($products as $product)
                                        <td>{{ $product->name }}</td>
                                    @endforeach
                                </tr>
                                <tr class="price">
                                    <th>{{ __('Price') }}</th>
                                    @foreach ($products as $product)
                                        <td>
                                            {!! Theme::partial('ecommerce.product-price', compact('product')) !!}
                                        </td>
                                    @endforeach
                                </tr>
                                <tr class="description">
                                    <th>{{ __('Description') }}</th>
                                    @foreach ($products as $product)
                                        <td>
                                            {!! BaseHelper::clean($product->description) !!}
                                        </td>
                                    @endforeach
                                </tr>
                                <tr class="sku">
                                    <th>{{ __('SKU') }}</th>
                                    @foreach ($products as $product)
                                        <td>{{ $product->sku ? '#' . $product->sku : '' }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>{{ __('Availability') }}</th>
                                    @foreach ($products as $product)
                                        <td>
                                            <div
                                                class="without-bg product-stock @if ($product->isOutOfStock()) out-of-stock @else in-stock @endif">
                                                @if ($product->isOutOfStock())
                                                    {{ __('Out of stock') }}
                                                @else
                                                    {{ __('In stock') }}
                                                @endif
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>
                                @foreach ($attributeSets as $attributeSet)
                                    @if ($attributeSet->is_comparable)
                                        <tr>
                                            <th class="heading">
                                                {{ $attributeSet->title }}
                                            </th>

                                            @foreach ($products as $product)
                                                @php
                                                    $attributes = app(\Botble\Ecommerce\Repositories\Interfaces\ProductInterface::class)
                                                        ->getRelatedProductAttributes($product)
                                                        ->where('attribute_set_id', $attributeSet->id)
                                                        ->sortBy('order');
                                                @endphp

                                                @if ($attributes->isNotEmpty())
                                                    @if ($attributeSet->display_layout == 'dropdown')
                                                        <td>
                                                            {{ $attributes->pluck('title')->implode(', ') }}
                                                        </td>
                                                    @elseif ($attributeSet->display_layout == 'text')
                                                        <td>
                                                            <div class="attribute-values">
                                                                <ul class="text-swatch attribute-swatch color-swatch">
                                                                    @foreach ($attributes as $attribute)
                                                                        <li
                                                                            class="attribute-swatch-item"
                                                                            style="display: inline-block"
                                                                        >
                                                                            <label>
                                                                                <input
                                                                                    class="form-control product-filter-item"
                                                                                    type="radio"
                                                                                    disabled
                                                                                >
                                                                                <span
                                                                                    style="cursor: default">{{ $attribute->title }}</span>
                                                                            </label>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="attribute-values">
                                                                <ul class="visual-swatch color-swatch attribute-swatch">
                                                                    @foreach ($attributes as $attribute)
                                                                        <li
                                                                            class="attribute-swatch-item"
                                                                            style="display: inline-block"
                                                                        >
                                                                            <div class="custom-radio">
                                                                                <label>
                                                                                    <input
                                                                                        class="form-control product-filter-item"
                                                                                        type="radio"
                                                                                        disabled
                                                                                    >
                                                                                    <span
                                                                                        style="{{ $attribute->image ? 'background-image: url(' . RvMedia::getImageUrl($attribute->image) . ');' : 'background-color: ' . $attribute->color . ';' }}; cursor: default;"
                                                                                    ></span>
                                                                                </label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    @endif
                                                @else
                                                    <td>&mdash;</td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endif
                                @endforeach

                                @if (EcommerceHelper::isCartEnabled())
                                    <tr>
                                        <th>{{ __('Add to cart') }}</th>
                                        @foreach ($products as $product)
                                            <td>
                                                <form
                                                    class="cart-form"
                                                    action="{{ route('public.cart.add-to-cart') }}"
                                                    method="POST"
                                                >
                                                    @csrf
                                                    <input
                                                        class="hidden-product-id"
                                                        name="id"
                                                        type="hidden"
                                                        value="{{ $product->is_variation || !$product->defaultVariation->product_id ? $product->id : $product->defaultVariation->product_id }}"
                                                    />
                                                    <input
                                                        name="qty"
                                                        type="hidden"
                                                        value="1"
                                                    >
                                                    <div class="button-add">
                                                        <button
                                                            class="btn btn-cart @if ($product->isOutOfStock()) disabled @endif"
                                                            type="submit"
                                                            @if ($product->isOutOfStock()) disabled @endif
                                                        >{{ __('Add') }}</button>
                                                    </div>
                                                </form>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endif

                                <tr>
                                    <th></th>
                                    @foreach ($products as $product)
                                        <td>
                                            <a
                                                class="fs-4 remove remove-compare-item"
                                                href="{{ route('public.compare.remove', $product->id) }}"
                                                aria-label="{{ __('Remove this item') }}"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    width="24px"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                                    />
                                                </svg>
                                            </a>
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-center">{{ __('No products in compare list!') }}</p>
                @endif
            </div>
        </div>
    </div>
</section>
