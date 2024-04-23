<?php

use ArchiElite\Announcement\Http\Controllers\AnnouncementController;
use Botble\Base\Facades\BaseHelper;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'core', 'auth'])
    ->prefix(sprintf('%s/announcements', BaseHelper::getAdminPrefix()))
    ->name('announcements.')
    ->group(function () {
        Route::resource('/', AnnouncementController::class)->parameters(['' => 'announcement']);

        Route::prefix('settings')->namespace('\ArchiElite\Announcement\Http\Controllers\Settings')->group(function () {
            Route::get('/', [
                'as' => 'settings',
                'uses' => 'AnnouncementSettingController@edit',
            ]);

            Route::put('/', [
                'as' => 'settings.update',
                'uses' => 'AnnouncementSettingController@update',
                'permission' => 'announcements.settings',
            ]);
        });
    });
