<?php
require_once __DIR__ . '/_helper.php';

assert_eq('banana', longestWord(['apple', 'banana', 'kiwi']),  '最長の単語');
assert_eq('cat',    longestWord(['cat', 'dog', 'ant']),         '同じ長さは先が優先');
assert_eq('hello',  longestWord(['hi', 'hello', 'hey']),        '中間の要素が最長');
assert_eq('word',   longestWord(['word']),                       '1要素');
assert_eq('',       longestWord([]),                             '空配列');
assert_eq('',       longestWord(['']),                           '空文字列のみ');
