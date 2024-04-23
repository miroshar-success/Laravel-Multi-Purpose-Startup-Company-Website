<?php

use Botble\Widget\AbstractWidget;

class BlogTagsWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Blog tags'),
            'description' => __('Blog tags widget.'),
            'number_display' => 5,
        ]);
    }
}
