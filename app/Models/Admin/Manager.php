<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    // $timestamps = flase: 不要使用Laravel硬塞的兩個時間欄位(建立時間 create_at和修改時間 update_at)
    public $timestamps = false;
    // 資料表名稱
    protected $table = 'manager';
    // 主鍵名稱, $primaryKey的K要大寫
    protected $primaryKey = 'id';
    // 資料表欄位, manager資料表中的欄位名稱
    protected $fillable = ['id', 'userId', 'pwd'];

    // 檢查manager資料表中是否有相同的帳號及密碼
    // checkManager: 方法名稱
    // checkManager(string $userId, string $pwd): 表示這個方法傳入兩個資料(userId, pwd)
    // string $userId: 表示傳入的帳號為文字, string可省略不寫
    public function checkManager(string $userId, string $pwd)
    // public function getManager($userId, $pwd)
    {
        // self: manager自己的資料表
        // first(): 取第一筆資料
        // 下列語法 = SELECT * FROM manager WHERE userId = $userId(傳入的帳號) AND pwd = $pwd(傳入的密碼) LIMIT 1;
        // 查詢結果放在 $manager這個變數中, 再將結果回傳(return)給呼叫的程式
    
        $manager = self::where('userId', $userId)->where('pwd', $pwd)->first();
        return $manager;
    }
}
