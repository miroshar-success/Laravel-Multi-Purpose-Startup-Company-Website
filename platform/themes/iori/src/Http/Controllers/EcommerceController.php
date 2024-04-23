<?php

namespace Theme\Iori\Http\Controllers;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Ecommerce\Facades\Cart;
use Botble\Ecommerce\Facades\EcommerceHelper;
use Botble\Theme\Facades\Theme;
use Botble\Theme\Http\Controllers\PublicController;
use Illuminate\Http\Request;

class EcommerceController extends PublicController
{
    public function __construct(protected BaseHttpResponse $httpResponse)
    {
        $this->middleware(function ($request, $next) {
            if (! $request->ajax()) {
                return $this->httpResponse->setNextUrl(route('public.index'));
            }

            return $next($request);
        })->only([
            'ajaxGetQuickView',
            'ajaxCount',
            'ajaxCartSidebar',
        ]);
    }

    public function ajaxGetQuickView(Request $request, int|string|null $id = null)
    {
        if (! $id) {
            $id = (int) $request->input('product_id');
        }

        $product = null;

        if ($id) {
            $product = get_products([
                'condition' => [
                    'ec_products.id' => $id,
                    'ec_products.status' => BaseStatusEnum::PUBLISHED,
                ],
                'take' => 1,
                'with' => [
                    'slugable',
                    'tags',
                    'tags.slugable',
                ],
            ] + EcommerceHelper::withReviewsParams());
        }

        if (! $product) {
            return $this->httpResponse->setError()->setMessage(__('This product is not available.'));
        }

        [$productImages, $productVariation, $selectedAttrs] = EcommerceHelper::getProductVariationInfo($product);

        return $this
            ->httpResponse
            ->setData(Theme::partial('ecommerce.quick-view', compact('product', 'selectedAttrs', 'productImages', 'productVariation')));
    }

    public function ajaxCount(BaseHttpResponse $response)
    {
        return $response->setData([
            'count' => [
                'cart' => Cart::instance('cart')->count(),
                'wishlist' => Cart::instance('wishlist')->count(),
                'compare' => Cart::instance('compare')->count(),
            ],
        ]);
    }

    public function ajaxCartSidebar(BaseHttpResponse $response)
    {
        return $response->setData([
            'count' => Cart::instance('cart')->count(),
            'cart_content' => Theme::partial('ecommerce.cart.cart-content'),
            'cart_footer' => Theme::partial('ecommerce.cart.cart-footer'),
        ]);
    }
}
