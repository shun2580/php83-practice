<?php
require_once __DIR__ . '/_helper.php';

assert_eq('こんにちは...', truncate('こんにちは世界', 5),        '日本語切り詰め');
assert_eq('Hello',         truncate('Hello', 10),                '上限以内はそのまま');
assert_eq('PHPプ...',      truncate('PHPプログラミング', 4),      '混在文字列の切り詰め');
assert_eq('ab...',         truncate('abcdef', 2),                 '英字切り詰め');
assert_eq('',              truncate('', 5),                       '空文字列');
assert_eq('あ',            truncate('あ', 1),                     'ちょうど1文字');
assert_eq('hello...',      truncate('hello world', 5),            'スペースを含む文字列');
