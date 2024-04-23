@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    <x-core::card>
        <x-core::card.header>
            <x-core::card.title>
                {{ trans('plugins/ecommerce::export.products.title') }}
            </x-core::card.title>
        </x-core::card.header>
        <x-core::card.body>
            <div class="row text-center py-5">
                <div class="col-6">
                    <h3>{{ trans('plugins/ecommerce::export.products.total_products') }}</h3>
                    <h2 class="fs-1 text-primary">{{ $totalProduct }}</h2>
                </div>
                <div class="col-6">
                    <h3>{{ trans('plugins/ecommerce::export.products.total_variations') }}</h3>
                    <h2 class="fs-1 text-info">{{ $totalVariation }}</h2>
                </div>
            </div>

            <x-core::button
                data-filename="export_products.csv"
                :href="route('ecommerce.export.products.index')"
                color="primary"
                data-bb-toggle="data-export"
                class="w-100"
            >
                {{ trans('plugins/ecommerce::export.start_export') }}
            </x-core::button>
        </x-core::card.body>
    </x-core::card>
@endsection
