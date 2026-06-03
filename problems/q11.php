<?php
return [
    'id'      => 'q11',
    'type'    => 'coding',
    'level'   => '初級',
    'genre'   => '文字列操作',
    'title'   => '回文判定',
    'question'=> '文字列 $s を受け取り、前後どちらから読んでも同じ（回文）なら true、そうでなければ false を返す関数 isPalindrome を実装してください。大文字・小文字は区別しない。スペースは無視してください。',
    'examples'=> [
        ['input' => '"racecar"',                     'input_label' => 's = "racecar"',                     'output' => 'true',  'explanation' => '逆から読んでも "racecar" のため回文。'],
        ['input' => '"hello"',                       'input_label' => 's = "hello"',                       'output' => 'false', 'explanation' => '逆から読むと "olleh" となり回文でない。'],
        ['input' => '"A man a plan a canal Panama"', 'input_label' => 's = "A man a plan a canal Panama"', 'output' => 'true',  'explanation' => 'スペースを除去し大小文字を無視すると回文になる。'],
    ],
    'constraints' => [],
    'starter' => '<?php
declare(strict_types=1);

function isPalindrome(string $s): bool
{
    // ここに実装
}
',
    'hint'    => 'strtolower() と str_replace() で正規化してから strrev() と比較しましょう。',
];
