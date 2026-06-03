<?php
return [
    'id'      => 'q19',
    'type'    => 'choice',
    'level'   => '初級',
    'genre'   => '数学・数値',
    'title'   => 'intdiv() の動作',
    'question'=> 'intdiv() に関する説明として正しいものはどれですか？',
    'choices' => [
        'A' => 'intdiv(7, 2) は 3.5 を返す',
        'B' => 'intdiv(-7, 2) は -4 を返す（負の無限大方向への切り捨て）',
        'C' => 'intdiv(7, 0) は 0 を返す',
        'D' => 'intdiv(-7, 2) は -3 を返す（ゼロ方向への切り捨て）',
    ],
    'correct' => 'D',
    'explanation' => 'intdiv() はゼロに向かって切り捨て（truncate）します。intdiv(-7, 2) = -3 です（floor(-3.5) = -4 とは異なります）。intdiv(7, 0) は DivisionByZeroError をスローします。戻り値は常に int 型です。',
];
