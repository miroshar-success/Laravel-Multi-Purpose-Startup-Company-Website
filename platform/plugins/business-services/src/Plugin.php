<?php

namespace Botble\BusinessService;

use Botble\PluginManagement\Abstracts\PluginOperationAbstract;
use Illuminate\Support\Facades\Schema;

class Plugin extends PluginOperationAbstract
{
    public static function remove(): void
    {
        Schema::dropIfExists('bs_service_categories');
        Schema::dropIfExists('bs_services');
        Schema::dropIfExists('bs_packages');
        Schema::dropIfExists('bs_service_categories_translations');
        Schema::dropIfExists('bs_services_translations');
        Schema::dropIfExists('bs_packages_translations');
    }
}
