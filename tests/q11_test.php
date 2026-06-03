<?php
require_once __DIR__ . '/_helper.php';

assert_true(isPalindrome('racecar'),                      '"racecar" は回文');
assert_false(isPalindrome('hello'),                       '"hello" は回文でない');
assert_true(isPalindrome('A man a plan a canal Panama'), 'スペース・大小文字を無視');
assert_true(isPalindrome('a'),                            '1文字は回文');
assert_true(isPalindrome('Aba'),                          '大文字小文字無視');
assert_false(isPalindrome('world'),                       '"world" は回文でない');
