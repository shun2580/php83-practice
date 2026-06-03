<?php
return [
    'id'      => 'q35',
    'type'    => 'coding',
    'level'   => '中級',
    'genre'   => 'ジェネレータ',
    'title'   => 'ジェネレータで範囲数列を生成',
    'question'=> '$start から $end まで（両端含む）$step ずつ増加する整数を yield するジェネレータ関数 range_gen() を実装してください。
iterator_to_array() でリスト化して使います。',
    'examples'=> [
        ['input' => 'iterator_to_array(range_gen(1, 5, 1))',   'input_label' => 'range_gen(1, 5, 1)',   'output' => '[1, 2, 3, 4, 5]'],
        ['input' => 'iterator_to_array(range_gen(0, 10, 2))',  'input_label' => 'range_gen(0, 10, 2)',  'output' => '[0, 2, 4, 6, 8, 10]'],
        ['input' => 'iterator_to_array(range_gen(5, 5, 1))',   'input_label' => 'range_gen(5, 5, 1)',   'output' => '[5]'],
    ],
    'constraints' => ['$step は正の整数', '$start <= $end'],
    'starter' => '<?php
declare(strict_types=1);

function range_gen(int $start, int $end, int $step): Generator
{
    // yield を使って実装
}
',
    'hint' => 'for ($i = $start; $i <= $end; $i += $step) { yield $i; } で実装できます。yield があるだけで関数はジェネレータになります。',
];
