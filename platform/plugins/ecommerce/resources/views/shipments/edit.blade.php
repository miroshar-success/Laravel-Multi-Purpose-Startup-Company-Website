@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    @include('plugins/ecommerce::shipments.notification')

    <div class="row">
        <div class="col-md-9">
            @include('plugins/ecommerce::shipments.products', [
                'productEditRouteName' => Auth::user()->hasPermission('products.edit') ? 'products.edit' : '',
                'orderEditRouteName' => Auth::user()->hasPermission('orders.edit') ? 'orders.edit' : '',
            ])

            @include('plugins/ecommerce::shipments.form')

            @include('plugins/ecommerce::shipments.histories')
        </div>

        <div class="col-md-3">
            @include('plugins/ecommerce::shipments.information', [
                'orderEditRouteName' => Auth::user()->hasPermission('orders.edit') ? 'orders.edit' : '',
            ])
        </div>
    </div>
@endsection

@push('footer')
    @if(!$shipment->isCancelled)
        @include('plugins/ecommerce::shipments.partials.update-cod-status', [
            'shipment' => $shipment,
        ])

        @include('plugins/ecommerce::shipments.partials.update-status-modal', [
            'shipment' => $shipment,
        ])
    @endif
@endpush
