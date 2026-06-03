<?php
return [
    'id'      => 'q13',
    'type'    => 'coding',
    'level'   => '中級',
    'genre'   => 'アルゴリズム',
    'title'   => '二分探索',
    'question'=> 'ソート済みの整数配列 $arr と整数 $target を受け取り、$target のインデックスを返す関数 binarySearch を実装してください。見つからない場合は -1 を返します。',
    'examples'=> [
        ['input' => '[1,3,5,7,9], 5', 'input_label' => 'arr = [1,3,5,7,9], target = 5', 'output' => '2',  'explanation' => '5 はインデックス 2 に存在する。'],
        ['input' => '[1,3,5,7,9], 1', 'input_label' => 'arr = [1,3,5,7,9], target = 1', 'output' => '0',  'explanation' => '1 はインデックス 0 に存在する。'],
        ['input' => '[1,3,5], 4',     'input_label' => 'arr = [1,3,5], target = 4',     'output' => '-1', 'explanation' => '4 は配列に存在しないため -1 を返す。'],
    ],
    'constraints' => [],
    'starter' => '<?php
declare(strict_types=1);

function binarySearch(array $arr, int $target): int
{
    // ここに実装
}
',
    'hint'    => '$left=0, $right=count($arr)-1 を初期値に。$mid=intdiv($left+$right,2) で中央を求めて比較します。',
];
