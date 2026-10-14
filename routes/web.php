<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Front\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);

// Route::get('/admin', [AdminController::class, 'index']);
// Route::post('/admin/login', [AdminController::class, 'login']);
// Route::get('/admin/home', [AdminController::class, 'home']);

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', [AdminController::class, 'index']);
    Route::post('login', [AdminController::class, 'login']);
    Route::get('home', [AdminController::class, 'home'])->middleware('manager');

    Route::middleware('manager')->group(function(){
        // 網址: /admin/manager
        Route::prefix('manager')->group(function(){
            // 網址: /admin/manager/list
            Route::get('list', [ManagerController::class, 'list']);
        });
    });
});