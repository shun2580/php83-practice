<?php
require_once __DIR__ . '/_helper.php';

$s = new Stack();
assert_true($s->isEmpty(), '初期状態は空');
assert_eq(0, $s->size(), '初期サイズは0');

$s->push(1); $s->push(2); $s->push(3);
assert_eq(3, $s->size(),  'push後サイズ3');
assert_eq(3, $s->peek(),  'peek()は3');
assert_eq(3, $s->size(),  'peekはサイズを変えない');

assert_eq(3, $s->pop(),   'pop()は3');
assert_eq(2, $s->size(),  'pop後サイズ2');
assert_eq(2, $s->peek(),  '次のpeekは2');

$s->pop(); $s->pop();
assert_true($s->isEmpty(),   '全pop後は空');
assert_eq(null, $s->pop(),   '空のpopはnull');
assert_eq(null, $s->peek(),  '空のpeekはnull');
