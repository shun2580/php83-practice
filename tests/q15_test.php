<?php
require_once __DIR__ . '/_helper.php';

assert_eq(4,  coinChange([1,5,10,50], 36), '36円 → 4枚(10+10+10+5+1)');
assert_eq(-1, coinChange([2], 3),          '作れない場合は-1');
assert_eq(3,  coinChange([1,2,5], 11),     '11円 → 3枚(5+5+1)');
assert_eq(0,  coinChange([1,5], 0),        '0円 → 0枚');
assert_eq(1,  coinChange([1,5,10], 10),    '10円 → 1枚');
