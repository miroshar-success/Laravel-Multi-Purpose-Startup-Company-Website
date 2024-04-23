<?php

use Botble\Widget\AbstractWidget;

class SiteInformationWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Site information'),
            'description' => __('Widget display site information'),
            'title' => __('Contact information'),
            'logo' => null,
            'address' => '',
            'working_hours' => '',
        ]);
    }
}
