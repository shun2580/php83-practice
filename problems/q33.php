<?php
return [
    'id'      => 'q33',
    'type'    => 'coding',
    'level'   => '中級',
    'genre'   => 'クロージャ',
    'title'   => 'クロージャと部分適用（カリー化）',
    'question'=> '整数 $base を受け取り、「その値に $base を加算するクロージャ」を返す関数 adder() を実装してください。
返されたクロージャは int を受け取り、$base を足した int を返します。',
    'examples'=> [
        ['input' => 'adder(5)(3)',    'input_label' => '$add5 = adder(5); $add5(3)',    'output' => '8'],
        ['input' => 'adder(10)(0)',   'input_label' => '$add10 = adder(10); $add10(0)',  'output' => '10'],
        ['input' => 'adder(-3)(7)',   'input_label' => '$subtr = adder(-3); $subtr(7)', 'output' => '4'],
    ],
    'constraints' => [],
    'starter' => '<?php
declare(strict_types=1);

function adder(int $base): Closure
{
    // クロージャを返す
}
',
    'hint' => 'return function(int $n) use ($base): int { return $n + $base; }; の形で実装します。use で外部変数を取り込むのがポイントです。',
];
