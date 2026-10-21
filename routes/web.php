<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ManagerController;
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

Route::get('/admin', [AdminController::class, "index"]);
// 登入的網址, 因為resources/views/admin/login.blade.php中form的method為post, 所以要用Route::post
Route::post("/admin/login", [AdminController::class, "login"]); // 登入
Route::get('/admin/home', [AdminController::class, "home"]);// 後台首頁
Route::get("/manager/list", [ManagerController::class, "list"]);//帳號管理
Route::get("/manager/create", [ManagerController::class, "create"]);//新增帳號
Route::post("/manager/store", [ManagerController::class, "store"]);//儲存帳號
// {}:表示有帶資料進來, {id}中的id為變數名稱
// 如果是{id?}有問號, 表示可能有帶資料,也可能沒帶資料
Route::get("/manager/edit/{id}", [ManagerController::class, "edit"]);
Route::post("/manager/update", [ManagerController::class, "update"]);

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