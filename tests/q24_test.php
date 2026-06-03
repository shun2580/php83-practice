<?php
require_once __DIR__ . '/_helper.php';

assert_eq('helloWorld',  toCamelCase('hello_world'),    '基本の変換');
assert_eq('getUserName', toCamelCase('get_user_name'),  '3単語');
assert_eq('myVar',       toCamelCase('my_var'),          '2単語');
assert_eq('hello',       toCamelCase('hello'),           '区切りなし');
assert_eq('phpVersion',  toCamelCase('php_version'),     'php_ で始まる');
assert_eq('aBC',         toCamelCase('a_b_c'),           '1文字ずつ');
