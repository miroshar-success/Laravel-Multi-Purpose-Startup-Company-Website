@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    <x-core::form class="mb-3 form-import-data" enctype="multipart/form-data">
        <x-core::card>
            <x-core::card.header>
                <x-core::card.title>
                    {{ trans('plugins/ecommerce::bulk-import.menu') }}
                </x-core::card.title>
            </x-core::card.header>
            <x-core::card.body>
                <x-core::form.select
                    :label="trans('plugins/ecommerce::bulk-import.import_types.name')"
                    name="type"
                    :options="[
                        'all' => trans('plugins/ecommerce::bulk-import.import_types.all'),
                        'products' => trans('plugins/ecommerce::bulk-import.import_types.products'),
                        'variations' => trans('plugins/ecommerce::bulk-import.import_types.variations'),
                    ]"
                    :required="true"
                />

                <x-core::form.text-input
                    :label="trans('plugins/ecommerce::bulk-import.choose_file')"
                    type="file"
                    name="file"
                    :helper-text="trans('plugins/ecommerce::bulk-import.choose_file_with_mime', ['types' => implode(', ', config('plugins.ecommerce.general.bulk-import.mimes', []))])"
                />

                <div class="mb-3 text-center p-2 border bg-body text-body">
                    <a
                        class="download-template text-decoration-none"
                        data-url="{{ route('ecommerce.import.products.download-template') }}"
                        data-extension="csv"
                        data-filename="template_products_import.csv"
                        data-downloading="<i class='fas fa-spinner fa-spin'></i> {{ trans('plugins/ecommerce::bulk-import.downloading') }}"
                        href="#"
                    >
                        <x-core::icon name="ti ti-file-type-csv" />
                        {{ trans('plugins/ecommerce::bulk-import.download-csv-file') }}
                    </a> &nbsp; | &nbsp;
                    <a
                        class="download-template text-decoration-none"
                        data-url="{{ route('ecommerce.import.products.download-template') }}"
                        data-extension="xlsx"
                        data-filename="template_products_import.xlsx"
                        data-downloading="<i class='fas fa-spinner fa-spin'></i> {{ trans('plugins/ecommerce::bulk-import.downloading') }}"
                        href="#"
                    >
                        <x-core::icon name="ti ti-file-spreadsheet" />
                        {{ trans('plugins/ecommerce::bulk-import.download-excel-file') }}
                    </a>
                </div>

                <div class="d-grid">
                    <x-core::button
                        type="submit"
                        color="primary"
                        :data-choose-file="trans('plugins/ecommerce::bulk-import.please_choose_the_file')"
                        :data-loading-text="trans('plugins/ecommerce::bulk-import.loading_text')"
                        :data-complete-text="trans('plugins/ecommerce::bulk-import.imported_successfully')"
                    >
                        {{ trans('plugins/ecommerce::bulk-import.start_import') }}
                    </x-core::button>
                </div>
            </x-core::card.body>
        </x-core::card>

        <div class="hidden main-form-message mt-3">
            <p id="imported-message"></p>
            <x-core::card class="bg-danger-lt show-errors hidden">
                <x-core::card.header>
                    <x-core::card.title class="text-warning">
                        {{ trans('plugins/ecommerce::bulk-import.failures') }}
                    </x-core::card.title>
                </x-core::card.header>
                <x-core::table :hover="false">
                    <x-core::table.header>
                        <x-core::table.header.cell>
                            #{{ trans('plugins/ecommerce::bulk-import.row') }}
                        </x-core::table.header.cell>
                        <x-core::table.header.cell>
                            {{ trans('plugins/ecommerce::bulk-import.attribute') }}
                        </x-core::table.header.cell>
                        <x-core::table.header.cell>
                            {{ trans('plugins/ecommerce::bulk-import.errors') }}
                        </x-core::table.header.cell>
                    </x-core::table.header>
                    <x-core::table.body id="imported-listing"></x-core::table.body>
                </x-core::table>
            </x-core::card>
        </div>
    </x-core::form>

    <x-core::card class="mb-3">
        <x-core::card.header>
            <x-core::card.title>
                {{ trans('plugins/ecommerce::bulk-import.rules') }}
            </x-core::card.title>
        </x-core::card.header>
        <div class="table-responsive">
            <x-core::table class="table-bordered overflow-auto" :striped="false" :hover="false">
                <x-core::table.header>
                    <x-core::table.header.cell>
                        {{ trans('plugins/ecommerce::bulk-import.column') }}
                    </x-core::table.header.cell>
                    <x-core::table.header.cell>
                        {{ trans('plugins/ecommerce::bulk-import.rules') }}
                    </x-core::table.header.cell>
                </x-core::table.header>
                <x-core::table.body>
                    @foreach ($rules as $k => $rule)
                        <x-core::table.body.row>
                            <x-core::table.body.cell>
                                {{ Arr::get($headings, $k) }}
                            </x-core::table.body.cell>
                            <x-core::table.body.cell>
                                ({{ $rule }})
                            </x-core::table.body.cell>
                        </x-core::table.body.row>
                    @endforeach
                </x-core::table.body>
            </x-core::table>
        </div>
    </x-core::card>

    <x-core::card>
        <x-core::card.header>
            <x-core::card.title>
                {{ trans('plugins/ecommerce::bulk-import.template') }}
            </x-core::card.title>
        </x-core::card.header>
        <div class="table-responsive">
            <x-core::table class="table-bordered" :hover="false">
                <x-core::table.header>
                    @foreach ($headings as $heading)
                        <x-core::table.header.cell>{{ $heading }}</x-core::table.header.cell>
                    @endforeach
                </x-core::table.header>
                <x-core::table.body>
                    @foreach ($data as $product)
                        <x-core::table.body.row>
                            @foreach ($headings as $k => $h)
                                <x-core::table.body.cell>{{ Arr::get($product, $k) }}</x-core::table.body.cell>
                            @endforeach
                        </x-core::table.body.row>
                    @endforeach
                </x-core::table.body>
            </x-core::table>
        </div>
    </x-core::card>
@endsection

@push('footer')
    <x-core::custom-template id="failure-template">
        <x-core::table.body.row>
            <x-core::table.body.cell>__row__</x-core::table.body.cell>
            <x-core::table.body.cell>__attribute__</x-core::table.body.cell>
            <x-core::table.body.cell>__errors__</x-core::table.body.cell>
        </x-core::table.body.row>
    </x-core::custom-template>
@endpush
