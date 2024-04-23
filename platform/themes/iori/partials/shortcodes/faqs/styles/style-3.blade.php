<section class="section pt-40">
    <div class="container">
        <div class="text-center">
            @if ($title = $shortcode->title)
                <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">{!! BaseHelper::clean($title) !!}</h2>
            @endif

            @if ($subtitle = $shortcode->subtitle)
                <p class="font-lg color-gray-500 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">{!! BaseHelper::clean($subtitle) !!}</p>
            @endif
        </div>
        <div class="row mt-50 mb-50">
            <div class="col-xl-12 col-lg-12 position-relative">
                <div class="accordion accordionStyle2" id="accordionFAQ">
                    <div class="row">
                        @foreach ($faqCategories as $faqCategory)
                            @foreach($faqCategory->faqs as $faq)
                                <div class="col-lg-6 wow animate__animated animate__fadeInUp" data-wow-delay=".{{ $loop->even ? 0 : 2 }}s">
                                    <div class="accordion-item">
                                        <h5 class="accordion-header" id="headingFaq{{ $faq->id }}">
                                            <button class="accordion-button text-heading-5 collapsed"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseFaq{{ $faq->id }}"
                                                aria-expanded="true" aria-controls="collapseFaq{{ $faq->id }}">{{ $faq->question }}
                                            </button>
                                        </h5>
                                        <div class="accordion-collapse collapse"
                                             id="collapseFaq{{ $faq->id }}"
                                             aria-labelledby="headingFaq{{ $faq->id }}"
                                             data-bs-parent="#accordionFAQ">
                                            <div class="accordion-body">{!! BaseHelper::clean($faq->answer) !!}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
