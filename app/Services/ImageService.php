<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class ImageService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function makeThumb($src, $dest, $width)
    {
        $img = '';
        // 如果沒有 GD 函式庫
        if (!function_exists("imagecreatetruecolor")) {
            // 複製大圖當作小圖
            copy($src, $dest);
            return;
        }

        // getimagesize: 取得圖檔的寬, 高, 類型
        [$w, $h, $type] = getimagesize($src);

        // 如果上傳圖檔的寬比要縮小的圖小
        if ($w <= $width) {
            copy($src, $dest);
            return;
        }

        switch ($type) {
            case IMAGETYPE_JPEG:
                $img = imagecreatefromjpeg($src);
                break;
            case IMAGETYPE_PNG:
                $img = imagecreatefrompng($src);
                break;
            case IMAGETYPE_GIF:
                $img = imagecreatefromgif($src);
                break;
        }

        /*
            計算新的高度(等比例)
            intval: 取整數, 例如:intval(3.9)=3
            如果原始圖為 800 * 600, 縮成寬 300, $height = 600 * 300 / 800 = 225
        */
        $height = intval($h * $width / $w);

        /*
            建立新的空白圖, 再把原始圖縮小後, 放入空白圖中
            imagecreatetruecolor: 建立一個新的真彩色圖檔
         */
        $thumb = imagecreatetruecolor($width, $height);

        // 設定圖檔的混合模式, false: 表示不進行混合顏色
        imagealphablending($thumb, false);

        /* 
            保留透明度
            imagealphablending 與 imagesavealpha: 目的是確保在縮小 png, gif 圖檔時, 能保留透明背景, 部會變成黑色或其他顏色
        */
        imagesavealpha($thumb, true);

        /*
            依比例縮小並複製圖層
            imagecopyresampled: 將原始圖檔縮小後, 複製到新的圖層中, 並進行抗鋸齒處理, 使縮小的圖更加平滑
            $thumb: 縮小的圖檔
            $img: 原始檔
            0, 0, 0, 0: 前兩個0, 目標圖的起始位置(從左上角), x, y 座標; 後兩個0: 原始圖的起始位置(從左上角), x, y 座標
            $width, $height: 縮小圖後的尺寸
            $w, $h: 原始圖的尺寸
        */
        imagecopyresampled($thumb, $img, 0, 0, 0, 0, $width, $height, $w, $h);

        // 依原始圖類型存檔
        switch ($type) {
            case IMAGETYPE_JPEG:
                // 85: 存檔的品質, 數字越大品質越好, 檔案也越大, 品質:0-100
                imagejpeg($thumb, $dest, 85);
                return;
            case IMAGETYPE_PNG:
                imagepng($thumb, $dest);
                return;
            case IMAGETYPE_GIF:
                imagegif($thumb, $dest);
        }
    }

    // $width = 300: 如果傳進來為空, 則預設300, 有傳進來就按參數給
    public static function saveWithThumb(UploadedFile $file, $folder, $width = 300)
    {
        /*
            strtolower: 將文字轉換為小寫
            getClientOriginalExtension: 取得上傳圖檔的附檔名(不含.)         
         */
        $ext = strtolower($file->getClientOriginalExtension());

        /*
            變更上傳圖檔的檔名
            uniqid(): 產出唯一的識別碼
            $fileName: 例如 20261125_123abc,jpg
        */
        $fileName = date('Ymd') . '_' . uniqid() . '.' . $ext;

        $bigPath = public_path($folder);
        // php 在上傳檔案時, 會先儲存在伺服器的暫存資料夾(例如temp)
        // move: 將檔案由暫存資料夾搬移到指定資料夾
        $file->move($bigPath, $fileName);

        $thumbPath = public_path($folder . '/S');
        if (!is_dir($thumbPath)) {
            /*
                true: 如果上層資料夾不存在, 會在建立資料夾時, 同時建立上層資料夾, 
                例如: public/product/S, 若沒有public/product資料夾, 會同時建立public/product及public/product/S兩個資料夾
                0755: 權限, 8進位數字, 
                755: 第一個數字為擁有者(Owner), 第二個數字為群組(Group), 第三個數字為其他人(Other)
                4: 讀取(Read, 代號r), 2: 寫入(Write, 代號w), 1: 執行(Execute, 代號x),
                7: 可讀寫及執行, 5: 可讀及執行
                mkdir: 建立資料夾
             */
            mkdir($thumbPath, 0755, true);
        }

        self::makeThumb($bigPath . '/' . $fileName, $thumbPath . '/' . $fileName, $width);
        return $fileName;
    }
}
