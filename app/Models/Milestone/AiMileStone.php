<?php

namespace App\Models\Milestone;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

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
}
