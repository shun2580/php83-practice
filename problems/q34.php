<?php
return [
    'id'      => 'q34',
    'type'    => 'coding',
    'level'   => '中級',
    'genre'   => '例外処理',
    'title'   => 'カスタム例外クラスと例外処理',
    'question'=> '以下の2つを実装してください。
① InvalidAgeException — RuntimeException を継承したカスタム例外クラス
② validateAge(int $age): int — $age が 0〜150 の範囲外なら InvalidAgeException をスロー、範囲内ならそのまま返す',
    'examples'=> [
        ['input' => 'validateAge(25)',  'output' => '25'],
        ['input' => 'validateAge(0)',   'output' => '0'],
        ['input' => 'validateAge(-1)',  'output' => 'InvalidAgeException がスローされる'],
        ['input' => 'validateAge(151)', 'output' => 'InvalidAgeException がスローされる'],
    ],
    'constraints' => ['有効範囲: 0 以上 150 以下'],
    'starter' => '<?php
declare(strict_types=1);

class InvalidAgeException extends RuntimeException {}

function validateAge(int $age): int
{
    // 範囲外なら InvalidAgeException をスロー
}
',
    'hint' => 'if ($age < 0 || $age > 150) { throw new InvalidAgeException("Invalid age: {$age}"); } の形で実装します。',
];
