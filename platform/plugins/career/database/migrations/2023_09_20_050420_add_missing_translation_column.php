<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('careers_translations', 'content')) {
            Schema::table('careers_translations', function (Blueprint $table) {
                $table->longText('content')->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('careers_translations', 'content')) {
            Schema::table('careers_translations', function (Blueprint $table) {
                $table->dropColumn('content');
            });
        }
    }
};
