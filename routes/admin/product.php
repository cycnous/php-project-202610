<?php

use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Product\ProductLabelController;
use App\Http\Controllers\Admin\Product\ProductPhotoController;
use App\Http\Controllers\Admin\Product\ProductTypeController;

// 後台產品
Route::group(['middleware' => 'manager', 'prefix' => 'admin/product'], function () {
    // 產品
    Route::group(['prefix' => 'product'], function () {
        Route::get('list', [ProductController::class, 'list']);
        Route::get('create', [ProductController::class, 'create']);
        Route::post('store', [ProductController::class, 'store']);
        Route::get('edit/{id}', [ProductController::class, 'edit']);
        Route::post('update', [ProductController::class, 'update']);
        Route::post('delete', [ProductController::class, 'delete']);
        Route::post('doAI', [ProductController::class, 'doAI']);
    });

    // 產品類別
    Route::group(['prefix' => 'types'], function () {
        Route::get('list', [ProductTypeController::class, 'list']);
        Route::get('create', [ProductTypeController::class, 'create']);
        Route::post('store', [ProductTypeController::class, 'store']);
        Route::get('edit/{id}', [ProductTypeController::class, 'edit']);
        Route::post('update', [ProductTypeController::class, 'update']);
        Route::post('delete', [ProductTypeController::class, 'delete']);
    });

    // 產品標籤
    Route::group(['prefix' => 'label'], function () {
        Route::get('list', [ProductLabelController::class, 'list']);
        Route::get('create', [ProductLabelController::class, 'create']);
        Route::post('store', [ProductLabelController::class, 'store']);
        Route::get('edit/{id}', [ProductLabelController::class, 'edit']);
        Route::post('update', [ProductLabelController::class, 'update']);
        Route::post('delete', [ProductLabelController::class, 'delete']);
    });

    // 產品圖
    Route::group(['prefix' => 'photo'], function () {
        // productId?: 表示不一定會有 productId 這個參數
        Route::get('list/{productId?}', [ProductPhotoController::class, 'list']);
        Route::get('create', [ProductPhotoController::class, 'create']);
        Route::post('store', [ProductPhotoController::class, 'store']);
        Route::get('edit/{id}', [ProductPhotoController::class, 'edit']);
        Route::post('update', [ProductPhotoController::class, 'update']);
        Route::post('delete', [ProductPhotoController::class, 'delete']);
    });
});
