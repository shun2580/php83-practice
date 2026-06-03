<?php
require_once __DIR__ . '/_helper.php';

assert_eq(2,   kthSmallest([3,1,4,1,5,9,2,6], 3), '3番目に小さい（重複あり）');
assert_eq(7,   kthSmallest([7,10,4,3,20,15], 3),  '3番目に小さい');
assert_eq(1,   kthSmallest([5,3,1,2,4], 1),        '最小値（k=1）');
assert_eq(5,   kthSmallest([5,3,1,2,4], 5),        '最大値（k=5）');
assert_eq(100, kthSmallest([100],        1),        '要素1つ');
assert_eq(1,   kthSmallest([3,1,4,1,5], 1),        '重複ありの最小値');
