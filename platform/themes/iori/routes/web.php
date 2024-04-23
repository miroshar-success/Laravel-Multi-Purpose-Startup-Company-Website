<?php

use Botble\Theme\Facades\Theme;
use Illuminate\Support\Facades\Route;
use Theme\Iori\Http\Controllers\EcommerceController;
use Theme\Iori\Http\Controllers\IoriController;

Theme::registerRoutes(function () {
    Route::group(['prefix' => 'ajax', 'as' => 'public.ajax.'], function () {
        Route::get('posts/{categoryId}', [IoriController::class, 'ajaxGetPostByCategory'])->name('posts');

        Route::get('products', [IoriController::class, 'getProducts'])->name('products');

        Route::get('quick-view/{id?}', [EcommerceController::class, 'ajaxGetQuickView'])->name('quick-view');

        Route::get('cart/count', [EcommerceController::class, 'ajaxCount'])->name('cart-count');

        Route::get('cart/sidebar', [EcommerceController::class, 'ajaxCartSidebar'])->name('cart-sidebar');

        Route::get('search', [IoriController::class, 'getSearch'])->name('search');

        Route::get('search/products', [IoriController::class, 'getSearchProducts'])->name('search-products');
    });
});

Theme::routes();
