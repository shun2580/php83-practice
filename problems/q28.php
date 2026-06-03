<?php
return [
    'id'      => 'q28',
    'type'    => 'coding',
    'level'   => '中級',
    'genre'   => 'SPLデータ構造',
    'title'   => 'k 番目に小さい値（SplMinHeap）',
    'question'=> '整数の配列 $nums から k 番目に小さい値を返す関数 kthSmallest() を SplMinHeap を使って実装してください。$k は 1 始まりで、配列はソートされていません。',
    'examples'=> [
        ['input' => 'kthSmallest([3,1,4,1,5,9,2,6], 3)', 'input_label' => 'nums = [3,1,4,1,5,9,2,6], k = 3', 'output' => '2', 'explanation' => '昇順に並べると [1,1,2,3,4,5,6,9] なので3番目は 2。'],
        ['input' => 'kthSmallest([7,10,4,3,20,15], 3)',  'input_label' => 'nums = [7,10,4,3,20,15], k = 3',   'output' => '7', 'explanation' => '昇順に並べると [3,4,7,10,15,20] なので3番目は 7。'],
        ['input' => 'kthSmallest([5,3,1,2,4], 1)',       'input_label' => 'nums = [5,3,1,2,4], k = 1',        'output' => '1', 'explanation' => '最小値は 1。'],
    ],
    'constraints' => [],
    'starter' => '<?php
declare(strict_types=1);

function kthSmallest(array $nums, int $k): int
{
    $heap = new SplMinHeap();

    // ここに実装
}
',
    'hint'    => '全要素を SplMinHeap に insert() してから、extract() を $k 回繰り返すと k 番目に小さい値が取得できます。',
];
