<?php
return [
    'id'      => 'q21',
    'type'    => 'coding',
    'level'   => '初級',
    'genre'   => '文字列操作',
    'title'   => '文字列の切り詰め（mb_ 関数）',
    'question'=> '文字列 $str を受け取り、文字数が $limit を超える場合は $limit 文字に切り詰めて末尾に "..." を付けて返す関数 truncate() を実装してください。$limit 文字以内の場合はそのまま返します。日本語にも対応するため mb_strlen() / mb_substr() を使ってください。',
    'examples'=> [
        ['input' => 'truncate("こんにちは世界", 5)', 'input_label' => 'str = "こんにちは世界", limit = 5', 'output' => '"こんにちは..."', 'explanation' => '6文字が 5 を超えるため先頭 5 文字に切り詰めて "..." を付加。'],
        ['input' => 'truncate("Hello", 10)',          'input_label' => 'str = "Hello", limit = 10',           'output' => '"Hello"',          'explanation' => '5文字は limit 10 以内なのでそのまま返す。'],
        ['input' => 'truncate("PHPプログラミング", 4)', 'input_label' => 'str = "PHPプログラミング", limit = 4', 'output' => '"PHPプ..."',      'explanation' => '8文字が 4 を超えるため "PHPプ" + "..." となる。'],
    ],
    'constraints' => [],
    'starter' => '<?php
declare(strict_types=1);

function truncate(string $str, int $limit): string
{
    // ここに実装
}
',
    'hint'    => 'mb_strlen() で文字数を確認し、超えている場合は mb_substr($str, 0, $limit) で切り出して "..." を連結します。',
];
