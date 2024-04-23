<?php

use Botble\Base\Forms\FieldOptions\ButtonFieldOption;
use Botble\Base\Forms\FieldOptions\MediaImageFieldOption;
use Botble\Base\Forms\FieldOptions\SelectFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\MediaImageField;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Newsletter\Forms\Fronts\NewsletterForm;
use Botble\Widget\AbstractWidget;
use Botble\Widget\Forms\WidgetForm;

class NewsletterWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Subscribe to Newsletter.'),
            'description' => __('Subscribe to get latest updates and information.'),
            'title' => null,
            'subtitle' => null,
            'image' => null,
            'icon_primary' => null,
            'style' => 1,
        ]);
    }

    public function settingForm(): ?WidgetForm
    {
        return WidgetForm::createFromArray($this->getConfig())
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
            ->add('image', MediaImageField::class)
            ->add(
                'icon_primary',
                MediaImageField::class,
                MediaImageFieldOption::make()
                    ->label(__('Icon primary'))
                    ->toArray()
            )
            ->add(
                'style',
                SelectField::class,
                SelectFieldOption::make()
                    ->label(__('Style'))
                    ->choices([
                        1 => __('Style :number', ['number' => 1]),
                        2 => __('Style :number', ['number' => 2]),
                    ])
                    ->toArray()
            );
    }

    public function data(): array
    {
        if (! is_plugin_active('newsletter')) {
            return [];
        }

        $form = NewsletterForm::create()
            ->formClass('newsletter-form')
            ->remove('submit')
            ->add(
                'submit',
                'submit',
                ButtonFieldOption::make()
                    ->label(
                        '<svg id="btn-arrow" class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>'
                    )
                    ->attributes(['class' => 'btn btn-submit-newsletter'])
                    ->toArray(),
            );

        return compact('form');
    }
}
