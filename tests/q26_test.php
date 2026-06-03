<?php
require_once __DIR__ . '/_helper.php';

assert_true(isBalanced('()[]{}'),   '単純な括弧の組み合わせ');
assert_true(isBalanced('([{}])'),   'ネストされた括弧');
assert_true(isBalanced(''),         '空文字列');
assert_true(isBalanced('((()))'),   '深いネスト');
assert_false(isBalanced('([)]'),    '順序が正しくない括弧');
assert_false(isBalanced('{[}'),     '閉じ括弧が足りない');
assert_false(isBalanced('('),       '開き括弧のみ');
assert_false(isBalanced(')'),       '閉じ括弧のみ');
assert_false(isBalanced('((())'),   '開き括弧が1つ余分');
