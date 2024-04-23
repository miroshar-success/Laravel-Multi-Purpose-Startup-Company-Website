<?php

use Botble\PluginManagement\Services\PluginService;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration
{
    public function up(): void
    {
        $pluginService = app(PluginService::class);

        $pluginService->remove('gallery');
        $pluginService->remove('simple-slider');
    }
};
