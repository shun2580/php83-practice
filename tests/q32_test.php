<?php
require_once __DIR__ . '/_helper.php';

assert_true(isValidEmail('user@example.com'),              'user@example.com は有効');
assert_true(isValidEmail('user.name+tag@sub.domain.co.jp'), 'サブドメイン+タグ付きは有効');
assert_true(isValidEmail('a@bc.de'),                       '最小構成は有効');
assert_false(isValidEmail('invalid-email'),                '@ なしは無効');
assert_false(isValidEmail('a@b.c'),                        'TLD が1文字は無効');
assert_false(isValidEmail('@nodomain.com'),                'ローカル部なしは無効');
assert_false(isValidEmail('user@.com'),                    'ドメイン先頭ドットは無効');
assert_false(isValidEmail(''),                             '空文字は無効');
