<?php
return [
    'id'      => 'q24',
    'type'    => 'coding',
    'level'   => '初級',
    'genre'   => '文字列操作',
    'title'   => 'スネークケース → キャメルケース変換',
    'question'=> 'アンダースコア区切りのスネークケース文字列をキャメルケースに変換する関数 toCamelCase() を実装してください。
・最初の単語はそのまま（小文字）
・2番目以降の単語は先頭を大文字にする
explode() / implode() / ucfirst() を活用してください。',
    'examples'=> [
        ['input' => 'toCamelCase("hello_world")',   'input_label' => 'str = "hello_world"',   'output' => '"helloWorld"',   'explanation' => '"world" の先頭を大文字にして連結する。'],
        ['input' => 'toCamelCase("get_user_name")', 'input_label' => 'str = "get_user_name"', 'output' => '"getUserName"', 'explanation' => '"user" と "name" の先頭を大文字にして連結する。'],
        ['input' => 'toCamelCase("hello")',          'input_label' => 'str = "hello"',          'output' => '"hello"',        'explanation' => 'アンダースコアがないためそのまま返す。'],
    ],
    'constraints' => [],
    'starter' => '<?php
declare(strict_types=1);

function toCamelCase(string $str): string
{
    // ここに実装
}
',
    'hint'    => 'explode("_", $str) で分割 → array_shift() で先頭を取り出す → 残りに array_map("ucfirst", ...) → implode("", ...) で結合します。',
];
