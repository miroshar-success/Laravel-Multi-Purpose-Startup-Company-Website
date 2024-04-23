<section class="section mt-40">
    <div class="container">
        <div class="row">
            @foreach($testimonials as $testimonial)
                <div class="col-lg-6">
                    <div class="item-core mb-30">
                        @if($authorAvatar = $testimonial->image)
                            <div class="item-image">
                                <img src="{{ RvMedia::getImageUrl($authorAvatar) }}" alt="{{ $testimonial->name }}">
                            </div>
                        @endif
                        <div class="item-desc">
                            @if ($content = $testimonial->content)
                                <p class="font-md color-grey-400 mb-15">{!! BaseHelper::clean($content) !!}</p>
                            @endif

                            @if ($name = $testimonial->name)
                                <h6 class="color-brand-1">{{ $name }}</h6>
                            @endif

                            @if ($company = $testimonial->company)
                                <span class="color-grey-500 font-xs">{{ $company }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
