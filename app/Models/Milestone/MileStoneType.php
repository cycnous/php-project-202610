<?php

namespace App\Models\Milestone;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// 大事記類別
class MileStoneType extends Model
{
    public $timestamps = false;
    protected $table = 'milestone_type';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'label', 'title'];

    public function milestone(): HasMany
    {
        // 每一個類別可能有多筆大事紀
        // hasMany(): 有多筆資料
        // typeId: 大事記資料表milestone的外來鍵
        // id: 大事記類別資料表milestone_type的主鍵
        return $this->hasMany(MileStone::class, 'typeId', 'Id');
    }
}
