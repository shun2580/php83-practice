<?php
return [
    'id'      => 'q23',
    'type'    => 'coding',
    'level'   => '初級',
    'genre'   => '配列操作',
    'title'   => '最長の単語を探す（array_reduce）',
    'question'=> '文字列の配列 $words を受け取り、最も文字数の多い単語を返す関数 longestWord() を array_reduce() を使って実装してください。同じ文字数の場合は先に出現したものを返します。配列が空の場合は空文字列を返してください。',
    'examples'=> [
        ['input' => "longestWord(['apple', 'banana', 'kiwi'])", 'input_label' => "words = ['apple','banana','kiwi']", 'output' => '"banana"', 'explanation' => '"banana" が最も文字数が多い（6文字）。'],
        ['input' => "longestWord(['cat', 'dog', 'ant'])",       'input_label' => "words = ['cat','dog','ant']",       'output' => '"cat"',    'explanation' => '同文字数のため最初に出現した "cat" を返す。'],
        ['input' => "longestWord([])",                           'input_label' => 'words = []',                            'output' => '""',       'explanation' => '空配列の場合は空文字列を返す。'],
    ],
    'constraints' => [],
    'starter' => '<?php
declare(strict_types=1);

function longestWord(array $words): string
{
    // array_reduce() を使って実装
}
',
    'hint'    => 'array_reduce($words, fn($carry, $item) => strlen($item) > strlen($carry) ? $item : $carry, "") という形で初期値を "" にすれば比較できます。',
];
