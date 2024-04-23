<span class="text-showing font-md color-grey-500 d-inline-block mr-40">
    {{ __('Showing :from – :to of :total results', [
        'from' => $products->firstItem(),
        'to' => $products->lastItem(),
        'total' => $products->total(),
    ]) }}
</span>
