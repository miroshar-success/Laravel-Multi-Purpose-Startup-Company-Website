<div class="sidebar mt-50">
    <div class="widget-title">
        <h3 class="text-heading-5 color-gray-900">{{ __('Products Search') }}</h3>
    </div>
    <div class="widget-content">
        <div class="card-content mt-4">
            <div class="input-group rounded" id="form-search-products" >
                <input type="text" name="q" class="form-control rounded-start" value="{{ BaseHelper::stringify(request()->query('q')) }}" placeholder="{{ __('Search') }}">
                <button class="input-group-text border-0 me-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
