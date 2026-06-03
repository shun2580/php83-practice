<?php
return [
    'id'      => 'q01',
    'type'    => 'choice',
    'level'   => '初級',
    'genre'   => 'PHP基礎知識',
    'title'   => 'match式の特徴',
    'question'=> 'PHP 8.0 で導入された match 式について、正しい説明はどれですか？',
    'choices' => [
        'A' => 'switch 文と同様に型の緩やかな比較（==）を行う',
        'B' => '厳密な比較（===）を行い、一致しない場合は UnhandledMatchError をスローする',
        'C' => '戻り値を持てない',
        'D' => 'default ケースは必須である',
    ],
    'correct' => 'B',
    'explanation' => 'match 式は === による厳密比較を行います。どのケースにも一致しない場合は UnhandledMatchError がスローされます。switch と違いフォールスルーがなく、値を返せます。default は省略可能です。',
];
