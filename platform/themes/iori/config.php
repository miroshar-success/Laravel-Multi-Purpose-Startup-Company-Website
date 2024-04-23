<?php

use Botble\Base\Facades\BaseHelper;
use Botble\Shortcode\View\View;
use Botble\Theme\Theme;

return [

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials" and "views"
    |
    | [Notice] assets cannot inherit.
    |
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these events can be overridden by package config.
    |
    */

    'events' => [

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before' => function ($theme) {
            // You can remove this line anytime.
        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function (Theme $theme) {
            $currencies = collect();

            if (is_plugin_active('ecommerce')) {
                $currencies = get_all_currencies();
            }

            $theme->partialComposer('header-top', function ($view) use ($currencies) {
                $view->with('currencies', $currencies);
            });

            $theme->asset()->container('footer')->usePath()->add('jquery', 'plugins/jquery.min.js');

            $theme->asset()->container('footer')->usePath()->add('counterup-js', 'plugins/counterup.js');
            $theme->asset()->container('footer')->usePath()->add('custom-parallax-js', 'plugins/custom-parallax.js');
            $theme->asset()->container('footer')->usePath()->add('images-loaded', 'plugins/images-loaded.js');
            $theme->asset()->container('footer')->usePath()->add('isotope', 'plugins/isotope.js');
            $theme->asset()->container('footer')->usePath()->add('jquery-countdown', 'plugins/jquery.countdown.min.js');
            $theme->asset()->container('footer')->usePath()->add('jquery-elevatezoom', 'plugins/jquery.elevatezoom.js');
            $theme->asset()->container('footer')->usePath()->add('jquery-syotimer', 'plugins/jquery.syotimer.min.js');
            $theme->asset()->container('footer')->usePath()->add('jquery-theia-sticky', 'plugins/jquery.theia.sticky.js');
            $theme->asset()->container('footer')->usePath()->add('jquery-vticker', 'plugins/jquery.vticker-min.js');
            $theme->asset()->container('footer')->usePath()->add('jquery-ul', 'plugins/jquery-ui.js');
            $theme->asset()->container('footer')->usePath()->add('leaflet-js', 'plugins/leaflet.js');
            $theme->asset()->container('footer')->usePath()->add('modal', 'plugins/modal.js');
            $theme->asset()->container('footer')->usePath()->add('no-ui-slider', 'plugins/noUISlider.js');
            $theme->asset()->container('footer')->usePath()->add('carousel', 'plugins/owl.carousel.min.js');
            $theme->asset()->container('footer')->usePath()->add('perfect-scrollbar', 'plugins/perfect-scrollbar.min.js');
            $theme->asset()->container('footer')->usePath()->add('scrollup', 'plugins/scrollup.js');
            $theme->asset()->container('footer')->usePath()->add('select2', 'plugins/select2.min.js');
            $theme->asset()->container('footer')->usePath()->add('swiper-bundle-js', 'plugins/swiper/swiper-bundle.min.js');
            $theme->asset()->usePath()->add('swiper-bundle-css', 'plugins/swiper/swiper-bundle.min.css');
            $theme->asset()->container('footer')->usePath()->add('TweenMax', 'plugins/TweenMax.min.js');
            $theme->asset()->container('footer')->usePath()->add('waypoints', 'plugins/waypoints.js');
            $theme->asset()->container('footer')->usePath()->add('wow', 'plugins/wow.js');
            $theme->asset()->container('footer')->usePath()->add('TweenMax', 'plugins/TweenMax.min.js');
            $theme->asset()->container('footer')->usePath()->add('gsap', 'plugins/gsap.min.js');

            $theme->asset()->container('footer')->usePath()->add('slick', 'plugins/slick/slick.js');
            $theme->asset()->usePath()->add('slick', 'plugins/slick/slick.css');

            $theme->asset()->container('footer')->usePath()->add('bootstrap-js', 'plugins/bootstrap/bootstrap.bundle.min.js');

            if (BaseHelper::isRtlEnabled()) {
                $theme->asset()->usePath()->add('bootstrap-css', 'plugins/bootstrap/bootstrap.rtl.min.css');
                $theme->asset()->usePath()->add('custom-rtl-css', 'css/custom-rtl.css');
            } else {
                $theme->asset()->usePath()->add('boostrap-css', 'plugins/bootstrap/bootstrap.min.css');
            }

            $theme->asset()->container('footer')->usePath()->add('toastr-js', 'plugins/toastr.js/toastr.min.js');
            $theme->asset()->usePath()->add('toastr-css', 'plugins/toastr.js/toastr.min.css');

            $theme->asset()->container('footer')->usePath()->add('magnific-popup-js', 'plugins/magnific-popup/magnific-popup.js');
            $theme->asset()->usePath()->add('magnific-popup', 'plugins/magnific-popup/magnific-popup.css');

            $theme->asset()->usePath()->add('style', 'css/style.css');
            $theme->asset()->usePath()->add('uicons-regular-rounded', 'plugins/uicons-regular-rounded.css');

            if (theme_option('animation_enabled', 'yes') == 'yes') {
                $theme->asset()->container('footer')->usePath()->add('animation-js', 'js/ali-animation.js');
                $theme->asset()->usePath()->add('animate-css', 'plugins/animate/animate.min.css');
            }

            if (is_plugin_active('ecommerce')) {
                $theme->asset()->usePath()->add('lightgallery', 'plugins/lightgallery/css/lightgallery.min.css');
                $theme->asset()->container('footer')->usePath()->add('lightgallery', 'plugins/lightgallery/lightgallery.min.js');
            }

            $theme->asset()->container('footer')->usePath()->add('main', 'js/main.js');
            $theme->asset()->container('footer')->usePath()->add('ecommerce-js', 'js/ecommerce.js', ['lightgallery']);
            $theme->asset()->container('footer')->usePath()->add('custom', 'js/custom.js');

            if (function_exists('shortcode')) {
                $theme->composer([
                    'page',
                    'post',
                    'ecommerce.product',
                    'ecommerce.products',
                    'ecommerce.product-category',
                    'ecommerce.product-tag',
                    'ecommerce.brand',
                    'ecommerce.search',
                    'ecommerce.cart',
                    'business-services.service',
                    'business-services.package',
                    'career.career',
                ], function (View $view) {
                    $view->withShortcodes();
                });
            }
        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => [

            'default' => function ($theme) {
                // $theme->asset()->usePath()->add('ipad', 'css/layouts/ipad.css');
            },
        ],
    ],
];
