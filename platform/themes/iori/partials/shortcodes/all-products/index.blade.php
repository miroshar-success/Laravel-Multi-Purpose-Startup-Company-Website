<section class="section mt-50">
    <div class="container">
        @if ($title)
            <div class="text-center">
                <h3>{!! BaseHelper::clean($title) !!}</h3>
            </div>
        @endif

        @if ($products->isNotEmpty())
            <div class="mt-30 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                <div class="row mt-50">
                    @foreach ($products as $product)
                        <div class="col-lg-3 col-md-4">
                            {!! Theme::partial('ecommerce.product.item-grid', compact('product')) !!}
                        </div>
                    @endforeach
                </div>
                {!! $products->withQueryString()->links() !!}
            </div>
        @endif
    </div>
</section>
