<section class="pt-20">
    <div class="container product-details">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form
                    class="form--auth mb-3"
                    method="GET"
                    action="{{ route('public.orders.tracking') }}"
                >
                    <div class="mb-20">
                        <h3>{{ __('Order tracking') }}</h3>
                        <p>{{ __('Tracking your order status') }}</p>
                    </div>
                    <div class="form__content">
                        <div class="sb-group-input mb-3">
                            <label
                                class="mb-5"
                                for="txt-order-id"
                            >{{ __('Order ID') }}<sup>*</sup></label>
                            <input
                                class="form-control"
                                id="txt-order-id"
                                name="order_id"
                                type="text"
                                value="{{ old('order_id', request()->input('order_id')) }}"
                                placeholder="{{ __('Order ID') }}"
                            >
                            @if ($errors->has('order_id'))
                                <span class="text-danger">{{ $errors->first('order_id') }}</span>
                            @endif
                        </div>
                        <div class="sb-group-input mb-3">
                            <label
                                class="mb-5"
                                for="txt-email"
                            >{{ __('Email Address') }}<sup>*</sup></label>
                            <input
                                class="form-control"
                                id="txt-email"
                                name="email"
                                type="email"
                                value="{{ old('email', request()->input('email')) }}"
                                placeholder="{{ __('Please enter your email address') }}"
                            >
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form__actions">
                            <button
                                class="btn btn-brand-1 hover-up"
                                type="submit"
                            >{{ __('Find') }}</button>
                        </div>
                    </div>
                </form>
                @include('plugins/ecommerce::themes.includes.order-tracking-detail')
            </div>
        </div>
    </div>
</section>
