<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ec_products', function (Blueprint $table) {
            $table->unsignedInteger('minimum_order_quantity')->default(0)->nullable();
            $table->unsignedInteger('maximum_order_quantity')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ec_products', function (Blueprint $table) {
            $table->dropColumn('minimum_order_quantity');
            $table->dropColumn('maximum_order_quantity');
        });
    }
};
