@if (is_plugin_active('ecommerce'))
    <section class="section bg-7 box-banner-shop-grid">
        @if ($config['image_secondary'])
            <img class="image-secondary" src="{{ RvMedia::getImageUrl($config['image_secondary']) }}" alt="{{ __('Image') }}"/>
        @endif

        @if ($config['image_primary'])
            <img class="image-primary" src="{{ RvMedia::getImageUrl($config['image_primary']) }}" alt="{{ __('Image') }}"/>
        @endif
        <div class="container">
            <div class="banner-shop-grid">
                @if ($config['subtitle'])
                    <span class="font-xl-bold color-grey-300 text-uppercase wow animate__animated animate__fadeIn" data-wow-delay=".0s">{!! BaseHelper::clean($config['subtitle']) !!}</span>
                @endif

                @if ($title = $config['title'])
                    <h2 class="color-brand-1 mt-15 mb-60 font-bold-800 wow animate__animated animate__fadeIn title" data-wow-delay=".0s">{!! BaseHelper::clean($config['title']) !!}</h2>
                @endif

                @if ($categories->count() > 0 )
                    <ul class="list-categories">
                        @foreach($categories as $category)
                            <li class="wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->index }}s">
                                <a @class(['btn btn-white-circle', 'active' => URL::current() === $category->url]) href="{{ $category->url }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </section>
@endif
