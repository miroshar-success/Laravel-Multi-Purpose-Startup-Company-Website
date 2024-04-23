<div class="mt-50">
    <div class="row mb-50">
        <div class="col-lg-12 text-center">
            <h2 class="color-brand-1 mb-20 wow animate__ animate__fadeIn animated" data-wow-delay=".0s">{{ $category->name }}</h2>
        </div>
        <div class="row px-50">
            <p class="font-lg color-grey-500 text-center">{{ $category->description }}</p>
        </div>
    </div>

    @include(Theme::getThemeNamespace('views.loop'))
</div>
