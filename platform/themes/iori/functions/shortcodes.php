<?php

use Botble\Ecommerce\Enums\CustomerStatusEnum;
use Botble\Ecommerce\Models\Customer;
use Botble\Shortcode\Compilers\Shortcode as ShortcodeCompiler;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Theme\Facades\Theme;
use Botble\Theme\Supports\ThemeSupport;
use Botble\Theme\Supports\Youtube;
use Illuminate\Support\Arr;

app()->booted(function () {
    ThemeSupport::registerGoogleMapsShortcode();
    ThemeSupport::registerYoutubeShortcode();

    Shortcode::register('hero-banner', __('Hero banner'), __('Hero banner'), function (ShortcodeCompiler $shortcode) {
        if ($shortcode->youtube_video_url) {
            $shortcode->youtube_video_id = $shortcode->youtube_video_url ? Youtube::getYoutubeVideoID(
                $shortcode->youtube_video_url
            ) : null;
        }

        $customerIds = Shortcode::fields()->getIds('customer_ids', $shortcode);

        $customers = collect();

        if (is_plugin_active('ecommerce') && $customerIds) {
            $customers = Customer::query()
                ->where('status', CustomerStatusEnum::ACTIVATED)
                ->whereIn('id', $customerIds)
                ->get();
        }

        $tabs = Shortcode::fields()->getTabsData(['title', 'description', 'image', 'url'], $shortcode);
        $style = in_array(
            $shortcode->style,
            [
                'style-1',
                'style-2',
                'style-3',
                'style-4',
                'style-5',
                'style-6',
                'style-7',
                'style-8',
                'style-9',
                'style-10',
                'style-11',
            ]
        ) ? $shortcode->style : 'style-1';

        return Theme::partial("shortcodes.hero-banner.styles.$style", compact('shortcode', 'customers', 'tabs'));
    });

    Shortcode::setAdminConfig('hero-banner', function (array $attributes) {
        $customers = [];

        if (is_plugin_active('ecommerce')) {
            $customers = Customer::query()
                ->where('status', CustomerStatusEnum::ACTIVATED)
                ->pluck('name', 'id')
                ->all();
        }

        return Theme::partial('shortcodes.hero-banner.admin-config', compact('attributes', 'customers'));
    });

    Shortcode::register('intro-video', __('Intro video'), __('Intro video'), function (ShortcodeCompiler $shortcode) {
        $shortcode->youtube_video_id = $shortcode->youtube_video_url ? Youtube::getYoutubeVideoID(
            $shortcode->youtube_video_url
        ) : null;

        return Theme::partial('shortcodes.intro-video.index', compact('shortcode'));
    });

    Shortcode::setAdminConfig('intro-video', function (array $attributes) {
        return Theme::partial('shortcodes.intro-video.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'why-choose-us',
        __('Why Choose Us'),
        __('Why Choose Us'),
        function (ShortcodeCompiler $shortcode) {
            $tabs = Shortcode::fields()->getTabsData(['title', 'data', 'color'], $shortcode);

            return Theme::partial('shortcodes.why-choose-us.index', compact('shortcode', 'tabs'));
        }
    );

    Shortcode::setAdminConfig('why-choose-us', function (array $attributes) {
        return Theme::partial('shortcodes.why-choose-us.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'get-in-touch',
        __('Get In Touch'),
        __('Get In Touch'),
        function (ShortcodeCompiler $shortcode) {
            return Theme::partial('shortcodes.get-in-touch.index', compact('shortcode'));
        }
    );

    Shortcode::setAdminConfig('get-in-touch', function (array $attributes) {
        return Theme::partial('shortcodes.get-in-touch.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'how-to-start',
        __('How to start'),
        __('How to start'),
        function (ShortcodeCompiler $shortcode) {
            $tabs = Shortcode::fields()->getTabsData(['title', 'description'], $shortcode);
            $style = in_array($shortcode->style, ['style-1', 'style-2']) ? $shortcode->style : 'style-1';

            return Theme::partial("shortcodes.how-to-start.styles.$style", compact('shortcode', 'tabs'));
        }
    );

    Shortcode::setAdminConfig('how-to-start', function (array $attributes) {
        return Theme::partial('shortcodes.how-to-start.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'marketing-features',
        __('Marketing Features'),
        __('Marketing Features'),
        function (ShortcodeCompiler $shortcode) {
            $tabs = Shortcode::fields()->getTabsData(
                ['title', 'description', 'icon_image', 'label', 'url', 'type'],
                $shortcode
            );
            $style = in_array($shortcode->style, ['style-1', 'style-2']) ? $shortcode->style : 'style-1';

            return Theme::partial("shortcodes.marketing-features.styles.$style", compact('shortcode', 'tabs'));
        }
    );

    Shortcode::setAdminConfig('marketing-features', function (array $attributes) {
        return Theme::partial('shortcodes.marketing-features.admin-config', compact('attributes'));
    });

    Shortcode::register('what-we-do', __('What we do'), __('What we do'), function (ShortcodeCompiler $shortcode) {
        $tabs = Shortcode::fields()->getTabsData(['title', 'icon_image', 'description', 'label', 'url'], $shortcode);

        return Theme::partial('shortcodes.what-we-do.index', compact('shortcode', 'tabs'));
    });

    Shortcode::setAdminConfig('what-we-do', function (array $attributes) {
        return Theme::partial('shortcodes.what-we-do.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'site-statistics',
        __('Site Statistics'),
        __('Site Statistics'),
        function (ShortcodeCompiler $shortcode) {
            $tabs = Shortcode::fields()->getTabsData(['title', 'data', 'unit'], $shortcode);
            $style = in_array($shortcode->style, ['style-1', 'style-2']) ? $shortcode->style : 'style-1';

            return Theme::partial("shortcodes.site-statistics.styles.$style", compact('shortcode', 'tabs'));
        }
    );

    Shortcode::setAdminConfig('site-statistics', function (array $attributes) {
        return Theme::partial('shortcodes.site-statistics.admin-config', compact('attributes'));
    });

    Shortcode::register('how-it-work', __('How it work'), __('How it work'), function (ShortcodeCompiler $shortcode) {
        $tabs = Shortcode::fields()->getTabsData(
            ['title', 'description', 'icon_image', 'label', 'url', 'display'],
            $shortcode
        );

        return Theme::partial('shortcodes.how-it-work.index', compact('shortcode', 'tabs'));
    });

    Shortcode::setAdminConfig('how-it-work', function (array $attributes) {
        return Theme::partial('shortcodes.how-it-work.admin-config', compact('attributes'));
    });

    Shortcode::register('who-are-you', __('Who are you'), __('Who are you'), function (ShortcodeCompiler $shortcode) {
        $tabs = Shortcode::fields()->getTabsData(['title', 'image', 'data', 'unit'], $shortcode);

        return Theme::partial('shortcodes.who-are-you.index', compact('shortcode', 'tabs'));
    });

    Shortcode::setAdminConfig('who-are-you', function (array $attributes) {
        return Theme::partial('shortcodes.who-are-you.admin-config', compact('attributes'));
    });

    Shortcode::register('box-story', __('Box Story'), __('Box Story'), function (ShortcodeCompiler $shortcode) {
        $tabs = Shortcode::fields()->getTabsData(['title', 'subtitle', 'description', 'image'], $shortcode);

        return Theme::partial('shortcodes.box-story.index', compact('shortcode', 'tabs'));
    });

    Shortcode::setAdminConfig('box-story', function (array $attributes) {
        return Theme::partial('shortcodes.box-story.admin-config', compact('attributes'));
    });

    Shortcode::register('information', __('Information'), __('Information'), function (ShortcodeCompiler $shortcode) {
        $tabs = Shortcode::fields()->getTabsData(['title', 'description'], $shortcode);

        return Theme::partial('shortcodes.information.index', compact('shortcode', 'tabs'));
    });

    Shortcode::setAdminConfig('information', function (array $attributes) {
        return Theme::partial('shortcodes.information.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'about-product',
        __('About Product'),
        __('About Product'),
        function (ShortcodeCompiler $shortcode) {
            $tabs = Shortcode::fields()->getTabsData(['title'], $shortcode);

            return Theme::partial('shortcodes.about-product.index', compact('shortcode', 'tabs'));
        }
    );

    Shortcode::setAdminConfig('about-product', function (array $attributes) {
        return Theme::partial('shortcodes.about-product.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'branding-block',
        __('Branding block'),
        __('Branding block'),
        function (ShortcodeCompiler $shortcode) {
            $tabs = Shortcode::fields()->getTabsData(['title'], $shortcode);

            return Theme::partial('shortcodes.branding-block.index', compact('shortcode', 'tabs'));
        }
    );

    Shortcode::setAdminConfig('branding-block', function (array $attributes) {
        return Theme::partial('shortcodes.branding-block.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'business-strategy',
        __('Business strategy'),
        __('Business strategy'),
        function (ShortcodeCompiler $shortcode) {
            $tabs = Shortcode::fields()->getTabsData(['title'], $shortcode);

            return Theme::partial('shortcodes.business-strategy.index', compact('shortcode', 'tabs'));
        }
    );

    Shortcode::setAdminConfig('business-strategy', function (array $attributes) {
        return Theme::partial('shortcodes.business-strategy.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'grow-business',
        __('Grow business'),
        __('Grow business'),
        function (ShortcodeCompiler $shortcode) {
            return Theme::partial('shortcodes.grow-business.index', compact('shortcode'));
        }
    );

    Shortcode::setAdminConfig('grow-business', function (array $attributes) {
        return Theme::partial('shortcodes.grow-business.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'connect-with-us',
        __('Connect with us'),
        __('Connect with us'),
        function (ShortcodeCompiler $shortcode) {
            $tabs = Shortcode::fields()->getTabsData(['title', 'description', 'image'], $shortcode);

            return Theme::partial('shortcodes.connect-with-us.index', compact('shortcode', 'tabs'));
        }
    );

    Shortcode::setAdminConfig('connect-with-us', function (array $attributes) {
        return Theme::partial('shortcodes.connect-with-us.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'featured-services',
        __('Featured services'),
        __('Featured service'),
        function (ShortcodeCompiler $shortcode) {
            $tabs = Shortcode::fields()->getTabsData(['title', 'description', 'image', 'action', 'label'], $shortcode);
            $style = in_array(
                $shortcode->style,
                ['style-1', 'style-2', 'style-3', 'style-4']
            ) ? $shortcode->style : 'style-1';

            return Theme::partial("shortcodes.featured-services.styles.$style", compact('shortcode', 'tabs'));
        }
    );

    Shortcode::setAdminConfig('featured-services', function (array $attributes) {
        return Theme::partial('shortcodes.featured-services.admin-config', compact('attributes'));
    });

    Shortcode::register('coming-soon', __('Coming soon'), __('Coming soon'), function (ShortcodeCompiler $shortcode) {
        return Theme::partial('shortcodes.coming-soon.index', compact('shortcode'));
    });

    Shortcode::setAdminConfig('coming-soon', function (array $attributes) {
        return Theme::partial('shortcodes.coming-soon.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'technology-block',
        __('Technology block'),
        __('Technology block'),
        function (ShortcodeCompiler $shortcode) {
            return Theme::partial('shortcodes.technology-block.index', compact('shortcode'));
        }
    );

    Shortcode::setAdminConfig('technology-block', function (array $attributes) {
        return Theme::partial('shortcodes.technology-block.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'everything-will-become-one',
        __('Everything will become One'),
        __('Everything will become One'),
        function (ShortcodeCompiler $shortcode) {
            $tabs = Shortcode::fields()->getTabsData(['title', 'description', 'image'], $shortcode);
            $tabs = collect($tabs)->split(2);

            return Theme::partial('shortcodes.everything-will-become-one.index', compact('shortcode', 'tabs'));
        }
    );

    Shortcode::setAdminConfig('everything-will-become-one', function (array $attributes) {
        return Theme::partial('shortcodes.everything-will-become-one.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'hero-banner-with-site-statistics',
        __('Hero banner with site statistics'),
        __('Hero banner with site statistics'),
        function (ShortcodeCompiler $shortcode) {
            $tabs = Shortcode::fields()->getTabsData(['title', 'data', 'unit'], $shortcode);

            return Theme::partial('shortcodes.hero-banner-with-site-statistics.index', compact('shortcode', 'tabs'));
        }
    );

    Shortcode::setAdminConfig('hero-banner-with-site-statistics', function (array $attributes) {
        return Theme::partial('shortcodes.hero-banner-with-site-statistics.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'explore-network',
        __('Explore network'),
        __('Explore network'),
        function (ShortcodeCompiler $shortcode) {
            $tabs = Shortcode::fields()->getTabsData(
                ['key', 'title', 'subtitle', 'description', 'image', 'checklists'],
                $shortcode
            );

            return Theme::partial('shortcodes.explore-network.index', compact('shortcode', 'tabs'));
        }
    );

    Shortcode::setAdminConfig('explore-network', function (array $attributes) {
        return Theme::partial('shortcodes.explore-network.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'take-the-control',
        __('Tab the control'),
        __('Tab the control'),
        function (ShortcodeCompiler $shortcode) {
            $tabs = Shortcode::fields()->getTabsData(['title', 'description', 'image'], $shortcode);

            return Theme::partial('shortcodes.take-the-control.index', compact('shortcode', 'tabs'));
        }
    );

    Shortcode::setAdminConfig('take-the-control', function (array $attributes) {
        return Theme::partial('shortcodes.take-the-control.admin-config', compact('attributes'));
    });

    Shortcode::register('step-block', __('Step block'), __('Step block'), function (ShortcodeCompiler $shortcode) {
        $tabs = Shortcode::fields()->getTabsData(['title', 'description'], $shortcode);

        return Theme::partial('shortcodes.step-block.index', compact('shortcode', 'tabs'));
    });

    Shortcode::setAdminConfig('step-block', function (array $attributes) {
        return Theme::partial('shortcodes.step-block.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'banner-slider',
        __('Banner slider'),
        __('Banner slider'),
        function (ShortcodeCompiler $shortcode) {
            $tabs = Shortcode::fields()->getTabsData(['title', 'description', 'image'], $shortcode);

            return Theme::partial('shortcodes.banner-slider.index', compact('shortcode', 'tabs'));
        }
    );

    Shortcode::setAdminConfig('banner-slider', function (array $attributes) {
        return Theme::partial('shortcodes.banner-slider.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'have-a-question',
        __('Have a question'),
        __('Have a question'),
        function (ShortcodeCompiler $shortcode) {
            return Theme::partial('shortcodes.have-a-question.index', compact('shortcode'));
        }
    );

    Shortcode::setAdminConfig('have-a-question', function (array $attributes) {
        return Theme::partial('shortcodes.have-a-question.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'dual-intro-video',
        __('Dual intro video'),
        __('Dual intro video'),
        function (ShortcodeCompiler $shortcode) {
            $tabs = [];
            $quantity = min((int) $shortcode->quantity, 20);
            if ($quantity) {
                for ($i = 1; $i <= $quantity; $i++) {
                    $tabs[] = [
                        'title' => $shortcode->{'title_' . $i},
                        'subtitle' => $shortcode->{'subtitle_' . $i},
                        'description' => $shortcode->{'description_' . $i},
                        'image' => $shortcode->{'image_' . $i},
                        'youtube_video_id' => $shortcode->{'youtube_video_url_' . $i} ? Youtube::getYoutubeVideoID(
                            $shortcode->{'youtube_video_url_' . $i}
                        ) : null,
                        'button_label' => $shortcode->{'button_label_' . $i},
                    ];
                }
            }

            return Theme::partial('shortcodes.dual-intro-video.index', compact('shortcode', 'tabs'));
        }
    );

    Shortcode::setAdminConfig('dual-intro-video', function (array $attributes) {
        return Theme::partial('shortcodes.dual-intro-video.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'compare-plans',
        __('Compare plans'),
        __('Compare plans'),
        function (ShortcodeCompiler $shortcode) {
            $tabs = [];
            $quantity = min((int) $shortcode->quantity, 20);
            if ($quantity) {
                for ($i = 1; $i <= $quantity; $i++) {
                    $tabs[] = [
                        'title' => $shortcode->{'title_' . $i},
                        'free' => $shortcode->{'free_' . $i},
                        'standard' => $shortcode->{'standard_' . $i},
                        'business' => $shortcode->{'business_' . $i},
                        'enterprise' => $shortcode->{'enterprise_' . $i},
                    ];
                }
            }

            return Theme::partial('shortcodes.compare-plans.index', compact('shortcode', 'tabs'));
        }
    );

    Shortcode::setAdminConfig('compare-plans', function (array $attributes) {
        return Theme::partial('shortcodes.compare-plans.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'banner-hero-with-search',
        __('Banner hero with search'),
        __('Banner hero with search'),
        function (ShortcodeCompiler $shortcode) {
            return Theme::partial('shortcodes.banner-hero-with-search.index', compact('shortcode'));
        }
    );

    Shortcode::setAdminConfig('banner-hero-with-search', function (array $attributes) {
        return Theme::partial('shortcodes.banner-hero-with-search.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'term-and-conditions',
        __('Term and Conditions'),
        __('Term and Conditions'),
        function (ShortcodeCompiler $shortcode) {
            $tabs = [];
            $quantity = min((int) $shortcode->quantity, 20);
            if ($quantity) {
                for ($i = 1; $i <= $quantity; $i++) {
                    $tabs[] = [
                        'title' => $shortcode->{'title_' . $i},
                        'description' => $shortcode->{'description_' . $i},
                    ];
                }
            }

            return Theme::partial('shortcodes.term-and-conditions.index', compact('shortcode', 'tabs'));
        }
    );

    Shortcode::setAdminConfig('term-and-conditions', function (array $attributes) {
        return Theme::partial('shortcodes.term-and-conditions.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'contact-page-banner',
        __('Contact Page Banner'),
        __('Contact Page Banner'),
        function (ShortcodeCompiler $shortcode) {
            $description = $shortcode->description ?: '';

            if ($description) {
                $description = preg_replace(
                    '/\{\{(.*)\}\}/',
                    '<a class="ml3" href="/career">${1}</a></br>',
                    $shortcode->description
                );
            }

            $tabs = [];

            $quantity = max((int) $shortcode->quantity, 20);
            if ($quantity) {
                for ($i = 1; $i <= $quantity; $i++) {
                    if (($title = $shortcode->{'title_' . $i})) {
                        $tabs[] = [
                            'title' => $title,
                            'image' => $shortcode->{'image_' . $i},
                            'link_to' => $shortcode->{'link_to_' . $i},
                        ];
                    }
                }
            }

            return Theme::partial('shortcodes.contact-page-banner.index', compact('shortcode', 'tabs', 'description'));
        }
    );

    Shortcode::setAdminConfig('contact-page-banner', function (array $attributes) {
        return Theme::partial('shortcodes.contact-page-banner.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'contact-information',
        __('Contact Information'),
        __('Contact Information'),
        function (ShortcodeCompiler $shortcode) {
            $tabs = Shortcode::fields()->getTabsData(['title', 'description', 'image', 'email', 'phone'], $shortcode);

            return Theme::partial('shortcodes.contact-information.index', compact('shortcode', 'tabs'));
        }
    );

    Shortcode::setAdminConfig('contact-information', function (array $attributes) {
        return Theme::partial('shortcodes.contact-information.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'career-banner',
        __('Career banner'),
        __('Career banner'),
        function (ShortcodeCompiler $shortcode) {
            return Theme::partial('shortcodes.career-banner.index', compact('shortcode'));
        }
    );

    Shortcode::setAdminConfig('career-banner', function (array $attributes) {
        return Theme::partial('shortcodes.career-banner.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'what-we-offer',
        __('What we offer'),
        __('What we offer'),
        function (ShortcodeCompiler $shortcode) {
            $style = in_array(
                $shortcode->style,
                ['style-1', 'style-2', 'style-3', 'style-4']
            ) ? $shortcode->style : 'style-1';

            $tabs = [];
            $quantity = min((int) $shortcode->quantity, 20);

            if ($quantity) {
                for ($i = 1; $i <= $quantity; $i++) {
                    $tabs[] = [
                        'title' => $shortcode->{'title_' . $i},
                        'description' => $shortcode->{'description_' . $i},
                        'image' => $shortcode->{'image_' . $i},
                        'logo' => $shortcode->{'logo_' . $i},
                        'label' => $shortcode->{'label_' . $i},
                        'action' => $shortcode->{'action_' . $i},
                    ];
                }
            }

            return Theme::partial(
                "shortcodes.what-we-offer.styles.$style",
                compact('shortcode', 'style', 'tabs')
            );
        }
    );

    Shortcode::setAdminConfig('what-we-offer', function (array $attributes) {
        return Theme::partial('shortcodes.what-we-offer.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'choose-to-the-plan',
        __('Choose to the plan'),
        __('Choose to the plan'),
        function (ShortcodeCompiler $shortcode) {
            $tabs = [];
            $quantity = min((int) $shortcode->quantity, 20) ?: 6;
            if ($quantity) {
                for ($i = 1; $i <= $quantity; $i++) {
                    if ($title = $shortcode->{'title_' . $i}) {
                        $isActive = $shortcode->{'active_' . $i} === 'yes';
                        $tabs[] = [
                            'title' => $title,
                            'subtitle' => $shortcode->{'subtitle_' . $i},
                            'payment_cycle' => $shortcode->{'payment_cycle_' . $i},
                            'icon_image' => $shortcode->{'icon_image_' . $i},
                            'month_price' => $shortcode->{'month_price_' . $i},
                            'year_price' => $shortcode->{'year_price_' . $i},
                            'button_label' => $shortcode->{'button_label_' . $i},
                            'button_url' => $shortcode->{'button_url_' . $i},
                            'checked' => array_filter(explode(';', $shortcode->{'checked_' . $i})),
                            'uncheck' => array_filter(explode(';', $shortcode->{'uncheck_' . $i})),
                            'active' => $isActive,
                        ];
                    }
                }
            }
            if ($tabs) {
                $active = Arr::first($tabs, function ($value) {
                    return $value['active'] == true;
                });

                if (! $active) {
                    $tabs[0]['active'] = true;
                }
            }

            $styleBg = ['bg-fourth-bg', 'bg-first-bg', 'bg-second-bg', 'bg-fifth-bg'];
            $style = in_array($shortcode->style, ['style-1', 'style-2']) ? $shortcode->style : 'style-1';

            return Theme::partial(
                "shortcodes.choose-to-the-plan.styles.$style",
                compact('shortcode', 'tabs', 'styleBg')
            );
        }
    );

    Shortcode::setAdminConfig('choose-to-the-plan', function (array $attributes) {
        return Theme::partial('shortcodes.choose-to-the-plan.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'featured-brands',
        __('Featured Brands'),
        __('Featured Brands'),
        function (ShortcodeCompiler $shortcode) {
            $tabs = Shortcode::fields()->getTabsData(['title', 'image', 'url', 'is_open_new_tab'], $shortcode);
            $style = in_array($shortcode->style, ['style-1', 'style-2', 'style-3', 'style-4', 'style-5', 'style-6', 'style-7']) ? $shortcode->style : 'style-1';

            return Theme::partial("shortcodes.featured-brands.styles.$style", compact('shortcode', 'tabs'));
        }
    );

    Shortcode::setAdminConfig('featured-brands', function (array $attributes) {
        return Theme::partial('shortcodes.featured-brands.admin-config', compact('attributes'));
    });

    Shortcode::register(
        'featured-brands-with-counter',
        __('Featured Brands With Counter'),
        __('Featured Brands With Counter'),
        function (ShortcodeCompiler $shortcode) {
            $counters = Shortcode::fields()->getTabsData(['name', 'number'], $shortcode);
            $brands = Shortcode::fields()->getTabsData(['title', 'image', 'url', 'is_open_new_tab'], $shortcode);

            return Theme::partial('shortcodes.featured-brands-with-counter.index', compact('shortcode', 'counters', 'brands'));
        }
    );

    Shortcode::setAdminConfig('featured-brands-with-counter', function (array $attributes) {
        return Theme::partial('shortcodes.featured-brands-with-counter.admin', compact('attributes'));
    });
});
