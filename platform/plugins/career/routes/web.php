<?php

use Botble\Base\Facades\BaseHelper;
use ArchiElite\Career\Models\Career;
use Botble\Slug\Facades\SlugHelper;
use Botble\Theme\Facades\Theme;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'ArchiElite\Career\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {
        Route::group(['prefix' => 'careers', 'as' => 'careers.'], function () {
            Route::resource('', 'CareerController')->parameters(['' => 'career']);
        });
    });

    if (defined('THEME_MODULE_SCREEN_NAME')) {
        Theme::registerRoutes(function () {
            Route::get(SlugHelper::getPrefix(Career::class, 'careers') ?: 'careers', 'PublicController@careers')
                ->name('public.careers');
        });
    }
});
