<?php
require_once __DIR__ . '/_helper.php';

assert_eq(0,  fibonacci(0),  'fib(0)=0');
assert_eq(1,  fibonacci(1),  'fib(1)=1');
assert_eq(1,  fibonacci(2),  'fib(2)=1');
assert_eq(8,  fibonacci(6),  'fib(6)=8');
assert_eq(55, fibonacci(10), 'fib(10)=55');
