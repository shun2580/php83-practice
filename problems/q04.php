<?php
return [
    'id'      => 'q04',
    'type'    => 'choice',
    'level'   => '初級',
    'genre'   => 'PHP基礎知識',
    'title'   => 'array_map と array_filter の違い',
    'question'=> '次のコードの出力として正しいものはどれですか？

<?php
$nums = [1, 2, 3, 4, 5];
$result = array_filter(
    array_map(fn($n) => $n * 2, $nums),
    fn($n) => $n > 5
);
echo implode(",", $result);',
    'choices' => [
        'A' => '2,4,6,8,10',
        'B' => '6,8,10',
        'C' => '4,6,8,10',
        'D' => '3,4,5',
    ],
    'correct' => 'B',
    'explanation' => 'まず array_map で各要素を2倍にすると [2,4,6,8,10]。次に array_filter で 5 より大きいものだけ残すと [6,8,10]。implode でカンマ区切りにすると "6,8,10" になります。',
];
