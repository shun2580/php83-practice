<?php
return [
    'id'      => 'q27',
    'type'    => 'coding',
    'level'   => '初級',
    'genre'   => '配列操作',
    'title'   => 'ページネーション（array_chunk）',
    'question'=> '配列 $items を1ページあたり $perPage 件でページ分けし、$page ページ目（1始まり）の要素を返す関数 paginate() を array_chunk() を使って実装してください。指定ページが存在しない場合は空配列を返します。',
    'examples'=> [
        ['input' => 'paginate([1,2,3,4,5,6,7,8,9,10], 3, 2)', 'input_label' => 'items = [1..10], perPage = 3, page = 2', 'output' => '[4, 5, 6]', 'explanation' => '3件ずつ分けると2ページ目は要素4〜6。'],
        ['input' => 'paginate([1,2,3,4,5,6,7,8,9,10], 3, 4)', 'input_label' => 'items = [1..10], perPage = 3, page = 4', 'output' => '[10]',      'explanation' => '4ページ目は最後の要素 10 のみ。'],
        ['input' => 'paginate([1,2,3,4,5,6,7,8,9,10], 3, 5)', 'input_label' => 'items = [1..10], perPage = 3, page = 5', 'output' => '[]',        'explanation' => '5ページ目は存在しないため空配列。'],
    ],
    'constraints' => [],
    'starter' => '<?php
declare(strict_types=1);

function paginate(array $items, int $perPage, int $page): array
{
    // array_chunk() を使って実装
}
',
    'hint'    => 'array_chunk($items, $perPage) でページごとの配列に分割し、$page - 1 番目のインデックスにアクセスします。インデックスが存在しない場合は [] を返します。',
];
