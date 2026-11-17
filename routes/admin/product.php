<?php

use App\Http\Controllers\Admin\Product\ProductTypeController;

// 後台產品
Route::group(['middleware' => 'manager', 'prefix' => 'admin/product'], function () {
    // 產品類別
    Route::group(['prefix' => 'types'], function () {
        Route::get('list', [ProductTypeController::class, 'list']);
        Route::get('create', [ProductTypeController::class, 'create']);
        Route::post('store', [ProductTypeController::class, 'store']);
        Route::get('edit/{id}', [ProductTypeController::class, 'edit']);
        Route::post('update', [ProductTypeController::class, 'update']);
        Route::post('delete', [ProductTypeController::class, 'delete']);
    });
});
