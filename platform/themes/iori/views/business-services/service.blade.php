{!! Theme::partial('breadcrumb') !!}

<div class="section mt-40">
    <div class="container">
        <div class="content-single">
            <h2 class="color-brand-1 mb-20">{{ $service->name }}</h2>

            <p class="color-grey-900 font-lg-bold mb-25">{{ $service->description }}</p>

            <div class="ck-content font-md color-grey-500">{!! BaseHelper::clean($service->content) !!}</div>
        </div>
    </div>
</div>
