<section class="section pt-40 faq-section" @if ($image = $shortcode->image) style="background: url('{{ RvMedia::getImageUrl($image) }}') no-repeat; background-position: top right; background-size: 190px" @endif>
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-8 col-md-8">
                @if ($title = $shortcode->title)
                    <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                        {!! BaseHelper::clean($title) !!}
                    </h2>
                @endif

                @if ($subtitle = $shortcode->subtitle)
                    <p class="font-lg color-gray-500 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">{!! BaseHelper::clean($subtitle) !!}</p>
                @endif
            </div>
            <div class="col-lg-4 col-md-4 text-md-end text-start wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                @if($shortcode->button_label && $shortcode->button_url)
                    <a class="btn btn-default font-sm-bold pl-0" href="{{ $shortcode->button_url }}">
                        {!! BaseHelper::clean($shortcode->button_label) !!}
                        <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                @endif
            </div>
        </div>
        <div class="row mt-50 mb-50">
            <div class="col-xl-3 col-lg-4">
                <ul class="list-faqs nav nav-tabs" role="tablist">
                    @foreach($faqCategories as $category)
                        <li class="wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                            <a href="#faq-categories-{{ $category->id  }}" data-bs-toggle="tab" role="tab" aria-controls="tab-support" aria-selected="true" @if($loop->first) class="active" @endif>
                                {{ $category->name }}
                                <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-40 text-start mb-40 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                    @if ($shortcode->button_url && $shortcode->button_label)
                        <a class="btn btn-brand-1 hover-up" href="{{ $shortcode->button_url }}">{!! BaseHelper::clean($shortcode->button_label) !!}</a>
                    @endif

                    @if ($shortcode->button_secondary_url && $shortcode->button_secondary_label)
                        <a class="btn btn-default font-sm-bold hover-up" href="{{ $shortcode->button_secondary_url }}">
                            {!! BaseHelper::clean($shortcode->button_secondary_label) !!}
                            <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="tab-content tab-content-slider">
                    @foreach($faqCategories as $category)
                        <div @class(['tab-pane fade', 'active show wow animate__animated animate__fadeInUp' => $loop->first]) id="faq-categories-{{ $category->id }}" role="tabpanel" aria-labelledby="tab-categories-faq-{{ $category->id }}">
                            @if ($category->faqs)
                                <div class="accordion" id="tab-categories-faq-{{ $category->id }}">
                                    @foreach($category->faqs as $faq)
                                        <div class="accordion-item border-0">
                                            <h5 class="accordion-header" id="faq-{{ $faq->id }}">
                                                <button @class(['accordion-button text-heading-5', 'collapsed' => ! $loop->first]) type="button" data-bs-toggle="collapse" data-bs-target="#collapse-faq-{{ $faq->id }}" aria-expanded="true" aria-controls="collapse-faq-{{ $faq->id }}">{!! BaseHelper::clean($faq->question) !!}</button>
                                            </h5>
                                            <div @class(['accordion-collapse collapse', 'show' => $loop->first]) id="collapse-faq-{{ $faq->id }}" aria-labelledby="faq-{{ $faq->id }}" data-bs-parent="#tab-categories-faq-{{ $category->id }}">
                                                <div class="accordion-body">{!! BaseHelper::clean($faq->answer) !!}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom"></div>
</section>
