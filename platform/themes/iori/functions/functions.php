<?php

use ArchiElite\Career\Models\Career;
use Botble\Base\Contracts\BaseModel as BaseModelContract;
use Botble\Base\Facades\MetaBox;
use Botble\Base\Forms\Fields\TagField;
use Botble\Base\Forms\FormAbstract;
use Botble\Base\Models\BaseModel;
use Botble\BusinessService\Models\Package;
use Botble\BusinessService\Models\ServiceCategory;
use Botble\Media\Facades\RvMedia;
use Botble\Menu\Facades\Menu;
use Botble\Page\Models\Page;
use Botble\Slug\Facades\SlugHelper;
use Botble\Team\Forms\TeamForm;
use Botble\Team\Models\Team;
use Botble\Theme\Facades\Theme;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

register_page_template([
    'default' => __('Default'),
    'full-width' => __('Full Width'),
    'page-detail' => __('Page Detail'),
]);

register_sidebar([
    'id' => 'pre_footer_sidebar',
    'name' => __('Pre footer sidebar'),
    'description' => __('Sidebar before footer'),
]);

register_sidebar([
    'id' => 'blog_sidebar',
    'name' => __('Blog Sidebar'),
    'description' => __('Sidebar for blog page'),
]);

register_sidebar([
    'id' => 'footer_menu',
    'name' => __('Footer Sidebar'),
    'description' => __('Footer Sidebar'),
]);

register_sidebar([
    'id' => 'product_sidebar',
    'name' => __('Product Sidebar'),
    'description' => __('Sidebar in the product page'),
]);

register_sidebar([
    'id' => 'product_list_sidebar',
    'name' => __('Product List Sidebar'),
    'description' => __('Sidebar in the product page'),
]);

Menu::addMenuLocation('footer-bottom-menu', __('Footer Bottom Menu'));

RvMedia::setUploadPathAndURLToPublic();
RvMedia::addSize('large', 620, 380)
    ->addSize('medium', 398, 255)
    ->addSize('small', 300, 280);

app()->booted(function () {
    remove_sidebar('primary_sidebar');

    add_filter(BASE_FILTER_BEFORE_RENDER_FORM, function (FormAbstract $form, ?BaseModelContract $data) {
        switch (get_class($data)) {
            case Career::class:
                $form
                    ->addCustomField('tags', TagField::class)
                    ->addAfter('status', 'apply_url', 'text', [
                        'label' => __('Apply URL'),
                        'label_attr' => ['class' => 'control-label'],
                        'value' => MetaBox::getMetaData($data, 'apply_url', true),
                    ])
                    ->addAfter('apply_url', 'image', 'mediaImage', [
                        'label' => __('Image'),
                        'label_attr' => ['class' => 'control-label'],
                        'value' => MetaBox::getMetaData($data, 'image', true),
                    ])
                    ->addAfter('image', 'icon', 'mediaImage', [
                        'label' => __('Icon'),
                        'label_attr' => ['class' => 'control-label'],
                        'value' => MetaBox::getMetaData($data, 'icon', true),
                    ])
                    ->addAfter('icon', 'tags', 'tags', [
                        'label' => __('Tags'),
                        'label_attr' => ['class' => 'control-label'],
                        'value' => MetaBox::getMetaData($data, 'tags', true),
                    ]);

                break;
            case Page::class:
                $form
                    ->addAfter('image', 'header_breadcrumb_style', 'customSelect', [
                        'label' => __('Header breadcrumb style'),
                        'label_attr' => ['class' => 'control-label'],
                        'choices' => [
                            'default' => __('Default'),
                            'has_background_color' => __('Has background color'),
                        ],
                        'selected' => MetaBox::getMetaData($data, 'header_breadcrumb_style', true),
                    ]);

                break;
            case ServiceCategory::class:
                $form
                    ->addAfter('image', 'icon', 'mediaImage', [
                        'label' => __('Icon'),
                        'label_attr' => ['class' => 'control-label'],
                        'value' => MetaBox::getMetaData($data, 'icon', true),
                    ]);

                break;
            case Package::class:
                $form
                    ->addAfter('status', 'icon', 'mediaImage', [
                        'label' => __('Icon'),
                        'label_attr' => ['class' => 'control-label'],
                        'value' => MetaBox::getMetaData($data, 'icon', true),
                    ]);

                break;
        }

        return $form;
    }, 120, 3);

    add_action(
        [BASE_ACTION_AFTER_CREATE_CONTENT, BASE_ACTION_AFTER_UPDATE_CONTENT],
        function (string $screen, FormRequest|Request $request, BaseModel $data): void {
            switch (get_class($data)) {
                case Team::class:
                    if ($request->has('description')) {
                        MetaBox::saveMetaBoxData($data, 'description', $request->input('description'));
                    }

                    break;
                case Career::class:
                    foreach (['apply_url', 'image', 'icon', 'tags'] as $field) {
                        if ($request->has($field)) {
                            MetaBox::saveMetaBoxData($data, $field, $request->input($field));
                        }
                    }

                    break;
                case Page::class:
                    if ($request->has('header_breadcrumb_style')) {
                        MetaBox::saveMetaBoxData($data, 'header_breadcrumb_style', $request->input('header_breadcrumb_style'));
                    }

                    break;
                case ServiceCategory::class:
                    if ($request->has('icon')) {
                        MetaBox::saveMetaBoxData($data, 'icon', $request->input('icon'));
                    }
                    // no break
                case Package::class:
                    if ($request->has('icon')) {
                        MetaBox::saveMetaBoxData($data, 'icon', $request->input('icon'));
                    }

                    break;
            }
        },
        120,
        3
    );

    if (setting('social_login_enable', false)) {
        remove_filter(BASE_FILTER_AFTER_LOGIN_OR_REGISTER_FORM);

        add_filter(BASE_FILTER_AFTER_LOGIN_OR_REGISTER_FORM, function ($html) {
            Theme::asset()->usePath(false)->add(
                'social-login-css',
                asset('vendor/core/plugins/social-login/css/social-login.css'),
                [],
                [],
                '1.0.0'
            );

            if (Route::currentRouteName() === 'access.login') {
                return $html . view('plugins/social-login::login-options')->render();
            }

            return $html . Theme::partial('login-options');
        }, 25);
    }

    if (is_plugin_active('team')) {
        TeamForm::extend(function (TeamForm $form) {
            $form
                ->remove('content')
                ->remove('phone')
                ->remove('address')
                ->remove('website');
        });
    }
});

if (is_plugin_active('team')) {
    SlugHelper::removeModule(Team::class);
}
