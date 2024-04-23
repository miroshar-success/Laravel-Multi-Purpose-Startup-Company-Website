<?php

use Carbon\Carbon;

app()->booted(function () {
    theme_option()
        ->setField([
            'id' => 'copyright',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'text',
            'label' => __('Copyright'),
            'attributes' => [
                'name' => 'copyright',
                'value' => __('© :year Your Company. All right reserved.', ['year' => Carbon::now()->translatedFormat('Y')]),
                'options' => [
                    'class' => 'form-control',
                    'placeholder' => __('Change copyright'),
                    'data-counter' => 250,
                ],
            ],
            'helper' => __('Copyright on footer of site'),
        ])
        ->setField([
            'id' => 'hotline',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'text',
            'label' => __('Hotline'),
            'attributes' => [
                'name' => 'hotline',
                'value' => null,
                'options' => [
                    'class' => 'form-control',
                    'placeholder' => __('Hotline'),
                    'data-counter' => 250,
                ],
            ],
        ])
        ->setField([
            'id' => 'primary_font',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'googleFonts',
            'label' => __('Primary font'),
            'attributes' => [
                'name' => 'primary_font',
                'value' => 'Manrope',
            ],
        ])
        ->setField([
            'id' => 'primary_color',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'customColor',
            'label' => __('Primary color'),
            'attributes' => [
                'name' => 'primary_color',
                'value' => '#ff2b4a',
            ],
        ])
        ->setField([
            'id' => 'primary_hover_color',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'customColor',
            'label' => __('Primary hover color'),
            'attributes' => [
                'name' => 'primary_hover_color',
                'value' => '#06d6a0',
            ],
        ])
        ->setField([
            'id' => 'secondary_color',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'customColor',
            'label' => __('Secondary color'),
            'attributes' => [
                'name' => 'secondary_color',
                'value' => '#066a4c',
            ],
        ])
        ->setField([
            'id' => 'success_color',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'customColor',
            'label' => __('Success color'),
            'attributes' => [
                'name' => 'success_color',
                'value' => '#06D6A0',
            ],
        ])
        ->setField([
            'id' => 'danger_color',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'customColor',
            'label' => __('Danger color'),
            'attributes' => [
                'name' => 'danger_color',
                'value' => '#06D6A0',
            ],
        ])
        ->setField([
            'id' => 'warning_color',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'customColor',
            'label' => __('Warning color'),
            'attributes' => [
                'name' => 'warning_color',
                'value' => '#06D6A0',
            ],
        ])
        ->setField([
            'id' => 'authentication_background_image',
            'section_id' => 'opt-text-subsection-ecommerce',
            'type' => 'mediaImage',
            'label' => __('Authentication background image'),
            'attributes' => [
                'name' => 'authentication_background_image',
                'value' => '',
            ],
        ])
        ->setField([
            'id' => 'layout_products',
            'section_id' => 'opt-text-subsection-ecommerce',
            'type' => 'customSelect',
            'label' => __('Layout products'),
            'attributes' => [
                'name' => 'layout_products',
                'list' => [
                    'list' => __('List'),
                    'grid' => __('Grid'),
                ],
                'value' => 'grid',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id' => 'enable_sidebar_products',
            'section_id' => 'opt-text-subsection-ecommerce',
            'type' => 'customSelect',
            'label' => __('Enable sidebar products?'),
            'attributes' => [
                'name' => 'enable_sidebar_products',
                'list' => [
                    0 => __('No'),
                    1 => __('Yes'),
                ],
                'value' => 1,
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id' => '404_page_image',
            'section_id' => 'opt-text-subsection-page',
            'type' => 'mediaImage',
            'label' => __('404 page image'),
            'attributes' => [
                'name' => '404_page_image',
                'value' => '',
            ],
        ])
        ->setSection([
            'title' => __('Social links'),
            'desc' => __('Social links'),
            'id' => 'opt-text-subsection-social-links',
            'subsection' => true,
            'icon' => 'ti ti-link',
        ])
        ->setField([
            'id' => 'social_links',
            'section_id' => 'opt-text-subsection-social-links',
            'type' => 'repeater',
            'label' => __('Social links'),
            'attributes' => [
                'name' => 'social_links',
                'value' => null,
                'fields' => [
                    [
                        'type' => 'text',
                        'label' => __('Name'),
                        'attributes' => [
                            'name' => 'social-name',
                            'value' => null,
                            'options' => [
                                'class' => 'form-control',
                            ],
                        ],
                    ],
                    [
                        'type' => 'mediaImage',
                        'label' => __('Icon Image'),
                        'attributes' => [
                            'name' => 'social-icon',
                            'value' => null,
                            'options' => [
                                'class' => 'form-control',
                            ],
                        ],
                    ],
                    [
                        'type' => 'text',
                        'label' => __('URL'),
                        'attributes' => [
                            'name' => 'social-url',
                            'value' => null,
                            'options' => [
                                'class' => 'form-control',
                            ],
                        ],
                    ],
                ],
            ],
        ])
        ->setSection([
            'title' => __('Header'),
            'desc' => __('Header config'),
            'id' => 'opt-text-subsection-header',
            'subsection' => true,
            'icon' => 'ti ti-brush',
        ])
        ->setField([
            'id' => 'action_button_text',
            'section_id' => 'opt-text-subsection-header',
            'type' => 'text',
            'label' => __('Action button text'),
            'attributes' => [
                'name' => 'action_button_text',
                'value' => null,
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id' => 'action_button_url',
            'section_id' => 'opt-text-subsection-header',
            'type' => 'text',
            'label' => __('Action button URL'),
            'attributes' => [
                'name' => 'action_button_url',
                'value' => null,
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id' => 'header_top_enabled',
            'section_id' => 'opt-text-subsection-header',
            'type' => 'customSelect',
            'label' => __('Enable header top'),
            'attributes' => [
                'name' => 'header_top_enabled',
                'list' => [
                    0 => trans('core/base::base.no'),
                    1 => trans('core/base::base.yes'),
                ],
                'value' => 1,
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id' => 'preloader_enabled',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'customSelect',
            'label' => __('Enable Preloader?'),
            'attributes' => [
                'name' => 'preloader_enabled',
                'list' => [
                    'yes' => trans('core/base::base.yes'),
                    'no' => trans('core/base::base.no'),
                ],
                'value' => 'yes',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id' => 'preloader_version',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'customSelect',
            'label' => __('Preloader Version?'),
            'attributes' => [
                'name' => 'preloader_version',
                'list' => [
                    'v1' => 'V1',
                    'v2' => 'V2',
                ],
                'value' => 'v1',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id' => 'animation_enabled',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'customSelect',
            'label' => __('Enable animation?'),
            'attributes' => [
                'name' => 'animation_enabled',
                'list' => [
                    'yes' => trans('core/base::base.yes'),
                    'no' => trans('core/base::base.no'),
                ],
                'value' => 'yes',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ]);
});
