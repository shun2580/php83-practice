<?php
return [
    'id'      => 'q08',
    'type'    => 'coding',
    'level'   => '初級',
    'genre'   => '文字列操作',
    'title'   => '文字列の逆順',
    'question'=> '文字列 $s を受け取り、文字を逆順にした文字列を返す関数 reverseString を実装してください。',
    'examples'=> [
        ['input' => '"hello"',  'input_label' => 's = "hello"',  'output' => '"olleh"', 'explanation' => '文字列を逆順にすると "olleh" となる。'],
        ['input' => '"PHP"',    'input_label' => 's = "PHP"',    'output' => '"PHP"',   'explanation' => '逆順にしても "PHP" のまま変わらない。'],
        ['input' => '"abcde"',  'input_label' => 's = "abcde"',  'output' => '"edcba"', 'explanation' => '文字列を逆順にすると "edcba" となる。'],
    ],
    'constraints' => [],
    'starter' => '<?php
declare(strict_types=1);

function reverseString(string $s): string
{
    // ここに実装
}
',
    'hint'    => 'strrev() を使う方法と、str_split() → array_reverse() → implode() を組み合わせる方法があります。',
];
