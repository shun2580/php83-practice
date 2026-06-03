<?php
return [
    'id'      => 'q22',
    'type'    => 'coding',
    'level'   => '初級',
    'genre'   => '配列操作',
    'title'   => '価格フィルタと割引適用',
    'question'=> '整数の価格配列 $prices を受け取り、$threshold 以上の価格だけを抽出し、割引率 $discount（0.0〜1.0）を適用した最終価格（端数切り捨て）の配列を返す関数 getDiscountedPrices() を実装してください。
最終価格 = 元の価格 × (1 - $discount) の小数点以下切り捨て。
インデックスは0始まりで再付与してください。',
    'examples'=> [
        ['input' => 'getDiscountedPrices([100, 500, 200, 1000], 300, 0.1)', 'input_label' => 'prices = [100,500,200,1000], threshold = 300, discount = 0.1', 'output' => '[450, 900]',  'explanation' => '300以上の 500,1000 に 10%割引を適用すると 450,900。'],
        ['input' => 'getDiscountedPrices([50, 100, 150], 200, 0.2)',         'input_label' => 'prices = [50,100,150], threshold = 200, discount = 0.2',     'output' => '[]',          'explanation' => '200以上の要素がないため空配列。'],
        ['input' => 'getDiscountedPrices([400, 200, 600], 300, 0.5)',        'input_label' => 'prices = [400,200,600], threshold = 300, discount = 0.5',    'output' => '[200, 300]', 'explanation' => '300以上の 400,600 に 50%割引を適用すると 200,300。'],
    ],
    'constraints' => [],
    'starter' => '<?php
declare(strict_types=1);

function getDiscountedPrices(array $prices, int $threshold, float $discount): array
{
    // ここに実装
}
',
    'hint'    => 'array_filter() で閾値以上を抽出 → array_values() でインデックス振り直し → array_map() で割引計算（intval(price * (1 - discount))）の順に処理しましょう。',
];
