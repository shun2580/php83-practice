<?php
return [
    'id'      => 'q18',
    'type'    => 'choice',
    'level'   => '初級',
    'genre'   => '配列操作',
    'title'   => 'array_flip() の重複値の挙動',
    'question'=> '次のコードを実行したとき、$b[1] の値は何になりますか？

$a = ["x" => 1, "y" => 2, "z" => 1];
$b = array_flip($a);',
    'choices' => [
        'A' => '"x"',
        'B' => '"z"',
        'C' => '["x", "z"]',
        'D' => 'undefined（Notice が発生する）',
    ],
    'correct' => 'B',
    'explanation' => 'array_flip() はキーと値を入れ替えます。値が重複している場合は後から出現したキーで上書きされます。"x"=>1 と "z"=>1 が重複しているため、後に出現した "z" が残り $b[1] は "z" になります。',
];
