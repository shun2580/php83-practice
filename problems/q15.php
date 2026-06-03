<?php
return [
    'id'      => 'q15',
    'type'    => 'coding',
    'level'   => '上級',
    'genre'   => '動的計画法',
    'title'   => 'コインの組み合わせ（DP）',
    'question'=> 'コインの種類を表す整数配列 $coins と整数 $amount を受け取り、$amount を作るのに必要なコインの最小枚数を返す関数 coinChange を実装してください。作れない場合は -1 を返します。',
    'examples'=> [
        ['input' => '[1,5,10,50], 36', 'input_label' => 'coins = [1,5,10,50], amount = 36', 'output' => '4（10+10+10+5+1）', 'explanation' => '10×3+5+1 = 4枚で 36 を作れる。'],
        ['input' => '[2], 3',          'input_label' => 'coins = [2], amount = 3',          'output' => '-1',               'explanation' => '偶数枚のコインでは奇数の 3 は作れないため -1。'],
        ['input' => '[1,2,5], 11',     'input_label' => 'coins = [1,2,5], amount = 11',     'output' => '3（5+5+1）',       'explanation' => '5×2+1 = 3枚で 11 を作れる。'],
    ],
    'constraints' => [],
    'starter' => '<?php
declare(strict_types=1);

function coinChange(array $coins, int $amount): int
{
    // 動的計画法で実装
}
',
    'hint'    => '$dp[0]=0、それ以外を PHP_INT_MAX で初期化。各コインで $dp[$i]=min($dp[$i], $dp[$i-$coin]+1) と更新します。',
];
