<?php

namespace Botble\Theme\ThemeOption\Fields;

use Botble\Theme\Concerns\ThemeOption\Fields\HasOptions;
use Botble\Theme\ThemeOption\ThemeOptionField;

class UiSelectorField extends ThemeOptionField
{
    use HasOptions;

    public function fieldType(): string
    {
        return 'uiSelector';
    }

    public function toArray(): array
    {
        return [
            ...parent::toArray(),
            'attributes' => [
                ...parent::toArray()['attributes'],
                'value' => $this->getValue(),
                'choices' => $this->options,
            ],
        ];
    }
}
