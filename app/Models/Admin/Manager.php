<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    // timestamps = flase: 不要用到Laravel硬塞的兩個時間欄位(create_at和update_at)
    public $timestamps = false;
    // 資料表名稱
    protected $table = 'manager';
    // 主鍵名稱
    protected $primaryKey = 'id';
    // manager資料表中的欄位名稱
    protected $fillable = ['id', 'userId', 'pwd'];

    public function getManager($userId, $pwd)
    {
        // self: manager這個資料表
        // first(): 取第一筆資料
        // 下列語法 = SELECT * FROM manager WHERE userId = xxx AND pwd = xxx LIMIT 1;
    
        $manager = self::where('userId', $userId)->where('pwd', $pwd)->first();
        return $manager;
    }
}
