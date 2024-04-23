<?php

namespace Botble\Contact\Forms\Fronts;

use Botble\Base\Forms\FieldOptions\ButtonFieldOption;
use Botble\Base\Forms\FieldOptions\HtmlFieldOption;
use Botble\Base\Forms\FieldOptions\TextareaFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\EmailField;
use Botble\Base\Forms\Fields\HtmlField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Contact\Http\Requests\ContactRequest;
use Botble\Contact\Models\Contact;
use Botble\Theme\FormFront;
use Closure;
use Illuminate\Support\Arr;

class ContactForm extends FormFront
{
    public static function formTitle(): string
    {
        return trans('plugins/contact::contact.contact_form');
    }

    public function setup(): void
    {
        $data = $this->getModel();

        $displayFields = array_filter(explode(',', (string) Arr::get($data, 'display_fields'))) ?: ['phone', 'email', 'address', 'subject'];
        $mandatoryFields = array_filter(explode(',', (string) Arr::get($data, 'mandatory_fields'))) ?: ['email'];

        $this
            ->contentOnly()
            ->model(Contact::class)
            ->setUrl(route('public.send.contact'))
            ->setValidatorClass(ContactRequest::class)
            ->setFormOption('class', 'contact-form')
            ->add(
                'filters_before_form',
                HtmlField::class,
                HtmlFieldOption::make()
                    ->content(apply_filters('pre_contact_form', null))
                    ->toArray()
            )
            ->add(
                'required_fields',
                'hidden',
                TextFieldOption::make()
                    ->value(Arr::get($data, 'mandatory_fields'))
                    ->toArray()
            )
            ->add(
                'display_fields',
                'hidden',
                TextFieldOption::make()
                    ->value(Arr::get($data, 'display_fields'))
                    ->toArray()
            )
            ->addRowWrapper('form_wrapper', function (self $form) use ($displayFields, $mandatoryFields) {
                $form
                    ->addColumnWrapper('name_wrapper', function (self $form) {
                        $form
                            ->add(
                                'name',
                                TextField::class,
                                TextFieldOption::make()
                                    ->required()
                                    ->label(__('Name'))
                                    ->placeholder(__('Name'))
                                    ->wrapperAttributes(['class' => 'contact-form-group'])
                                    ->cssClass('contact-form-input')
                                    ->maxLength(-1)
                                    ->toArray()
                            );
                    })
                    ->when(in_array('email', $displayFields), function (self $form) use ($mandatoryFields) {
                        $form
                            ->addColumnWrapper('email_wrapper', function (self $form) use ($mandatoryFields) {
                                $form
                                    ->add(
                                        'email',
                                        EmailField::class,
                                        TextFieldOption::make()
                                            ->when(in_array('email', $mandatoryFields), function (TextFieldOption $option) {
                                                $option->required();
                                            })
                                            ->label(__('Email'))
                                            ->placeholder(__('Email'))
                                            ->wrapperAttributes(['class' => 'contact-form-group'])
                                            ->cssClass('contact-form-input')
                                            ->maxLength(-1)
                                            ->toArray()
                                    );
                            });
                    })
                    ->when(in_array('address', $displayFields), function (self $form) use ($mandatoryFields) {
                        $form->addColumnWrapper('address_wrapper', function (self $form) use ($mandatoryFields) {
                            $form
                                ->add(
                                    'address',
                                    TextField::class,
                                    TextFieldOption::make()
                                        ->when(in_array('address', $mandatoryFields), function (TextFieldOption $option) {
                                            $option->required();
                                        })
                                        ->label(__('Address'))
                                        ->placeholder(__('Address'))
                                        ->wrapperAttributes(['class' => 'contact-form-group'])
                                        ->cssClass('contact-form-input')
                                        ->maxLength(-1)
                                        ->toArray()
                                );
                        });
                    })
                    ->when(in_array('phone', $displayFields), function (self $form) use ($mandatoryFields) {
                        $form->addColumnWrapper('phone_wrapper', function (self $form) use ($mandatoryFields) {
                            $form
                                ->add(
                                    'phone',
                                    TextField::class,
                                    TextFieldOption::make()
                                        ->when(in_array('phone', $mandatoryFields), function (TextFieldOption $option) {
                                            $option->required();
                                        })
                                        ->label(__('Phone'))
                                        ->placeholder(__('Phone'))
                                        ->wrapperAttributes(['class' => 'contact-form-group'])
                                        ->cssClass('contact-form-input')
                                        ->maxLength(-1)
                                        ->toArray()
                                );
                        });
                    })
                    ->when(in_array('subject', $displayFields), function (self $form) use ($mandatoryFields) {
                        $form->addColumnWrapper('subject_wrapper', function (self $form) use ($mandatoryFields) {
                            $form->add(
                                'subject',
                                TextField::class,
                                TextFieldOption::make()
                                    ->when(in_array('subject', $mandatoryFields), function (TextFieldOption $option) {
                                        $option->required();
                                    })
                                    ->label(__('Subject'))
                                    ->placeholder(__('Subject'))
                                    ->wrapperAttributes(['class' => 'contact-form-group'])
                                    ->cssClass('contact-form-input')
                                    ->maxLength(-1)
                                    ->toArray()
                            );
                        }, 12);
                    });
            })
            ->addRowWrapper(
                'content',
                function (self $form) {
                    $form->addColumnWrapper(
                        'content',
                        function (self $form) {
                            $form->add(
                                'content',
                                TextareaField::class,
                                TextareaFieldOption::make()
                                    ->required()
                                    ->label(__('Content'))
                                    ->placeholder(__('Content'))
                                    ->wrapperAttributes(['class' => 'contact-form-group'])
                                    ->cssClass('contact-form-input')
                                    ->rows(5)
                                    ->maxLength(-1)
                                    ->toArray()
                            );
                        },
                        12
                    );
                }
            )
            ->add(
                'filters_after_form',
                HtmlField::class,
                HtmlFieldOption::make()
                    ->content(apply_filters('after_contact_form', null))
                    ->toArray()
            )
            ->addWrappedField(
                'submit',
                'submit',
                ButtonFieldOption::make()
                    ->cssClass('contact-button')
                    ->label(__('Send'))
                    ->toArray()
            )
            ->addWrappedField(
                'messages',
                HtmlField::class,
                HtmlFieldOption::make()
                    ->content(<<<'HTML'
                        <div class="contact-message contact-success-message" style="display: none"></div>
                        <div class="contact-message contact-error-message" style="display: none"></div>
                    HTML)
                    ->toArray()
            );
    }

    protected function addWrappedField(string $name, string $type, array $options): static
    {
        $this->add(
            "open_{$name}_field_wrapper",
            HtmlField::class,
            HtmlFieldOption::make()->content('<div class="contact-form-group">')->toArray()
        );

        $this->add($name, $type, $options);

        return $this->add(
            "close_{$name}_field_wrapper",
            HtmlField::class,
            HtmlFieldOption::make()->content('</div>')->toArray()
        );
    }

    protected function addRowWrapper(string $name, Closure $callback): static
    {
        $this->add(
            "open_{$name}_row_wrapper",
            HtmlField::class,
            HtmlFieldOption::make()->content('<div class="contact-form-row row">')->toArray()
        );

        $callback($this);

        return $this->add(
            "close_{$name}_row_wrapper",
            HtmlField::class,
            HtmlFieldOption::make()->content('</div>')->toArray()
        );
    }

    protected function addColumnWrapper(string $name, Closure $callback, int $column = 6): static
    {
        $this->add(
            "open_{$name}_column_wrapper",
            HtmlField::class,
            HtmlFieldOption::make()->content(sprintf('<div class="contact-column-%s col-md-%s contact-field-%s">', $column, $column, $name))->toArray()
        );

        $callback($this);

        return $this->add(
            "close_{$name}_column_wrapper",
            HtmlField::class,
            HtmlFieldOption::make()->content('</div>')->toArray()
        );
    }
}
