<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        // 回傳admin資料夾中的login網頁(login.blade.php)
        // 所有網頁都在resources/views之下
        // 1. 新增Admin/Admincontroller
        //    php artisan make:controller Admin/Admincontroller)
        // 2. 在resources/views新增(資料夾)admin/(檔案)login.blade.php
        // 3. 在routes/web/php 新增路由, use 可以依靠擴充PHP Intelephense自動帶出
        //    Route::get('/admin', [AdminController::class, 'index']);
        //    use App\Http\Controllers\Admin\AdminController;
        // 4. 如果server沒有啟動,在終端機輸入php artisan serve 啟動伺服器
        // 5. 在瀏覽器輸入http://127.0.0.1:8000/admin,即可看到後台登入頁面
        // 6. 將範例網頁的CSS和JS資料夾, 複製到public資料夾下
        return view("admin.login");
    }

    public function login(Request $req)
    {
        // Response: 回應給使用者
        // Request : 使用者送出的請求, 包括送出資料, 點選超連結

        $userId = $req->userId;
        $pwd = $req->pwd;

        $manager = (new Manager())->getManager($userId, $pwd);
        if (empty($manager)) {
            // empty: 空的, 無資料(帳號+密碼不存在)
            // back : 回到上一頁
            // withInput : 保留上一頁所輸入的資料
            // withErrors: 回傳錯誤訊息 msg:自己定義的名稱
            return back()->withInput()->withErrors(['msg' => '帳號或密碼錯誤']);
        } else {
            // 帳號+密碼存在(登入成功)
            // 將帳號暫存在伺服器, 名稱為userId, 值為所輸入的帳號
            session()->put('userId', $userId);
            // redirect: 轉址
            return redirect("/admin/home");
        }
    }

    public function home()
    {
        return view('admin.home');
    }

    public function logout(){
        // session()->forget('userId');
        // 移除 Session 中指定的單一或多個鍵值（Key）資料。 
        Session::forget('userId');
        // Session::flush(); 清空 Session 中的所有資料
        return redirect('/admin');
    }
}
