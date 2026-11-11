<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\MileStoneController;
use App\Http\Controllers\Admin\MileStoneTypeController;
use App\Http\Controllers\Front\FrontMileStoneController as MileStone;
use App\Http\Controllers\Front\IndexController;
use Illuminate\Support\Facades\Route;

// 所有的網址(超連結, href)或表單(form)都要在路由設定
// Route:路由, :: 呼叫靜態函示, get:超連結
// 'admin': 表示網址為http://127.0.0.1:8000/admin, 
//          如果是正式網站則是https://www.xxx.com.tw/admin
//          https: SSL加密機制, 保證在資料傳輸過程中將資料加密, 不易被解析, 埠號(port)為443
// AdminController::class, 當網址為http://127.0.0.1:8000/admin 時, 會執行AdminController這個程式
// 'index', AdminController要執行的功能(或函式, function)

// Route::post, 通常是表單送資料到網站
// 登入的網址(login.blade.php), 因為form method是post, 所以用Route::post

Route::get('/', [IndexController::class, 'index']);

// 後台首頁
Route::get('/admin', [AdminController::class, "index"]);
// 登入的網址, 因為resources/views/admin/login.blade.php中form的method為post, 所以要用Route::post
Route::post("/admin/login", [AdminController::class, "login"]); // 登入
Route::get('/admin/home', [AdminController::class, "home"])->middleware('manager'); // 後台首頁

// 帳號管理
Route::get("/manager/list", [ManagerController::class, "list"])->middleware('manager'); //帳號管理
Route::get("/manager/create", [ManagerController::class, "create"]); //新增帳號
Route::post("/manager/store", [ManagerController::class, "store"]); //儲存帳號
// {}:表示有帶資料進來, {id}中的id為變數名稱
// 如果是{id?}有問號, 表示可能有帶資料,也可能沒帶資料
Route::get("/manager/edit/{id}", [ManagerController::class, "edit"]); // 修改帳號
Route::post("/manager/update", [ManagerController::class, "update"]); // 更新帳號
Route::get("/manager/delete/{id}", [ManagerController::class, "delete"]); // 刪除帳號
Route::post("/manager/checkAccount", [ManagerController::class, "checkAccount"]); // 檢查帳號

// // 大事記管理
// Route::get('/admin/milestone/list', [MileStoneController::class, 'list']);
// // 大事記類別管理
// Route::get('/admin/milestone/types/list', [MileStoneTypeController::class, 'list']);
// // 新建大事記類別
// Route::get('/admin/milestone/types/create', [MileStoneTypeController::class, 'create']);
// // 儲存大事記類別
// Route::post('/admin/milestone/types/store', [MileStoneTypeController::class, 'store']);
// // 修改大事記類別
// Route::get('/admin/milestone/types/edit/{id}', [MileStoneTypeController::class, 'edit']);
// // 更新大事記類別
// Route::post('/admin/milestone/types/update', [MileStoneTypeController::class, 'update']);
// // 刪除大事記類別
// Route::post('/admin/milestone/types/delete', [MileStoneTypeController::class, 'delete']);

// 大事記
// group: 群組; prefix: 前置詞
// 透過群組+前置詞整理路由, 以方便管理及維護
Route::group(['middleware' => 'manager', 'prefix' => 'admin/milestone'], function () {
    // 大事記列表
    Route::get('list', [MileStoneController::class, 'list']);
    Route::get('add', [MileStoneController::class, 'add']);
    Route::post('store', [MileStoneController::class, 'store']);
    Route::get('edit/{id}', [MileStoneController::class, 'edit']);
    Route::post('update', [MileStoneController::class, 'update']);
    Route::post('delete', [MileStoneController::class, 'delete']);

    Route::group(['prefix' => 'types'], function () {
        Route::get('list', [MileStoneTypeController::class, 'list']);
        Route::get('create', [MileStoneTypeController::class, 'create']);
        Route::post('store', [MileStoneTypeController::class, 'store']);
        Route::get('edit/{id}', [MileStoneTypeController::class, 'edit']);
        Route::post('update', [MileStoneTypeController::class, 'update']);
        Route::post('delete', [MileStoneTypeController::class, 'delete']);
    });
});

Route::get('milestone', [MileStone::class, 'list']);

// Route::group(['prefix' => 'admin'], function(){
//     Route::get('/', [AdminController::class, 'index']);
//     Route::post('login', [AdminController::class, 'login']);
//     Route::get('home', [AdminController::class, 'home'])->middleware('manager');
//     Route::get('logout', [AdminController::class, 'logout']);

//     Route::middleware('manager')->group(function(){
//         // 網址: /admin/manager
//         Route::prefix('manager')->group(function(){
//             // 網址: /admin/manager/list
//             Route::get('list', [ManagerController::class, 'list']);
//             Route::get('create', [ManagerController::class, 'create']);
//         });
//     });
// });