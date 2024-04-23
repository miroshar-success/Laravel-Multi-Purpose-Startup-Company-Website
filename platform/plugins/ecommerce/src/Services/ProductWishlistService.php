<?php

namespace Botble\Ecommerce\Services;

use Botble\Ecommerce\Facades\Cart;
use Botble\Ecommerce\Models\Product;
use Botble\Ecommerce\Models\Wishlist;

class ProductWishlistService
{
    public function handle(Product $product): bool
    {
        $guard = auth('customer');

        if (! $guard->check()) {
            $instance = Cart::instance('wishlist');

            $wishlist = $instance->search(fn ($cartItem) => $cartItem->id == $product->getKey());

            if ($wishlist->isEmpty()) {
                $instance
                    ->add($product->getKey(), $product->name, 1, $product->front_sale_price)
                    ->associate(Product::class);

                return true;
            }

            $wishlist->each(fn ($cartItem, $rowId) => $instance->remove($rowId));

            return false;
        }

        $customer = $guard->user();
        $data = [
            'product_id' => $product->getKey(),
            'customer_id' => $customer->getAuthIdentifier(),
        ];

        if (is_added_to_wishlist($product->getKey())) {
            Wishlist::query()->where($data)->delete();

            return false;
        }

        Wishlist::query()->create($data);

        return true;
    }
}
