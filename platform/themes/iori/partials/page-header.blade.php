<div class="section pt-40 content-term">
    @if (Theme::get('headerBreadcrumbStyle') === 'has_background_color')
        <div class="box-bg-term"></div>
    @endif
    <div class="container">
        <div class="breadcrumbs">
            <ul>
                @foreach($crumbs = Theme::breadcrumb()->getCrumbs() as $i => $crumb)
                    <li>
                        <a href="{{ $crumb['url'] }}">
                            @if($loop->first)
                                <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                            @endif
                            {{ $crumb['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="content-main mt-50">
            <div class="text-center">
                <h1 class="h1 fw-bold color-brand-1 mb-10">{!! BaseHelper::clean($title ?? SeoHelper::getTitle()) !!}</h1>

                @if(Theme::has('pageDescription'))
                    <div class="text-muted">
                        {!! BaseHelper::clean(Theme::get('pageDescription')) !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
