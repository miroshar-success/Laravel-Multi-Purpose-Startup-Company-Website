<?php

use Botble\Faq\Contracts\Faq;
use Botble\Faq\FaqCollection;
use Botble\Faq\FaqItem;
use Botble\Faq\Models\FaqCategory;
use Botble\Shortcode\Compilers\Shortcode as ShortcodeCompiler;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Theme\Facades\Theme;

app()->booted(function () {
    if (! is_plugin_active('faq')) {
        return;
    }

    Shortcode::register('faqs', __('FAQs'), __('FAQs'), function (ShortcodeCompiler $shortcode) {
        if (! $categoryIds = Shortcode::fields()->getIds('faq_category_ids', $shortcode)) {
            return null;
        }

        $faqCategories = FaqCategory::query()
            ->whereIn('id', $categoryIds)
            ->wherePublished()
            ->orderByDesc('created_at')
            ->with(['faqs'])
            ->get();

        if (setting('enable_faq_schema', false)) {
            $schemaItems = new FaqCollection();

            foreach ($faqCategories as $faqCategory) {
                foreach ($faqCategory->faqs as $faq) {
                    $schemaItems->push(new FaqItem($faq->question, $faq->answer));
                }
            }

            app(Faq::class)->registerSchema($schemaItems);
        }

        $tabs = Shortcode::fields()->getTabsData(['image'], $shortcode);
        $style = in_array($shortcode->style, ['style-1', 'style-2', 'style-3']) ? $shortcode->style : 'style-1';

        return Theme::partial("shortcodes.faqs.styles.$style", compact('shortcode', 'faqCategories', 'tabs'));
    });

    Shortcode::setAdminConfig('faqs', function (array $attributes) {
        $faqCategories = FaqCategory::query()
            ->wherePublished()
            ->orderByDesc('created_at')
            ->pluck('name', 'id')
            ->all();

        return Theme::partial('shortcodes.faqs.admin-config', compact('attributes', 'faqCategories'));
    });
});
