<div class="mt-50">
    <div class="text-center text-heading-6 mb-50">{{ __('Search result for: ":query"', ['query' => BaseHelper::stringify(request()->query('q'))]) }}</div>
    @include(Theme::getThemeNamespace('views.loop'))
</div>
