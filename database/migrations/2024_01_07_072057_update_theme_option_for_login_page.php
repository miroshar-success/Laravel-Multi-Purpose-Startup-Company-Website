<?php

use Botble\Theme\Facades\ThemeOption;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration
{
    public function up(): void
    {
        ThemeOption::setOption('login_background', theme_option('authentication_background_image'));
        ThemeOption::saveOptions();
    }
};
