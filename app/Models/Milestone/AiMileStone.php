<?php

namespace App\Models\Milestone;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class AiMileStone extends Model
{
    public static function serach($keyword)
    {
        // openai: https://api.openai.com/v1/chat/completions
        // claude: https://api.anthropic.com.b1/messages
        $res = Http::withToken(env('GROQ_API_KEY'))
            ->timeout(60)
            ->post('https://api.groq.com/openai/v1/chat/completions', [
                'model' => env('GROQ_MODEL', 'openai/gpt-oss-120b'),
                'response_format' => ['type' => 'json_object'],
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => "請用正體中文列出{$keyword}的十筆重要記事, 由新到舊排列, 請用台灣用語"
                            . "請用json格式:{\"events\":[{\"year\":2026, \"title\":\"標題\", \"content\":\"內容\"}]"
                    ],
                ],
            ]);

        // 如果呼叫失敗
        if ($res->failed()) {
            // 回傳空陣列
            return [];
        }

        /*
            OpenAI的回應大致為:
            {
                'choices' :[
                    {
                        'message' : { 'role': 'assistant', 'content': '這裡是ai回應的內容' }
                    }
                ]
            }

            choices: 回應選項的陣列
            0: 取第一個陣列資料(陣列的索引值從0開始)
            message: 回應訊息物件
            content: ai真正回應的內容
        */
        $content = $res->json('choices.0.message.content');

        // json_decode: 將json字串轉成陣列, true: 表示轉成陣列而不是物件
        $data = json_decode($content, true);

        // ??[]: 如果沒有events(在呼叫ai時,請ai回傳的格式), 回傳空陣列
        return $data['events'] ?? [];
    }

    public static function word()
    {
        $res = Http::withToken(env('GROQ_API_KEY'))
            ->timeout(300)
            ->post('https://api.groq.com/openai/v1/chat/completions', [
                'model' => env('GROQ_MODEL', 'openai/gpt-oss-120b'),
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => "你是撰寫文件的助手, 請用正體中文回答, 請用台灣用語, 不要使用Markdown符號"
                    ],
                    [
                        'role' => 'user',
                        'content' => "請產出一份[如何使用Laravel呼叫AI api]的說明文件, 格式為word"
                    ],
                ],
            ]);

        $content = $res->json('choices.0.message.content') ?? "AI沒有回應";

        $word = new PhpWord();
        // 在word中建立一個分節, 標題,文字,表格要在分節中
        $section = $word->addSection();
        // 建立標題
        $section->addTitle('AI說明文件', 1);    // 1: 標題1(最大的標題), 如果用2, 則為標題2

        // explode: 分隔字串, 字串分割後會存成陣列
        // \n: 文字的換行
        foreach (explode("\n", $content) as $line) {
            // 將每一行寫入word
            $section->addText($line, ['name' => '標楷體', 'size' => 12]);
        }
        
        // 儲存的資料夾及檔名, storate_path: 在Laravel專案的storage資料夾
        $path = storage_path('app/ai_doc.docx');
        // createWriter: 寫入檔案, Word2007: 輸出成.docx格式(Word2007以後的格式), save: 儲存
        IOFactory::createWriter($word, 'Word2007')->save($path);
        // download: 下載, deleteFileAfterSend: 傳送給使用者後刪除
        return response()->download($path)->deleteFileAfterSend(true);
    }
}
