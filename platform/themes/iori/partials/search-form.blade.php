@php
    if (! isset($formActionUrl) && ! isset($formAjaxUrl)) {
        $formActionUrl = null;
        $formAjaxUrl = null;

        if (is_plugin_active('blog')) {
            $formActionUrl = route('public.search');
            $formAjaxUrl = route('public.ajax.search');
        }

        if (is_plugin_active('ecommerce')) {
            $formActionUrl = route('public.products');
            $formAjaxUrl = route('public.ajax.search-products');
        }
    }
@endphp

@if ($formActionUrl && $formAjaxUrl)
    <div class="box-notify-me">
        <form action="{{ $formActionUrl }}" class="form-autocomplete-search">
            <div class="inner-notify-me">
                <input class="form-control autocomplete-search" name="q" type="text" required placeholder="{{ __('Search...') }}" data-ajax-url="{{ $formAjaxUrl }}" autocomplete="off">
                <button class="btn btn-brand-1 font-md" type="submit">
                    {{ __('Search') }}
                    <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </button>
            </div>
            <div class="mt-2 text-sm search-message text-danger"></div>
        </form>
        <div class="search-results"></div>
    </div>
@endif

