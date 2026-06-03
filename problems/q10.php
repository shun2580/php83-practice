<?php
return [
    'id'      => 'q10',
    'type'    => 'coding',
    'level'   => '初級',
    'genre'   => '配列操作',
    'title'   => '配列の重複除去',
    'question'=> '整数の配列 $arr を受け取り、重複を除いた配列を元の順序を保ったまま返す関数 uniqueArray を実装してください。返り値は 0 始まりのインデックスに再採番してください。',
    'examples'=> [
        ['input' => '[1,2,2,3,3,3]', 'input_label' => 'arr = [1,2,2,3,3,3]', 'output' => '[1,2,3]',   'explanation' => '重複を除くと [1,2,3] となる。元の順序を保つ。'],
        ['input' => '[5,1,5,2]',      'input_label' => 'arr = [5,1,5,2]',      'output' => '[5,1,2]',   'explanation' => '最初の出現順を維持して 5 の重複を除去する。'],
    ],
    'constraints' => [],
    'starter' => '<?php
declare(strict_types=1);

function uniqueArray(array $arr): array
{
    // ここに実装
}
',
    'hint'    => 'array_unique() で重複除去し、array_values() でインデックスを振り直しましょう。',
];
