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

    // 後台登入
    // Request: 接收表單送過來的資料的物件
    // $req: 變數名稱, 可自行定義
    public function login(Request $req)
    {
        // Response: 回應給使用者
        // Request : 使用者送出的請求, 包括送出資料, 點選超連結

        // 帳號: $req->userId 是admin/login.blade.php中的 name='userId'
        // 密碼: $req->pwd 是admin/login.blade.php中的 name='pwd'
        // $userId, $pwd: 接收資料後暫存的名稱, 可自行定義
        $userId = $req->userId;
        $pwd = $req->pwd;

        // 1. 建立model: php artisan make:model Admin/Manager
        // 2. 開啟 add/Models/Admin/Manager.php, 詳如Manager.php
        // 3. 呼叫Manager的方法(例如:checkManager()), 確認帳密是否存在
        //    如果帳號或密碼錯誤, 回到上一頁, 並帶回原本輸入的資料及錯誤訊息
        //    如果帳號及密碼正確, 則進入後台系統/admin/home

        // Manager是class(類別),
        // 一定要先new Manager(建立物件), 才能呼叫Manager中的function (例如:checkManager)
        // ------ 例如 ------
        // $manager = new Manager();
        // $list = $manager->checkManager($userId, $pwd);
        // 可合併成一行:
        // $list = (new Manager())->checkManager($userId, $pwd);

        // 檢查manager資料表中是否有相同的帳號及密碼
        // $manager = (new Manager())->getManager($userId, $pwd);
        $manager = (new Manager())->checkManager($userId, $pwd);
        if (empty($manager)) {
            // empty: 空的, 無資料(帳號+密碼不存在)
            // back() : 後退, 回到上一頁
            // withInput() : 回到上一頁後, 保留原本所輸入的資料
            // withErrors(): 回到上一頁後, 帶出錯誤訊息, msg:自己定義的名稱, 可設定多個錯誤訊息
            return back()->withInput()->withErrors(['msg' => '帳號或密碼錯誤']);
        } else {
            // 帳號+密碼存在(登入成功)
            // 將帳號暫存在伺服器, 名稱為userId, 值為所輸入的帳號
            // 確保在後續操作時, 可以檢查是否有確實登入
            // session(): 暫存資料在伺服器
            // put(): 設定
            session()->put('userId', $userId);
            // redirect: 轉址到後台首頁
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
