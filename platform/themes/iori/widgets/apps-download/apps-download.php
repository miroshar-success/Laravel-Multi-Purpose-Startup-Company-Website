<?php

use Botble\Widget\AbstractWidget;

class AppsDownloadWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Apps Download'),
            'description' => __('Widget display platform apps download'),
            'menu_id' => null,
            'title' => __('App & Payment'),
            'subtitle' => __('Download our Apps and get extra 15% Discount on your first Order.'),
            'platform_google_play_logo' => null,
            'platform_google_play_url' => null,
            'platform_apple_store_logo' => null,
            'platform_apple_store_url' => null,
        ]);
    }
}
