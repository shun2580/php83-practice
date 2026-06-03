<?php
return [
    'id'      => 'q17',
    'type'    => 'choice',
    'level'   => '初級',
    'genre'   => '文字列操作',
    'title'   => 'PHP 8 の文字列検索関数',
    'question'=> 'PHP 8.0 で追加された str_contains(), str_starts_with(), str_ends_with() について正しい説明はどれですか？',
    'choices' => [
        'A' => 'str_contains("Hello", "hello") は true を返す（大文字小文字を区別しない）',
        'B' => 'str_starts_with("hello", "") は false を返す（空文字列は一致しない）',
        'C' => 'str_contains(), str_starts_with(), str_ends_with() はすべて大文字小文字を区別する',
        'D' => 'str_ends_with("php", "P") は true を返す（大文字小文字を無視する）',
    ],
    'correct' => 'C',
    'explanation' => 'これら3つの関数はすべて大文字小文字を区別します（case-sensitive）。そのため str_contains("Hello", "hello") は false を返します。また空文字列を needle に渡した場合は常に true を返します（str_starts_with("hello", "") === true）。',
];
