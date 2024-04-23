<?php

use Botble\Base\Enums\BaseStatusEnum;
use Botble\BusinessService\Enums\PackageDuration;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('bs_service_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->index();
            $table->string('name');
            $table->string('description', 400)->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('order')->default(0);
            $table->string('status')->default(BaseStatusEnum::PUBLISHED);
            $table->timestamps();
        });

        Schema::create('bs_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->index();
            $table->string('name');
            $table->string('description', 400)->nullable();
            $table->longText('content')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('image')->nullable();
            $table->text('images')->nullable();
            $table->integer('views')->default(0);
            $table->string('status', 60)->default(BaseStatusEnum::PUBLISHED);
            $table->timestamps();
        });

        Schema::create('bs_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description', 400)->nullable();
            $table->text('content');
            $table->string('price');
            $table->string('annual_price')->nullable();
            $table->string('duration')->default(PackageDuration::MONTHLY);
            $table->text('features')->nullable();
            $table->string('status')->default(BaseStatusEnum::PUBLISHED);
            $table->boolean('is_popular')->default(false);
            $table->timestamps();
        });

        Schema::create('bs_service_categories_translations', function (Blueprint $table) {
            $table->string('lang_code');
            $table->foreignId('bs_service_categories_id');
            $table->string('name', 255)->nullable();
            $table->string('description', 400)->nullable();

            $table->primary(['lang_code', 'bs_service_categories_id'], 'bs_service_categories_translations_primary');
        });

        Schema::create('bs_services_translations', function (Blueprint $table) {
            $table->string('lang_code');
            $table->foreignId('bs_services_id');
            $table->string('name', 255)->nullable();
            $table->string('description', 400)->nullable();
            $table->text('content')->nullable();

            $table->primary(['lang_code', 'bs_services_id'], 'bs_services_translations_primary');
        });

        Schema::create('bs_packages_translations', function (Blueprint $table) {
            $table->string('lang_code');
            $table->foreignId('bs_packages_id');
            $table->string('name', 255)->nullable();
            $table->string('description', 400)->nullable();
            $table->text('content')->nullable();
            $table->string('price')->nullable();
            $table->string('annual_price')->nullable();
            $table->text('features')->nullable();

            $table->primary(['lang_code', 'bs_packages_id'], 'bs_packages_translations_primary');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bs_service_categories');
        Schema::dropIfExists('bs_services');
        Schema::dropIfExists('bs_packages');
        Schema::dropIfExists('bs_service_categories_translations');
        Schema::dropIfExists('bs_services_translations');
        Schema::dropIfExists('bs_packages_translations');
    }
};
