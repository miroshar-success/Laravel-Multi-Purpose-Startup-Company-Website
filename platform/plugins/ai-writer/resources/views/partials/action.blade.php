@php
    $spinTemplate = json_decode(setting('ai_writer_spin_template'), true);

    $spinTemplate = collect($spinTemplate)->reject(function ($item) {
        return ! $item['title'] || ! $item['content'];
    })->toArray();
@endphp

<div class="d-inline-block editor-action-item">
    <x-core::button icon="ti ti-message-chatbot" color="warning" data-bb-toggle="ai-writer-generate-modal">
        {{ trans('plugins/ai-writer::ai-writer.generate') }}
    </x-core::button>

    @empty(!$spinTemplate)
        <x-core::button icon="ti ti-refresh" color="info" data-bb-toggle="ai-writer-spin-content-modal">
            {{ trans('plugins/ai-writer::ai-writer.spin') }}
        </x-core::button>
    @endempty
</div>

@pushonce('footer')
    <x-core::modal id="ai-writer-generator-modal" size="lg" :title="trans('plugins/ai-writer::ai-writer.form.title')">
        @include('plugins/ai-writer::generate-content')

        <x-slot:footer>
            <x-core::button type="button" data-bs-dismiss="modal">
                {{ trans('core/base::tables.cancel') }}
            </x-core::button>

            <x-core::button
                icon="ti ti-refresh"
                color="primary"
                data-bb-toggle="ai-writer-generate"
                data-generate-url="{{ route('ai-writer.generate') }}"
            >
                {{ trans('plugins/ai-writer::ai-writer.form.generate') }}
            </x-core::button>

            <x-core::button
                icon="ti ti-circle-check"
                color="success"
                data-bb-toggle="ai-writer-push-content"
                data-bb-message="{{ trans('plugins/ai-writer::ai-writer.success.content_pushed') }}"
            >
                {{ trans('plugins/ai-writer::ai-writer.form.push') }}
            </x-core::button>
        </x-slot:footer>
    </x-core::modal>

    @empty(!$spinTemplate)
        <x-core::modal id="ai-writer-spin-modal" size="lg" :title="trans('plugins/ai-writer::ai-writer.form.title')">
            @include('plugins/ai-writer::spin-content')

            <x-slot:footer>
                <x-core::button type="button" data-bs-dismiss="modal">
                    {{ trans('core/base::tables.cancel') }}
                </x-core::button>

                <x-core::button
                    icon="ti ti-refresh"
                    color="primary"
                    data-bb-toggle="ai-writer-spin"
                >
                    {{ trans('plugins/ai-writer::ai-writer.form.spin') }}
                </x-core::button>

                <x-core::button
                    icon="ti ti-circle-check"
                    color="success"
                    data-bb-toggle="ai-writer-push-content"
                    data-bb-message="{{ trans('plugins/ai-writer::ai-writer.success.content_pushed') }}"
                >
                    {{ trans('plugins/ai-writer::ai-writer.form.push') }}
                </x-core::button>
            </x-slot:footer>
        </x-core::modal>
    @endempty
@endpushonce
