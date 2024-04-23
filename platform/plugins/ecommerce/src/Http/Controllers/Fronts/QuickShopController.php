<?php

namespace Botble\Ecommerce\Http\Controllers\Fronts;

use Botble\Base\Http\Controllers\BaseController;
use Botble\Ecommerce\Facades\EcommerceHelper;
use Botble\Ecommerce\Services\Products\GetProductBySlugService;
use Botble\Ecommerce\Services\Products\GetProductWithCrossSalesBySlugService;
use Botble\Ecommerce\Services\Products\ProductCrossSalePriceService;
use Illuminate\Http\Request;

class QuickShopController extends BaseController
{
    public function show(
        string $slug,
        GetProductBySlugService $getProductBySlugService,
        GetProductWithCrossSalesBySlugService $getProductWithCrossSalesBySlugService,
        Request $request,
    ) {
        $request->validate([
            'reference_product' => ['sometimes', 'required', 'string'],
        ]);

        $product = $getProductBySlugService->handle($slug, [
            'with' => [
                'slugable',
                'tags',
                'tags.slugable',
                'options',
                'options.values',
            ],
        ]);

        abort_unless($product && $product->exists, 404);

        $referenceProduct = null;

        if (
            $request->filled('reference_product')
            && $referenceProduct = $getProductWithCrossSalesBySlugService->handle($request->input('reference_product'))
        ) {
            app(ProductCrossSalePriceService::class)->applyProduct($referenceProduct);
        }

        [$productImages, $productVariation, $selectedAttrs] = EcommerceHelper::getProductVariationInfo($product);

        return $this
            ->httpResponse()
            ->setData(
                view(
                    EcommerceHelper::viewPath('includes.quick-shop'),
                    compact('product', 'productImages', 'productVariation', 'selectedAttrs', 'referenceProduct')
                )->render()
            );
    }
}
