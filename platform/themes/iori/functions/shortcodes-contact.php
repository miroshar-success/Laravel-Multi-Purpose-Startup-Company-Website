<?php

use Botble\Base\Forms\FieldOptions\ButtonFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\TextField;
use Botble\Contact\Forms\Fronts\ContactForm;
use Botble\Contact\Forms\ShortcodeContactAdminConfigForm;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Shortcode\Forms\FieldOptions\ShortcodeTabsFieldOption;
use Botble\Shortcode\Forms\Fields\ShortcodeTabsField;
use Botble\Theme\Facades\Theme;
use Illuminate\Support\Arr;

app()->booted(function () {
    if (! is_plugin_active('contact')) {
        return;
    }

    add_filter(CONTACT_FORM_TEMPLATE_VIEW, function () {
        return Theme::getThemeNamespace('partials.shortcodes.contact-form.index');
    }, 120);

    ContactForm::beforeRendering(function (ContactForm $form) {
        $attributes = $form->getModel();

        return $form
            ->remove('submit')
            ->add(
                'submit',
                'submit',
                ButtonFieldOption::make()
                    ->label(Arr::get($attributes, 'title_button', __('Send Message')) .
                        '<svg class="icon-16 ms-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>')
                    ->attributes(['class' => 'btn btn-brand-1-full font-sm'])
                    ->toArray(),
            );

    });

    Shortcode::modifyAdminConfig('contact-form', function (ShortcodeContactAdminConfigForm $form) {
        $tabFields = [
            'heading' => [
                'title' => __('Heading'),
                'type' => 'text',
            ],
            'description' => [
                'title' => __('Description'),
                'type' => 'text',
            ],
            'icon' => [
                'type' => 'image',
                'title' => __('Image'),
            ],
        ];

        return $form
            ->add(
                'title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Title'))
                    ->toArray()
            )
            ->add(
                'subtitle',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Subtitle'))
                    ->toArray()
            )
            ->add(
                'title_button',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Title button'))
                    ->toArray()
            )
            ->add(
                'tabs',
                ShortcodeTabsField::class,
                ShortcodeTabsFieldOption::make()
                    ->attrs($form->getModel())
                    ->fields($tabFields)
                    ->toArray()
            );
    });
});
