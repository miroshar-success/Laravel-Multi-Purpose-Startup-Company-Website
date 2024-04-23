<?php

use ArchiElite\AiWriter\Http\Controllers\AiWriterController;
use ArchiElite\AiWriter\Http\Controllers\Settings\AiWriterSettingController;
use Botble\Base\Facades\AdminHelper;
use Illuminate\Support\Facades\Route;

AdminHelper::registerRoutes(function () {
    Route::group(['prefix' => 'ai-writer', 'as' => 'ai-writer.', 'permission' => false], function () {
        Route::post('generate', [AiWriterController::class, 'generate'])->name('generate');
    });

    Route::group([
        'prefix' => 'settings/ai-writer',
        'as' => 'ai-writer.settings',
        'permission' => 'ai-writer.settings',
    ], function () {
        Route::get('/', [
            'uses' => AiWriterSettingController::class . '@edit',
        ]);

        Route::put('/', [
            'as' => '.update',
            'uses' => AiWriterSettingController::class . '@update',
        ])->middleware('preventDemo');
    });
});
