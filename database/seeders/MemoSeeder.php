<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Memo;
use App\Models\User;
use Illuminate\Database\Seeder;

class MemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 最初のユーザーを取得
        $user = User::first();

        if ($user === null) {
            return;
        }

        // サンプルデータの作成
        $memos = [
            [
                'title' => 'PHP',
                'body' => 'PHPは、Hypertext Preprocessorの略です。',
                'user_id' => $user->id,
            ],
            [
                'title' => 'HTML',
                'body' => 'HTMLは、Hypertext Markup Languageの略です。',
                'user_id' => $user->id,
            ],
            [
                'title' => 'CSS',
                'body' => "CSSは、\nCascading Style Sheets\nの略です。",
                'user_id' => $user->id,
            ],
            [
                'title' => '混在',
                'body' => "Test123 てすとアイウエオｱｲｳｴｵ\n漢字！ＡＢＣ ａｂｃ １２３   😊✨",
                'user_id' => $user->id,
            ],
        ];

        foreach ($memos as $memo) {
            Memo::create($memo);
        }
    }
}
