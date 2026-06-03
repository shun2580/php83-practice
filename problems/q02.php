<?php
return [
    'id'      => 'q02',
    'type'    => 'choice',
    'level'   => '初級',
    'genre'   => 'PHP基礎知識',
    'title'   => 'readonly プロパティ',
    'question'=> 'PHP 8.1 の readonly プロパティについて、正しい説明はどれですか？',
    'choices' => [
        'A' => 'コンストラクタ以外からも自由に変更できる',
        'B' => '初期化後は再代入できず、コンストラクタ内でのみ値をセットできる',
        'C' => 'static プロパティにのみ使用できる',
        'D' => 'null 値を持てない',
    ],
    'correct' => 'B',
    'explanation' => 'readonly プロパティは初期化（コンストラクタ内または宣言時）後は再代入できません。static プロパティには使えません。null を持つことも可能です（型に ?型 を使用）。',
];
