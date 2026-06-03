<?php
require_once __DIR__ . '/_helper.php';

$add5   = adder(5);
$add10  = adder(10);
$subtr3 = adder(-3);

assert_eq(8,  $add5(3),    'adder(5)(3) === 8');
assert_eq(5,  $add5(0),    'adder(5)(0) === 5');
assert_eq(10, $add10(0),   'adder(10)(0) === 10');
assert_eq(15, $add10(5),   'adder(10)(5) === 15');
assert_eq(4,  $subtr3(7),  'adder(-3)(7) === 4');
assert_eq(0,  $subtr3(3),  'adder(-3)(3) === 0');

// 独立したクロージャが返ることを確認
$a = adder(1);
$b = adder(2);
assert_eq(11, $a(10), '独立したクロージャ adder(1)(10) === 11');
assert_eq(12, $b(10), '独立したクロージャ adder(2)(10) === 12');
