@php
    Theme::layout('full-width');
@endphp

{!! Theme::partial('page-header') !!}

<div class="section-box mt-40"></div>
<section class="section-box">
    <div class="container">
        <div class="row wishlist-page-content py-5 mt-3">
            <div class="col-12">
                @if ($products->total())
                    <table
                        class="table cart-form__contents table-striped"
                        cellspacing="0"
                    >
                        <thead>
                            <tr>
                                <th
                                    class="product-thumbnail"
                                    width="100"
                                ></th>
                                <th class="product-name">{{ __('Product') }}</th>
                                <th class="product-price product-md d-md-table-cell d-none">{{ __('Unit Price') }}</th>
                                <th class="product-quantity product-md d-md-table-cell d-none">{{ __('Stock status') }}
                                </th>
                                @if (EcommerceHelper::isCartEnabled())
                                    <th class="product-subtotal product-md d-md-table-cell d-none"></th>
                                @endif
                                <th class="product-remove"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="cart-form__cart-item cart_item">
                                    <td class="product-thumbnail">
                                        <a href="{{ $product->original_product->url }}">
                                            <img
                                                class="img-thumbnail"
                                                src="{{ RvMedia::getImageUrl($product->image, 'thumb', false, RvMedia::getDefaultImage()) }}"
                                                alt="{{ $product->name }}"
                                            >
                                        </a>
                                    </td>
                                    <td
                                        class="product-name d-md-table-cell d-block"
                                        data-title="Product"
                                    >
                                        <a href="{{ $product->original_product->url }}">{{ $product->name }}</a>
                                        @if (is_plugin_active('marketplace') && $product->original_product->store->id)
                                            <div class="variation-group">
                                                <span class="text-secondary">{{ __('Vendor') }}:</span>
                                                <span class="text-primary ms-1">
                                                    <a
                                                        href="{{ $product->original_product->store->url }}">{{ $product->original_product->store->name }}</a>
                                                </span>
                                            </div>
                                        @endif
                                    </td>
                                    <td
                                        class="product-price product-md d-md-table-cell d-block"
                                        data-title="Price"
                                    >
                                        <div class="box-price">
                                            <span class="d-md-none title-price">{{ __('Price') }}: </span>
                                            {!! Theme::partial('ecommerce.product-price', compact('product')) !!}
                                        </div>
                                    </td>
                                    <td
                                        class="product-quantity product-md d-md-table-cell d-block"
                                        data-title="Stock status"
                                    >
                                        <div
                                            class="without-bg product-stock @if ($product->isOutOfStock()) out-of-stock @else in-stock @endif">
                                            @if ($product->isOutOfStock())
                                                {{ __('Out Of Stock') }}
                                            @else
                                                {{ __('In Stock') }}
                                            @endif
                                        </div>
                                    </td>
                                    @if (EcommerceHelper::isCartEnabled())
                                        <td
                                            class="product-subtotal product-md d-md-table-cell d-block"
                                            data-title="Total"
                                        >
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
                                                        class="btn @if ($product->isOutOfStock()) disabled @endif"
                                                        type="submit"
                                                        @if ($product->isOutOfStock()) disabled @endif
                                                    >{{ __('Add') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                    @endif
                                    <td class="product-remove">
                                        <a
                                            class="fs-4 remove remove-wishlist-item"
                                            href="{{ route('public.wishlist.remove', $product->id) }}"
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination">
                        {!! $products->links() !!}
                    </div>
                @else
                    <p class="text-center">{{ __('No products in wishlist!') }}</p>
                @endif
            </div>
        </div>
    </div>
</section>
