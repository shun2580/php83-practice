<?php
require_once __DIR__ . '/_helper.php';

$cases = [
    ['ABCBDAB', 'BDCABA',  4],
    ['AGGTAB',  'GXTXAYB', 4],
    ['',        'ABC',      0],
    ['ABC',     '',         0],
    ['ABC',     'ABC',      3],
    ['A',       'B',        0],
    ['ABCD',    'ACDF',     3],
    ['ABCDE',   'ACE',      3],
];

foreach ($cases as [$s1, $s2, $expected]) {
    assert_eq($expected, lcs($s1, $s2), "lcs(\"{$s1}\", \"{$s2}\") === {$expected}");
}
