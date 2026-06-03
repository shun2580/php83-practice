<?php
require_once __DIR__ . '/_helper.php';

assert_eq(2,  binarySearch([1,3,5,7,9], 5), '中央の要素');
assert_eq(0,  binarySearch([1,3,5,7,9], 1), '先頭の要素');
assert_eq(4,  binarySearch([1,3,5,7,9], 9), '末尾の要素');
assert_eq(-1, binarySearch([1,3,5], 4),     '存在しない値');
assert_eq(0,  binarySearch([1], 1),          '要素1つ');
assert_eq(-1, binarySearch([], 1),           '空配列');
