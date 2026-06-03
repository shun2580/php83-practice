<?php
require_once __DIR__ . '/_helper.php';

assert_eq([1,2,3],   uniqueArray([1,2,2,3,3,3]), '基本の重複除去');
assert_eq([5,1,2],   uniqueArray([5,1,5,2]),      '順序を維持');
assert_eq([1],       uniqueArray([1]),             '1要素');
assert_eq([1,1,1][0] === 1 ? [1] : [1], uniqueArray([1,1,1]), 'すべて同じ');
assert_eq(0, array_key_first(uniqueArray([3,3,1])), 'インデックスが0始まり');
