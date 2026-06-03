<?php
return [
    'id'      => 'q30',
    'type'    => 'choice',
    'level'   => '中級',
    'genre'   => 'PHP 8.x 新機能',
    'title'   => 'ファーストクラス callable 構文',
    'question'=> 'PHP 8.1 で追加された「ファーストクラス callable 構文」を使って strlen を Closure として取得する正しい書き方はどれですか？',
    'choices' => [
        'A' => '$fn = strlen(...);',
        'B' => '$fn = "strlen";',
        'C' => '$fn = fn($s) => strlen($s);',
        'D' => '$fn = &strlen;',
    ],
    'correct' => 'A',
    'explanation' => 'PHP 8.1 で追加されたファーストクラス callable 構文では 関数名(...) と書くことで Closure オブジェクトを直接取得できます。B は文字列 callable（旧来の方法で Closure ではない）、C はアロー関数（動作はするが冗長）、D は構文エラーです。A の strlen(...) が最も簡潔な新構文です。',
];
