<?php

namespace Botble\Theme;

use Botble\Base\Forms\FieldOptions\HtmlFieldOption;
use Botble\Base\Forms\Fields\HtmlField;
use Botble\Base\Forms\FormAbstract;
use Illuminate\Support\Str;

abstract class FormFront extends FormAbstract
{
    protected ?string $formEndKey = null;

    public static function formTitle(): string
    {
        return Str::title(Str::snake(class_basename(static::class), ' '));
    }

    public function buildForm(): void
    {
        $this->add(
            'form_front_form_start',
            HtmlField::class,
            HtmlFieldOption::make()
                ->content(apply_filters('form_front_form_start', '', $this))
                ->toArray()
        );

        parent::buildForm();

        $this->add(
            'form_front_form_end',
            HtmlField::class,
            HtmlFieldOption::make()
                ->content(apply_filters('form_front_form_end', '', $this))
                ->toArray()
        );

        $this->addBefore(
            'submit',
            'form_front_before_submit_button',
            HtmlField::class,
            HtmlFieldOption::make()
                ->content(apply_filters('form_front_before_submit_button', '', $this))
                ->toArray()
        );
    }

    public function setFormEndKey(string $key): static
    {
        $this->formEndKey = $key;

        return $this;
    }

    public function getFormEndKey(): ?string
    {
        return $this->formEndKey;
    }
}
