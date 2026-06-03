<?php
require_once __DIR__ . '/_helper.php';

assert_eq(['fig', 'kiwi', 'apple', 'banana'], sortByLengthThenAlpha(['banana', 'kiwi', 'apple', 'fig']), '長さ順→アルファベット順');
assert_eq(['bat', 'cat', 'rat'],              sortByLengthThenAlpha(['cat', 'bat', 'rat']),               '同じ長さはアルファベット順');
assert_eq(['a', 'c', 'bb', 'aaa'],           sortByLengthThenAlpha(['c', 'bb', 'aaa', 'a']),             '混在ケース');
assert_eq(['hello'],                          sortByLengthThenAlpha(['hello']),                            '1要素');
assert_eq([],                                 sortByLengthThenAlpha([]),                                   '空配列');
