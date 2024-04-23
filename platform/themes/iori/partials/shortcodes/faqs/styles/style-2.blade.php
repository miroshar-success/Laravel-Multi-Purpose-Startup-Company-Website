<section class="section pt-40 mb-30">
    <div class="container">
        <div class="text-center">
            @if ($title = $shortcode->title)
                <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".1s">{!! BaseHelper::clean($title) !!}</h2>
            @endif

            @if ($subtitle = $shortcode->subtitle)
                <p class="font-lg color-gray-500 wow animate__animated animate__fadeIn" data-wow-delay=".2s">{!! BaseHelper::clean($subtitle) !!}</p>
            @endif
        </div>
        <div class="row mt-50 mb-50">
            <div class="col-xl-2 col-lg-2"></div>
            <div class="col-xl-8 col-lg-8 position-relative">
                @foreach($tabs as $tab)
                    <div class="box-author-{{ $loop->iteration }}"><img src="{{ RvMedia::getImageUrl($tab['image']) }}" alt="{{ __('Image') }}"></div>
                @endforeach
                <div class="accordion" id="accordionFAQ">
                    @foreach ($faqCategories as $faqCategory)
                        @foreach($faqCategory->faqs as $faq)
                            <div class="accordion-item wow animate__animated animate__fadeIn">
                                <h5 class="accordion-header" id="headingFaq-{{ $faq->id }}">
                                    <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq-{{ $faq->id }}" aria-expanded="false" aria-controls="collapseFaq-{{ $faq->id }}">
                                        {!! BaseHelper::clean($faq->question) !!}
                                    </button>
                                </h5>
                                <div class="accordion-collapse collapse" id="collapseFaq-{{ $faq->id }}" aria-labelledby="headingFaq-{{ $faq->id }}" data-bs-parent="#accordionFAQ">
                                    <div class="accordion-body">
                                        {!! BaseHelper::clean($faq->answer ) !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
