<?php
return [
    'id'      => 'q25',
    'type'    => 'coding',
    'level'   => '中級',
    'genre'   => 'ソート',
    'title'   => '複合条件ソート（usort）',
    'question'=> '文字列の配列を受け取り、文字数の昇順でソートし、同じ文字数の場合はアルファベット順でソートして返す関数 sortByLengthThenAlpha() を usort() を使って実装してください。',
    'examples'=> [
        ['input' => "sortByLengthThenAlpha(['banana', 'kiwi', 'apple', 'fig'])", 'input_label' => "strings = ['banana','kiwi','apple','fig']", 'output' => '["fig", "kiwi", "apple", "banana"]', 'explanation' => '文字数 3→4→5→6 の順。同文字数はアルファベット順。'],
        ['input' => "sortByLengthThenAlpha(['cat', 'bat', 'rat'])",               'input_label' => "strings = ['cat','bat','rat']",               'output' => '["bat", "cat", "rat"]',             'explanation' => '全て3文字のためアルファベット順になる。'],
        ['input' => "sortByLengthThenAlpha(['c', 'bb', 'aaa', 'a'])",             'input_label' => "strings = ['c','bb','aaa','a']",              'output' => '["a", "c", "bb", "aaa"]',           'explanation' => '文字数 1→1→2→3 の順。同文字数はアルファベット順。'],
    ],
    'constraints' => [],
    'starter' => '<?php
declare(strict_types=1);

function sortByLengthThenAlpha(array $strings): array
{
    // usort() を使って実装
}
',
    'hint'    => 'usort() の比較関数内で、まず strlen() の差を比較し、等しければ strcmp() または <=> で文字列比較します。',
];
