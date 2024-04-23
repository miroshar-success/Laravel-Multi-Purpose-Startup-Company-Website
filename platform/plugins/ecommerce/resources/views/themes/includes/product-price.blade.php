<div class="bb-product-price mb-3">
    @if ($product->front_sale_price !== $product->price)
        <span>
            <span class="bb-product-price-text fw-bold">{{ format_price($product->front_sale_price) }}</span>
            <span class="bb-product-price-text-old">
                <small><del class="text-muted">{{ format_price($product->price) }}</del></small>
            </span>
        </span>
    @else
        <span>
            <span class="bb-product-price-text fw-bold">{{ format_price($product->price) }}</span>
        </span>
    @endif
</div>
