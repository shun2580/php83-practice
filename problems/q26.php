<?php
return [
    'id'      => 'q26',
    'type'    => 'coding',
    'level'   => '中級',
    'genre'   => 'SPLデータ構造',
    'title'   => '括弧の対応チェック（SplStack）',
    'question'=> '()[]{}  のみからなる文字列 $s を受け取り、括弧が正しく対応・ネストされていれば true を、そうでなければ false を返す関数 isBalanced() を SplStack を使って実装してください。空文字列は true とします。',
    'examples'=> [
        ['input' => 'isBalanced("()[]{}")','input_label' => 's = "()[]{}"', 'output' => 'true',  'explanation' => '各括弧がそれぞれ正しく対応している。'],
        ['input' => 'isBalanced("([{}])")','input_label' => 's = "([{}])"', 'output' => 'true',  'explanation' => '内側から外側へ正しくネストされている。'],
        ['input' => 'isBalanced("([)]")','input_label'  => 's = "([)]"',   'output' => 'false', 'explanation' => '閉じ括弧の順序が対応する開き括弧と一致しない。'],
        ['input' => 'isBalanced("{")','input_label'     => 's = "{"',      'output' => 'false', 'explanation' => '開き括弧に対応する閉じ括弧がない。'],
    ],
    'constraints' => [],
    'starter' => '<?php
declare(strict_types=1);

function isBalanced(string $s): bool
{
    $stack = new SplStack();
    $pairs = [\')\' => \'(\', \']\' => \'[\', \'}\' => \'{\'];

    // ここに実装
}
',
    'hint'    => '開き括弧ならスタックに push、閉じ括弧なら pop して対応する開き括弧と一致するか確認します。最後にスタックが空なら true です。',
];
