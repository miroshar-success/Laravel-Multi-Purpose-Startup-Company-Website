<?php

namespace Botble\Theme\Typograhpy;

class TypographyItem
{
    protected string $name;

    protected string $label;

    protected string|float $default;

    public function __construct(
        string $name,
        string $label,
        string|float $default
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->default = $default;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getDefault(): string|float
    {
        return $this->default;
    }
}
