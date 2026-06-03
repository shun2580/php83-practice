<?php
return [
    'id'      => 'q09',
    'type'    => 'coding',
    'level'   => '初級',
    'genre'   => 'アルゴリズム',
    'title'   => 'FizzBuzz',
    'question'=> '整数 $n を受け取り、1〜$n の各数について以下のルールで文字列を格納した配列を返す関数 fizzBuzz を実装してください。
・3の倍数 → "Fizz"
・5の倍数 → "Buzz"
・15の倍数 → "FizzBuzz"
・それ以外 → 数字の文字列',
    'examples'=> [
        ['input' => '5',  'input_label' => 'n = 5',  'output' => '["1","2","Fizz","4","Buzz"]',  'explanation' => '3の倍数(3)は "Fizz"、5の倍数(5)は "Buzz" に置き換える。'],
        ['input' => '15', 'input_label' => 'n = 15', 'output' => '[..., "FizzBuzz"]（15番目）', 'explanation' => '15は3と5の公倍数なので "FizzBuzz" となる。'],
    ],
    'constraints' => [],
    'starter' => '<?php
declare(strict_types=1);

function fizzBuzz(int $n): array
{
    // ここに実装
}
',
    'hint'    => '% 演算子で余りを確認します。FizzBuzz（15の倍数）の判定を最初に行いましょう。PHP 8 の match 式が使えます。',
];
