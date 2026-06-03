<?php
require_once __DIR__ . '/_helper.php';

assert_eq(['1','2','Fizz','4','Buzz'], fizzBuzz(5), '1〜5');
assert_eq(['1'], fizzBuzz(1), '1のみ');
assert_eq('Fizz', fizzBuzz(3)[2], '3はFizz');
assert_eq('Buzz', fizzBuzz(5)[4], '5はBuzz');
assert_eq('FizzBuzz', fizzBuzz(15)[14], '15はFizzBuzz');
assert_eq(15, count(fizzBuzz(15)), '要素数15');
