@if (is_plugin_active('blog'))
    <div class="card">
        @if ($title = $config['name'])
            <p class="title-search-sidebar">{{ $title }}</p>
        @endif
        <div class="card-content p-4">
            <form class="input-group rounded" action="{{ route('public.search') }}" method="get">
                <input type="search" name="q" class="form-control rounded-start" value="{{ BaseHelper::stringify(request()->query('q')) }}" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <button class="input-group-text border-0 me-2" style="width: 50px">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
@endif
