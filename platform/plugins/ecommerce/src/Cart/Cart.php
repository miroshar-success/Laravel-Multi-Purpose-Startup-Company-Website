<?php

namespace Botble\Ecommerce\Cart;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Ecommerce\Cart\Contracts\Buyable;
use Botble\Ecommerce\Cart\Exceptions\CartAlreadyStoredException;
use Botble\Ecommerce\Cart\Exceptions\UnknownModelException;
use Botble\Ecommerce\Facades\EcommerceHelper;
use Botble\Ecommerce\Repositories\Interfaces\ProductInterface;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Closure;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Events\NullDispatcher;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class Cart
{
    protected static Dispatcher $dispatcher;

    public const DEFAULT_INSTANCE = 'cart';

    protected string $instance;

    protected ?Collection $products = null;

    protected float $weight = 0;

    public function __construct(protected SessionManager $session, Dispatcher $events)
    {
        static::$dispatcher = $events;

        $this->instance(self::DEFAULT_INSTANCE);
    }

    public function instance(string $instance = null): self
    {
        $instance = $instance ?: self::DEFAULT_INSTANCE;

        $this->instance = sprintf('%s.%s', 'cart', $instance);

        return $this;
    }

    public function getLastUpdatedAt(): ?CarbonInterface
    {
        return $this->session->get($this->instance . '_updated_at');
    }

    /**
     * Add an item to the cart.
     *
     * @param mixed $id
     * @param mixed $name
     * @param int|float $qty
     * @param float $price
     * @param array $options
     * @return array|\Botble\Ecommerce\Cart\CartItem
     */
    public function add($id, $name = null, $qty = null, $price = null, array $options = [])
    {
        if ($this->isMulti($id)) {
            return array_map(function ($item) {
                return $this->add($item);
            }, $id);
        }

        $cartItem = $this->createCartItem($id, $name, $qty, $price, $options);

        $content = $this->getContent();

        if ($content->has($cartItem->rowId)) {
            $cartItem->qty += $content->get($cartItem->rowId)->qty;
        }

        $content->put($cartItem->rowId, $cartItem);

        $this->putToSession($content);

        static::dispatchEvent('cart.added', $cartItem);

        return $cartItem;
    }

    public function addQuietly($id, $name = null, $qty = null, $price = null, array $options = [])
    {
        return static::withoutEvents(
            fn () => $this->add($id, $name, $qty, $price, $options)
        );
    }

    /**
     * Check if the item is a multidimensional array or an array of Buyables.
     *
     * @param mixed $item
     * @return bool
     */
    protected function isMulti($item)
    {
        if (! is_array($item)) {
            return false;
        }

        $item = reset($item);

        return is_array($item) || $item instanceof Buyable;
    }

    /**
     * Create a new CartItem from the supplied attributes.
     *
     * @param mixed $id
     * @param mixed $name
     * @param int|float $qty
     * @param float $price
     * @param array $options
     * @return \Botble\Ecommerce\Cart\CartItem
     */
    protected function createCartItem($id, $name, $qty, $price, array $options)
    {
        if (
            EcommerceHelper::isEnabledProductOptions() &&
            ($productOptions = Arr::get($options, 'options', [])) &&
            is_array($productOptions)
        ) {
            $price = $this->getPriceByOptions($price, $productOptions);
        }

        if ($id instanceof Buyable) {
            $cartItem = CartItem::fromBuyable($id, $qty ?: []);
            $cartItem->setQuantity($name ?: 1);
            $cartItem->associate($id);
        } elseif (is_array($id)) {
            $cartItem = CartItem::fromArray($id);
            $cartItem->setQuantity($id['qty']);
        } else {
            $cartItem = CartItem::fromAttributes($id, $name, $price, $options);
            $cartItem->setQuantity($qty);
        }

        $cartItem->setTaxRate($options['taxRate'] ?? 0);

        return $cartItem;
    }

    public function getPriceByOptions(float|int $price, array $options = []): float|int
    {
        $basePrice = $price;
        foreach (Arr::get($options, 'optionCartValue', []) as $value) {
            if (is_array($value)) {
                foreach ($value as $valueItem) {
                    if ($valueItem['affect_type'] == 1) {
                        $valueItem['affect_price'] = ($basePrice * $valueItem['affect_price']) / 100;
                    }
                    $price += $valueItem['affect_price'];
                }
            } else {
                if (Arr::get($value, 'option_type') == 'field') {
                    continue;
                }

                if ($value['affect_type'] == 1) {
                    $value['affect_price'] = ($basePrice * $value['affect_price']) / 100;
                }

                $price += $value['affect_price'];
            }
        }

        return $price;
    }

    /**
     * Get the carts content, if there is no cart content set yet, return a new empty Collection
     *
     * @return \Illuminate\Support\Collection
     */
    protected function getContent()
    {
        return $this->session->has($this->instance)
            ? $this->session->get($this->instance)
            : new Collection();
    }

    /**
     * putToSession
     *
     * @return $this
     */
    public function putToSession($content)
    {
        $this->setLastUpdatedAt();

        $this->session->put($this->instance, $content);

        return $this;
    }

    public function setLastUpdatedAt(): void
    {
        $this->session->put($this->instance . '_updated_at', Carbon::now());
    }

    /**
     * Update the cart item with the given rowId.
     *
     * @param string $rowId
     * @param mixed $qty
     * @return \Botble\Ecommerce\Cart\CartItem|bool
     */
    public function update($rowId, $qty)
    {
        $cartItem = $this->get($rowId);

        if ($qty instanceof Buyable) {
            $cartItem->updateFromBuyable($qty);
        } elseif (is_array($qty)) {
            $cartItem->updateFromArray($qty);
        } else {
            $cartItem->qty = $qty;
        }

        $content = $this->getContent();

        if ($rowId !== $cartItem->rowId) {
            $content->pull($rowId);

            if ($content->has($cartItem->rowId)) {
                $existingCartItem = $this->get($cartItem->rowId);
                $cartItem->setQuantity((int) $existingCartItem->qty + (int) $cartItem->qty);
            }
        }

        if ($cartItem->qty <= 0) {
            $this->remove($cartItem->rowId);

            return false;
        }

        $content->put($cartItem->rowId, $cartItem);

        $cartItem->updated_at = Carbon::now();

        static::dispatchEvent('cart.updated', $cartItem);

        $this->putToSession($content);

        return $cartItem;
    }

    public function updateQuietly($rowId, $qty)
    {
        return static::withoutEvents(fn () => $this->update($rowId, $qty));
    }

    /**
     * Get a cart item from the cart by its rowId.
     *
     * @param string $rowId
     * @return \Botble\Ecommerce\Cart\CartItem|null
     */
    public function get($rowId)
    {
        $content = $this->getContent();

        if (! $content->has($rowId)) {
            return null;
        }

        return $content->get($rowId);
    }

    /**
     * Remove the cart item with the given rowId from the cart.
     *
     * @param string $rowId
     * @return void
     */
    public function remove($rowId)
    {
        $cartItem = $this->get($rowId);

        $content = $this->getContent();

        $content->pull($cartItem->rowId);

        static::dispatchEvent('cart.removed', $cartItem);

        $this->putToSession($content);
    }

    public function removeQuietly($rowId)
    {
        return static::withoutEvents(fn () => $this->remove($rowId));
    }

    /**
     * Destroy the current cart instance.
     */
    public function destroy(): void
    {
        $this->session->remove($this->instance);
    }

    /**
     * Get the number of items in the cart.
     *
     * @return int|float
     */
    public function count()
    {
        $content = $this->getContent();

        return $content->sum('qty');
    }

    public function isNotEmpty(): bool
    {
        return $this->getContent()->isNotEmpty();
    }

    public function isEmpty(): bool
    {
        return $this->getContent()->isEmpty();
    }

    /**
     * Get the number of items in the cart.
     *
     * @return int|float
     */
    public function countByItems($content)
    {
        return $content->sum('qty');
    }

    /**
     * @return int
     */
    public function rawTotal()
    {
        $content = $this->getContent();

        return $content->reduce(function ($total, ?CartItem $cartItem) {
            if (! $cartItem) {
                return 0;
            }

            if (! EcommerceHelper::isTaxEnabled()) {
                return $total + $cartItem->qty * $cartItem->price;
            }

            return $total + ($cartItem->qty * ($cartItem->priceTax == 0 ? $cartItem->price : $cartItem->priceTax));
        }, 0);
    }

    /**
     * @return int
     */
    public function rawTotalByItems($content)
    {
        return $content->reduce(function ($total, ?CartItem $cartItem) {
            if (! $cartItem) {
                return 0;
            }

            if (! EcommerceHelper::isTaxEnabled()) {
                return $total + $cartItem->qty * $cartItem->price;
            }

            return $total + ($cartItem->qty * ($cartItem->priceTax == 0 ? $cartItem->price : $cartItem->priceTax));
        }, 0);
    }

    /**
     * Get the raw total tax of the items in the cart.
     *
     * @return float
     */
    public function rawTaxByItems($content)
    {
        if (! EcommerceHelper::isTaxEnabled()) {
            return 0;
        }

        return $content->reduce(function ($tax, CartItem $cartItem) {
            return $tax + ($cartItem->qty * $cartItem->tax);
        }, 0);
    }

    /**
     * @return float
     */
    public function rawSubTotal()
    {
        $content = $this->getContent();

        return $content->reduce(function ($subTotal, CartItem $cartItem) {
            return $subTotal + ($cartItem->qty * $cartItem->price);
        }, 0);
    }

    /**
     * @return float
     */
    public function rawSubTotalByItems($content)
    {
        return $content->reduce(function ($subTotal, CartItem $cartItem) {
            return $subTotal + ($cartItem->qty * $cartItem->price);
        }, 0);
    }

    /**
     * @return int
     */
    public function rawQuantityByItemId($id)
    {
        return $this->getContent()->reduce(function ($qty, CartItem $cartItem) use ($id) {
            return $cartItem->id == $id ? $qty + $cartItem->qty : $qty;
        }, 0);
    }

    /**
     * @return int
     */
    public function rawTotalQuantity()
    {
        $content = $this->getContent();

        return $content->reduce(function ($qty, CartItem $cartItem) {
            return $qty + $cartItem->qty;
        }, 0);
    }

    /**
     * Search the cart content for a cart item matching the given search closure.
     *
     * @param \Closure $search
     * @return \Illuminate\Support\Collection
     */
    public function search(Closure $search)
    {
        $content = $this->getContent();

        return $content->filter($search);
    }

    /**
     * Associate the cart item with the given rowId with the given model.
     *
     * @param string $rowId
     * @param mixed $model
     * @return void
     */
    public function associate($rowId, $model)
    {
        if (is_string($model) && ! class_exists($model)) {
            throw new UnknownModelException('The supplied model ' . $model . ' does not exist.');
        }

        $cartItem = $this->get($rowId);

        $cartItem->associate($model);

        $content = $this->getContent();

        $content->put($cartItem->rowId, $cartItem);

        $this->putToSession($content);
    }

    /**
     * Set the tax rate for the cart item with the given rowId.
     *
     * @param string $rowId
     * @param int|float $taxRate
     * @return void
     */
    public function setTax($rowId, $taxRate)
    {
        $cartItem = $this->get($rowId);

        $cartItem->setTaxRate($taxRate);

        $cartItem->updated_at = Carbon::now();

        $content = $this->getContent();

        $content->put($cartItem->rowId, $cartItem);

        $this->putToSession($content);
    }

    /**
     * Store the current instance of the cart.
     *
     * @param mixed $identifier
     * @return void
     */
    public function store($identifier)
    {
        $content = $this->getContent();

        if ($this->storedCartWithIdentifierExists($identifier)) {
            throw new CartAlreadyStoredException('A cart with identifier ' . $identifier . ' was already stored.');
        }

        $this->getConnection()->table($this->getTableName())->insert([
            'identifier' => $identifier,
            'instance' => $this->currentInstance(),
            'content' => serialize($content),
        ]);

        static::dispatchEvent('cart.stored');
    }

    public function storeQuietly($identifier)
    {
        return static::withoutEvents(fn () => $this->store($identifier));
    }

    protected function storedCartWithIdentifierExists(string $identifier): bool
    {
        return $this->getConnection()->table($this->getTableName())->where('identifier', $identifier)->exists();
    }

    /**
     * Get the database connection.
     *
     * @return \Illuminate\Database\Connection
     */
    protected function getConnection()
    {
        $connectionName = $this->getConnectionName();

        return app(DatabaseManager::class)->connection($connectionName);
    }

    /**
     * Get the database connection name.
     *
     * @return string
     */
    protected function getConnectionName()
    {
        $connection = config('plugins.ecommerce.cart.database.connection');

        return empty($connection) ? config('database.default') : $connection;
    }

    /**
     * Get the database table name.
     *
     * @return string
     */
    protected function getTableName()
    {
        return config('plugins.ecommerce.cart.database.table', 'ec_cart');
    }

    /**
     * Get the current cart instance.
     *
     * @return string
     */
    public function currentInstance()
    {
        return str_replace('cart.', '', $this->instance);
    }

    /**
     * Restore the cart with the given identifier.
     *
     * @param mixed $identifier
     * @return void
     */
    public function restore($identifier)
    {
        if (! $this->storedCartWithIdentifierExists($identifier)) {
            return;
        }

        $stored = $this->getConnection()->table($this->getTableName())
            ->where('identifier', $identifier)->first();

        $storedContent = unserialize($stored->content);

        $currentInstance = $this->currentInstance();

        $this->instance($stored->instance);

        $content = $this->getContent();

        foreach ($storedContent as $cartItem) {
            $content->put($cartItem->rowId, $cartItem);
        }

        static::dispatchEvent('cart.restored');

        $this->putToSession($content);

        $this->instance($currentInstance);

        $this->getConnection()->table($this->getTableName())
            ->where('identifier', $identifier)->delete();
    }

    public function restoreQuietly($identifier)
    {
        return static::withoutEvents(fn () => $this->restore($identifier));
    }

    /**
     * Magic method to make accessing the total, tax and subtotal properties possible.
     *
     * @param string $attribute
     * @return float|string|null
     */
    public function __get($attribute)
    {
        if ($attribute === 'total') {
            return $this->total();
        }

        if ($attribute === 'tax') {
            return $this->tax();
        }

        if ($attribute === 'subtotal') {
            return $this->subtotal();
        }

        return null;
    }

    /**
     * Get the total price of the items in the cart.
     *
     * @return string
     */
    public function total()
    {
        $content = $this->getContent();

        $total = $content->reduce(function ($total, ?CartItem $cartItem) {
            if (! $cartItem) {
                return 0;
            }

            return $total + ($cartItem->qty * ($cartItem->priceTax == 0 ? $cartItem->price : $cartItem->priceTax));
        }, 0);

        return format_price($total);
    }

    /**
     * Get the total tax of the items in the cart.
     *
     * @return float|string
     */
    public function tax()
    {
        if (! EcommerceHelper::isTaxEnabled()) {
            return 0;
        }

        return format_price($this->rawTax());
    }

    /**
     * Get the raw total tax of the items in the cart.
     *
     * @return float
     */
    public function rawTax()
    {
        if (! EcommerceHelper::isTaxEnabled()) {
            return 0;
        }

        $content = $this->getContent();

        return $content->reduce(function ($tax, CartItem $cartItem) {
            return $tax + ($cartItem->qty * $cartItem->tax);
        }, 0);
    }

    /**
     * Get the subtotal (total - tax) of the items in the cart.
     *
     * @return string
     */
    public function subtotal()
    {
        $content = $this->getContent();

        $subTotal = $content->reduce(function ($subTotal, CartItem $cartItem) {
            return $subTotal + ($cartItem->qty * $cartItem->price);
        }, 0);

        return format_price($subTotal);
    }

    /**
     * Get all products in Cart
     *
     * @return \Illuminate\Support\Collection|\Illuminate\Database\Eloquent\Collection
     */
    public function products()
    {
        if ($this->products) {
            return $this->products;
        }

        $cartContent = $this->instance('cart')->content();
        $productIds = $cartContent->pluck('id')->toArray();
        $products = collect();
        $weight = 0;
        if ($productIds) {
            $with = [
                'variationInfo',
                'variationInfo.configurableProduct',
                'variationInfo.configurableProduct.slugable',
                'variationProductAttributes',
            ];

            if (is_plugin_active('marketplace')) {
                $with = array_merge($with, [
                    'variationInfo.configurableProduct.store',
                    'variationInfo.configurableProduct.store.slugable',
                ]);
            }

            $products = app(ProductInterface::class)->getProducts([
                'condition' => [
                    ['ec_products.id', 'IN', $productIds],
                ],
                'with' => $with,
            ]);
        }

        $productsInCart = new EloquentCollection();

        if ($products->isNotEmpty()) {
            foreach ($cartContent as $cartItem) {
                $product = $products->firstWhere('id', $cartItem->id);
                if (! $product || $product->original_product->status != BaseStatusEnum::PUBLISHED) {
                    $this->remove($cartItem->rowId);
                } else {
                    $productInCart = clone $product;
                    $productInCart->cartItem = $cartItem;
                    $productsInCart->push($productInCart);
                    $weight += $product->weight * $cartItem->qty;
                }
            }
        }

        $weight = EcommerceHelper::validateOrderWeight($weight);

        $this->products = $productsInCart;
        $this->weight = $weight;

        if ($this->products->isEmpty()) {
            $this->instance('cart')->destroy();
        }

        return $this->products;
    }

    /**
     * Get the content of the cart.
     *
     * @return \Illuminate\Support\Collection
     */
    public function content()
    {
        if (empty($this->session->get($this->instance))) {
            return collect();
        }

        return $this->session->get($this->instance);
    }

    public function weight(): float
    {
        return EcommerceHelper::validateOrderWeight($this->weight);
    }

    public static function getEventDispatcher(): Dispatcher
    {
        return static::$dispatcher;
    }

    public static function setEventDispatcher(Dispatcher $dispatcher): void
    {
        static::$dispatcher = $dispatcher;
    }

    public static function withoutEvents(callable $callback)
    {
        $dispatcher = static::getEventDispatcher();

        static::setEventDispatcher(new NullDispatcher($dispatcher));

        try {
            return $callback();
        } finally {
            if ($dispatcher) {
                static::setEventDispatcher($dispatcher);
            }
        }
    }

    protected static function dispatchEvent(string $event, $parameters = []): void
    {
        if (isset(static::$dispatcher)) {
            static::$dispatcher->dispatch($event, $parameters);
        }
    }

    public function refresh(): void
    {
        $cart = $this->instance('cart');

        if ($cart->isEmpty()) {
            return;
        }

        $ids = $cart->content()->pluck('id')->toArray();

        $products = get_products([
            'condition' => [
                ['ec_products.id', 'IN', $ids],
            ],
        ]);

        if ($products->isEmpty()) {
            return;
        }

        foreach ($cart->content() as $rowId => $cartItem) {
            $product = $products->firstWhere('id', $cartItem->id);
            if (! $product || $product->original_product->status != BaseStatusEnum::PUBLISHED) {
                $this->remove($cartItem->rowId);
            } else {
                $cart->removeQuietly($rowId);

                $parentProduct = $product->original_product;

                $options = $cartItem->options->toArray();
                $options['image'] = $product->image ?: $parentProduct->image;

                $options['taxRate'] = $cartItem->getTaxRate();

                $cart->addQuietly(
                    $cartItem->id,
                    $cartItem->name,
                    $cartItem->qty,
                    $product->front_sale_price,
                    $options
                );
            }
        }
    }

    public function taxClassesName(): string
    {
        $taxes = [];

        foreach ($this->content() as $cartItem) {
            if (! $cartItem->taxRate || ! $cartItem->options->taxClasses) {
                continue;
            }

            foreach ($cartItem->options->taxClasses as $taxName => $taxRate) {
                $taxes[] = $taxName . ' - ' . $taxRate . '%';
            }
        }

        return implode(', ', array_unique($taxes));
    }
}
