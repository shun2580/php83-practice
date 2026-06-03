<?php
return [
    'id'      => 'q20',
    'type'    => 'choice',
    'level'   => '初級',
    'genre'   => 'ソート',
    'title'   => 'usort() とスペースシップ演算子',
    'question'=> 'usort() を使って配列を昇順にソートするとき、スペースシップ演算子（<=>）を使った正しい書き方はどれですか？',
    'choices' => [
        'A' => 'usort($arr, fn($a, $b) => $b <=> $a)',
        'B' => 'usort($arr, fn($a, $b) => $a <=> $b)',
        'C' => 'usort($arr, fn($a, $b) => $a > $b)',
        'D' => 'usort($arr, fn($a, $b) => true)',
    ],
    'correct' => 'B',
    'explanation' => '$a <=> $b は $a が $b より小さければ負、等しければ 0、大きければ正を返します。usort は比較関数が正を返したとき $a を $b の後に並べるため、$a <=> $b で昇順になります。降順にするには $b <=> $a を使います。',
];
