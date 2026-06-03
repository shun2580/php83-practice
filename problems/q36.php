<?php
return [
    'id'      => 'q36',
    'type'    => 'coding',
    'level'   => '上級',
    'genre'   => '動的計画法',
    'title'   => '最長共通部分列（LCS）',
    'question'=> '2つの文字列 $s1, $s2 を受け取り、最長共通部分列（LCS: Longest Common Subsequence）の長さを返す関数 lcs() を動的計画法で実装してください。
部分列は連続でなくてもよいが、順序を保つ必要があります。',
    'examples'=> [
        ['input' => '"ABCBDAB", "BDCABA"',  'input_label' => 's1="ABCBDAB", s2="BDCABA"',  'output' => '4', 'explanation' => 'LCS は "BCBA" または "BDAB"（長さ4）'],
        ['input' => '"AGGTAB", "GXTXAYB"',  'input_label' => 's1="AGGTAB", s2="GXTXAYB"', 'output' => '4', 'explanation' => 'LCS は "GTAB"（長さ4）'],
        ['input' => '"", "ABC"',             'input_label' => 's1="", s2="ABC"',            'output' => '0'],
    ],
    'constraints' => ['各文字列の長さは 0〜100', '文字列は ASCII 文字のみ'],
    'starter' => '<?php
declare(strict_types=1);

function lcs(string $s1, string $s2): int
{
    // 動的計画法で実装
}
',
    'hint' => '二次元 DP テーブル $dp[$i][$j] に「s1 の先頭 i 文字と s2 の先頭 j 文字の LCS 長」を格納します。s1[$i-1] === s2[$j-1] なら $dp[$i-1][$j-1] + 1、そうでなければ max($dp[$i-1][$j], $dp[$i][$j-1]) です。',
];
