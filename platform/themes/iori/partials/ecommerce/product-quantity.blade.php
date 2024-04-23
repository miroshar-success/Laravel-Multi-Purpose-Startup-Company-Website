<div class="quantity">
    <div class="detail-qty border radius qty-box">
        <a
            class="qty-down decrease"
            href="#"
        >
            <i class="fi-rs-angle-small-down"></i>
        </a>
        <input
            class="qty-val qty"
            name="{{ $name ?? 'qty' }}"
            type="number"
            value="{{ $value ?? 1 }}"
            title="Qty"
            tabindex="0"
            step="1"
            min="1"
            max="{{ $product->with_storehouse_management ? $product->quantity : 1000 }}"
        >
        <a
            class="qty-up increase"
            href="#"
        >
            <i class="fi-rs-angle-small-up"></i>
        </a>
    </div>
</div>
