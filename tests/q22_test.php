<?php
require_once __DIR__ . '/_helper.php';

assert_eq([450, 900],  getDiscountedPrices([100, 500, 200, 1000], 300, 0.1), '基本的なフィルタと割引');
assert_eq([],          getDiscountedPrices([50, 100, 150], 200, 0.2),         '全て閾値未満');
assert_eq([200, 300],  getDiscountedPrices([400, 200, 600], 300, 0.5),        '50%割引');
assert_eq([900],       getDiscountedPrices([300, 1000], 500, 0.1),            '一つだけ対象');
assert_eq([],          getDiscountedPrices([], 100, 0.1),                     '空配列');
assert_eq(0, array_key_first(getDiscountedPrices([100, 500, 200, 1000], 300, 0.1)), 'インデックスが0始まり');
