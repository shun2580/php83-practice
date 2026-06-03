<?php
return [
    'id'       => 'q05',
    'type'     => 'text',
    'level'    => '初級',
    'genre'    => 'PHP基礎知識',
    'title'    => 'declare(strict_types=1) の役割',
    'question' => 'PHP ファイルの先頭に書く declare(strict_types=1); は何のためのものですか？\n80文字程度で説明してください。',
    'keywords' => ['厳密', '型'],
    'accepted_answers' => [],
    'explanation' => 'declare(strict_types=1) を宣言すると、そのファイル内での関数・メソッド呼び出し時に引数の型が厳密にチェックされます。型が一致しない場合は TypeError がスローされます。',
    'model_answer' => '関数やメソッドの引数・戻り値の型を厳密にチェックし、型が一致しない場合に TypeError をスローするための宣言です。',
];
