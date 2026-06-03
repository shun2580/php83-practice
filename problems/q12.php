<?php
return [
    'id'      => 'q12',
    'type'    => 'coding',
    'level'   => '中級',
    'genre'   => '再帰',
    'title'   => 'フィボナッチ数列（再帰）',
    'question'=> '整数 $n を受け取り、フィボナッチ数列の第 $n 項を返す関数 fibonacci を再帰で実装してください。
fib(0)=0, fib(1)=1, fib(n)=fib(n-1)+fib(n-2)',
    'examples'=> [
        ['input' => '0',  'input_label' => 'n = 0',  'output' => '0',  'explanation' => 'fib(0) = 0 がベースケース。'],
        ['input' => '6',  'input_label' => 'n = 6',  'output' => '8',  'explanation' => 'fib(6) = fib(5)+fib(4) = 5+3 = 8。'],
        ['input' => '10', 'input_label' => 'n = 10', 'output' => '55', 'explanation' => 'fib(10) = 55。'],
    ],
    'constraints' => [],
    'starter' => '<?php
declare(strict_types=1);

function fibonacci(int $n): int
{
    // 再帰で実装
}
',
    'hint'    => 'ベースケース $n <= 1 を先に処理します。発展: メモ化で計算量を削減してみましょう。',
];
