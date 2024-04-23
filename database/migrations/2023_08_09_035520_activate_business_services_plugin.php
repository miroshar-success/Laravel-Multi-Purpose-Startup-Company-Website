<?php

use Botble\PluginManagement\Services\PluginService;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration
{
    public function up(): void
    {
        $pluginService = app(PluginService::class);

        $pluginService->activate('career');
        $pluginService->activate('business-services');
    }
};
