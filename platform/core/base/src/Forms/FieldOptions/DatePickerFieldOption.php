<?php

namespace Botble\Base\Forms\FieldOptions;

use Botble\Base\Facades\BaseHelper;
use Carbon\Carbon;

class DatePickerFieldOption extends InputFieldOption
{
    public static function make(): static
    {
        return parent::make()
            ->defaultValue(Carbon::now()->toDateString());
    }

    public function withTimePicker(bool $withTimePicker = true): static
    {
        $options = $this->getAttribute('data-options', []);

        if ($withTimePicker) {
            $options['enableTime'] = true;
            $options['dateFormat'] = BaseHelper::getDateTimeFormat();
        } else {
            $options['enableTime'] = false;
            $options['dateFormat'] = BaseHelper::getDateFormat();
        }

        $this->addAttribute('data-options', $options);

        return $this;
    }
}
